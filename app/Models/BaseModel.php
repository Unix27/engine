<?php

namespace App\Models;

use App\Models\Traits\ActiveTrait;
use App\Models\Traits\VerifiedTrait;
use Illuminate\Database\Eloquent\Model;
use Prologue\Alerts\Facades\Alert;

class BaseModel extends Model
{
	use ActiveTrait, VerifiedTrait;
	
	public static $msg = 'demo_mode_message';
    public  $priceLocale;
	/**
	 * BaseModel constructor.
	 * @param array $attributes
	 */
	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
        $this->priceLocale = currency()->getUserCurrency() == 'EUR' ? 'de' : 'en';
	}
	
	/**
	 * @param array $attributes
	 * @return $this|bool|Model
	 */
	public static function create(array $attributes = [])
	{
		if (isDemo()) {
			self::$msg = t(self::$msg);
			
			if (isFromAdminPanel()) {
				Alert::info(self::$msg)->flash();
			} else {
				flash(self::$msg)->info();
			}
			
			return false;
		} else {
			return static::query()->create($attributes);
		}
	}
	
	/**
	 * @param array $attributes
	 * @param array $options
	 * @return bool
	 */
	public function update(array $attributes = [], array $options = [])
	{
		if (!$this->exists) {
			return false;
		}
		
		if (isDemo()) {
			if (isset($options['canBeUpdated']) && $options['canBeUpdated'] == true) {
				unset($options['canBeUpdated']);
				return $this->fill($attributes)->save($options);
			}
			
			self::$msg = t(self::$msg);
			
			if (isFromAdminPanel()) {
				Alert::info(self::$msg)->flash();
			} else {
				flash(self::$msg)->info();
			}
			
			return false;
		} else {
			return $this->fill($attributes)->save($options);
		}
	}
	
	/**
	 * @param array $options
	 * @return bool
	 */
	public function save(array $options = [])
	{
		if (isDemo()) {
			if (isset($options['canBeSaved']) && $options['canBeSaved'] == true) {
				unset($options['canBeSaved']);
				return parent::save($options);
			}
			
			self::$msg = t(self::$msg);
			
			if (isFromAdminPanel()) {
				Alert::info(self::$msg)->flash();
			} else {
				flash(self::$msg)->info();
			}
			
			return false;
		} else {
			return parent::save($options);
		}
	}
	
	/**
	 * @return bool|null
	 * @throws \Exception
	 */
	public function delete()
	{
		if (isDemo()) {
			self::$msg = t(self::$msg);
			
			if (isFromAdminPanel()) {
				Alert::info(self::$msg)->flash();
			} else {
				flash(self::$msg)->info();
			}
			
			return false;
		} else {
			return parent::delete();
		}
	}
}
