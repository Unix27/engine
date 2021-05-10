<?php

namespace App\Http\Controllers\Admin;

use App\Models\Field;
use App\Models\Package;
use App\Models\PackageItem;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\LogisticRequest as StoreRequest;
use App\Http\Requests\Admin\LogisticRequest as UpdateRequest;

class LogisticController extends PanelController
{
    private $packageItemId = null;

	public function setup()
	{
        // Get the Custom Field's ID
        $this->packageItemId = request()->segment(3);

        // Get the Custom Field's name
        $packageItem = PackageItem::findTransOrFail($this->packageItemId);

		/*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->xPanel->setModel('App\Models\Logistic');
        $this->xPanel->setRoute(admin_uri('logistic_timeline/' . $this->packageItemId . '/list'));
		$this->xPanel->setEntityNameStrings('Item', 'Items');
        $this->xPanel->setParentKeyField('package_item_id');
        $this->xPanel->addClause('where', 'package_item_id', '=', $this->packageItemId);
        $this->xPanel->setParentRoute(admin_uri('package_items/' . $packageItem->package_id . '/list'));


        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */
		// COLUMNS
		$this->xPanel->addColumn([
			'name'  => 'id',
			'label' => '',
			'type'  => 'checkbox',
			'orderable' => false,
		]);
        $this->xPanel->addColumn([
            'name'          => 'title',
            'label'         => 'Title',
        ]);
        $this->xPanel->addColumn([
            'name'          => 'status',
            'label'         => 'Status',
        ]);
        $this->xPanel->addColumn([
            'name'  => 'status_at',
            'label' => 'Status changed',
            'type'  => 'datetime',
        ]);
        $this->xPanel->addColumn([
            'name'          => 'active',
            'label'         => trans("admin::messages.Active"),
            'type'          => 'model_function',
            'function_name' => 'getActiveHtml',
            'on_display'    => 'checkbox',
        ]);
        $this->xPanel->addColumn([
            'name'          => 'description',
            'label'         => 'Description',
        ]);
        $this->xPanel->addColumn([
            'name'          => 'comment',
            'label'         => 'Comment',
        ]);
        $this->xPanel->addColumn([
            'name'  => 'created_at',
            'label' => trans("admin::messages.Date") . ' of Create',
            'type'  => 'datetime',
        ]);
        $this->xPanel->addColumn([
            'name'  => 'updated_at',
            'label' => trans("admin::messages.Date") . ' of Update',
            'type'  => 'datetime',
        ]);

        // FIELDS
        $this->xPanel->addField([
            'name'  => 'package_item_id',
            'type'  => 'hidden',
            'value' => $this->packageItemId,
        ], 'create');

        $this->xPanel->addField([
            'name'              => 'title',
            'label'             => trans("admin::messages.Name"),
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => trans("admin::messages.Name"),
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-sm-12',
            ],
        ]);

        $this->xPanel->addField([
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select2_from_array',
            'options'     => $this->getStatuses(),
            'allows_null' => false,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->xPanel->addField([
            'name'                => 'status_at',
            'label'               => 'Status changed at',
            'type'                => 'datetime_picker',
            'colorpicker_options' => [
                'customClass' => 'custom-class',
            ],
            'wrapperAttributes'   => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->xPanel->addField([
            'name'       => 'description',
            'label'      => trans('admin::messages.Description'),
            'type'       => 'textarea',
            'attributes' => [
                'placeholder' => trans('admin::messages.Description'),
            ],
        ]);
        $this->xPanel->addField([
            'name'       => 'comment',
            'label'      => 'Comment',
            'type'       => 'textarea',
            'attributes' => [
                'placeholder' => 'Comment',
            ],
        ]);
        $this->xPanel->addField([
            'name'              => 'active',
            'label'             => trans("admin::messages.Active"),
            'type'              => 'checkbox',
            'hint'              => '<br><br>',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
                'style' => 'margin-top: 20px;',
            ],
        ]);
	}
	
	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}
	
	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}

    private function getStatuses()
    {
        return collect([
            PackageItem::STATUS_NEW => 'Передеано на укомплектовку',
            PackageItem::STATUS_PANDING => 'Комплектуется',
            PackageItem::STATUS_SUCCESS => 'Отправлен',
            PackageItem::STATUS_CANCEL => 'Отменен',
            PackageItem::STATUS_ERROR => 'Возникла ошибка' ,
        ]);
    }
}
