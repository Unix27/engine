<?php

namespace App\Models;

use App\Helpers\Files\Storage\StorageDisk;
use App\Helpers\UrlGen;
use App\Models\Scopes\LocalizedScope;
use App\Models\Scopes\ReviewedScope;
use App\Models\Scopes\VerifiedScope;
use App\Models\Scopes\ActiveScope;
use App\Observer\PictureObserver;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Larapen\Admin\app\Models\Crud;

class Video extends BaseModel
{
	use Crud;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'videos';
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	// protected $primaryKey = 'id';
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
//	 public $timestamps = true;
	
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['post_id', 'filename', 'position', 'active', 'product_video_url', 'product_picture_url', 'product_picture_url_thumbnail'];
	
	/**
	 * The attributes that should be hidden for arrays
	 *
	 * @var array
	 */
	// protected $hidden = [];
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at'];
	
	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	protected static function boot()
	{
		parent::boot();
		
		Picture::observe(PictureObserver::class);
		
		static::addGlobalScope(new ActiveScope());
		static::addGlobalScope(new LocalizedScope());
	}

	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function post()
	{
		return $this->belongsTo(Post::class, 'post_id');
	}

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
	
	/*
	|--------------------------------------------------------------------------
	| ACCESSORS
	|--------------------------------------------------------------------------
	*/
	public function getFilenameFromOldPath()
	{
		if (!isset($this->attributes) || !isset($this->attributes['filename'])) {
			return null;
		}
		
		$disk = StorageDisk::getDisk();
		
		$value = $this->attributes['filename'];
		
		// Fix path
		$value = str_replace('uploads/pictures/', '', $value);
		$value = str_replace('pictures/', '', $value);
		$value = 'pictures/' . $value;
		
		if (!$disk->exists($value)) {
			$value = null;
		}
		
		return $value;
	}
	
	public function getFilenameAttribute()
	{
		// OLD PATH
		$value = $this->getFilenameFromOldPath();
		if (!empty($value)) {
			return $value;
		}
		
		// NEW PATH
		if (!isset($this->attributes) || !isset($this->attributes['filename'])) {
			return null;
		}
		
		$value = $this->attributes['filename'];
		
		$disk = StorageDisk::getDisk();
		
		if (!$disk->exists($value)) {
			$value = config('larapen.core.picture.default');
		}
		
		return $value;
	}

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setFilenameAttribute($value)
    {
        $disk = StorageDisk::getDisk();
        $attribute_name = 'filename';

        if (empty($this->post)) {
            $this->attributes[$attribute_name] = null;
        }

        // Get ad details
        $post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])->where('id', $this->post_id)->first();
        if (empty($post)) {
            $this->attributes[$attribute_name] = null;

            return false;
        }

        // Path
//		$destination_path = 'files/' . strtolower($post->country_code) . '/' . $post->id;
        $destination_path = 'files/' . strtolower($post->country_code) . '/s/' /*. $post->id*/;

        // If the image was erased
        if (empty($value)) {
            // delete the image from disk
            if (!Str::contains($this->{$attribute_name}, config('larapen.core.picture.default'))) {
                $disk->delete($this->{$attribute_name});
            }

            // set null in the database column
            $this->attributes[$attribute_name] = null;

            return false;
        }

        // Check the image file
        if ($value == url('/')) {
            $this->attributes[$attribute_name] = null;

            return false;
        }

        // If laravel request->file('filename') resource OR base64 was sent, store it in the db
        try {
            if (fileIsUploaded($value)) {
                // Get file extension
                $extension = getUploadedFileExtension($value);
                if (empty($extension)) {
                    $extension = 'jpg';
                }

                // Image quality
                $imageQuality = config('settings.upload.image_quality', 90);

                // Image default sizes
                $width = (int)config('settings.upload.img_resize_width', 1000);
                $height = (int)config('settings.upload.img_resize_height', 1000);

                // Other parameters
                $ratio = config('settings.upload.img_resize_ratio', '1');
                $upSize = config('settings.upload.img_resize_upsize', '0');

                // Make the image
                if (exifExtIsEnabled()) {
                    $image = Image::make($value)->orientate()->resize($width, $height, function ($constraint) use ($ratio, $upSize) {
                        if ($ratio == '1') {
                            $constraint->aspectRatio();
                        }
                        if ($upSize == '1') {
                            $constraint->upsize();
                        }
                    })->encode($extension, $imageQuality);
                } else {
                    $image = Image::make($value)->resize($width, $height, function ($constraint) use ($ratio, $upSize) {
                        if ($ratio == '1') {
                            $constraint->aspectRatio();
                        }
                        if ($upSize == '1') {
                            $constraint->upsize();
                        }
                    })->encode($extension, $imageQuality);
                }

                // Check and load Watermark plugin
                $plugin = load_installed_plugin('watermark');
                if (!empty($plugin)) {
                    $image = call_user_func($plugin->class . '::apply', $image);
                    if (empty($image)) {
                        $this->attributes[$attribute_name] = null;

                        return false;
                    }
                }

                // Generate a filename.
                $filename = md5($value . time()) . '.' . $extension;

                // Store the image on disk.
                $disk->put($destination_path . '/' . $filename, $image->stream()->__toString());

                // Save the path to the database
                $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
            } else {
                // Retrieve current value without upload a new file.
                if (Str::startsWith($value, config('larapen.core.picture.default'))) {
                    $value = null;
                } else {
                    if (!Str::startsWith($value, 'files/')) {
                        $value = $destination_path . last(explode($destination_path, $value));
                    }
                }
                $this->attributes[$attribute_name] = $value;
            }
        } catch (\Exception $e) {
            flash($e->getMessage())->error();
            $this->attributes[$attribute_name] = null;

            return false;
        }
    }
}
