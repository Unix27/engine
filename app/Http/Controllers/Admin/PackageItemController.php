<?php

namespace App\Http\Controllers\Admin;

use App\Models\Field;
use App\Models\Package;
use App\Models\PackageItem;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\PackageItemRequest as StoreRequest;
use App\Http\Requests\Admin\PackageItemRequest as UpdateRequest;

class PackageItemController extends PanelController
{
    private $packageId = null;

	public function setup()
	{
        // Get the Package ID
        $this->packageId = request()->segment(3);

        // Get the Custom Field's name
        $packadge = Package::findTransOrFail($this->packageId);

		/*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->xPanel->setModel('App\Models\PackageItem');
        $this->xPanel->setRoute(admin_uri('package_items/' . $this->packageId . '/list'));
        $this->xPanel->setParentKeyField('package_id');
        $this->xPanel->addClause('where', 'package_id', '=', $this->packageId);
        $this->xPanel->setParentRoute(admin_uri('packages'));
		$this->xPanel->setEntityNameStrings('Package item', 'Package items');
		$this->xPanel->enableDetailsRow();
		$this->xPanel->allowAccess(['details_row']);

        $this->xPanel->addButtonFromModelFunction('line', 'logistic', 'logisticBtn', 'end');

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
            'name'          => 'status',
            'label'         => 'Status',
            'type'          => 'model_function',
            'function_name' => 'getStatusHtml',
        ]);
        $this->xPanel->addColumn([
            'name'  => 'status_at',
            'label' => 'Status changed',
            'type'  => 'datetime',
        ]);
        $this->xPanel->addColumn([
            'name'          => 'title',
            'label'         => 'Product',
        ]);

        $this->xPanel->addColumn([
            'name'  => 'product_price',
            'label' => 'Product price',
        ]);
        $this->xPanel->addColumn([
            'name'  => 'product_price_currency_code',
            'label' => trans("admin::messages.Currency"),
        ]);
        $this->xPanel->addColumn([
            'name'  => 'delivery_price',
            'label' => 'Delivery price',
        ]);
        $this->xPanel->addColumn([
            'name'  => 'delivery_price_currency_code',
            'label' => trans("admin::messages.Currency"),
        ]);

        $this->xPanel->addColumn([
            'name'  => 'tracking_code',
            'label' => 'Tracking code',
        ]);

        $this->xPanel->addColumn([
            'name'          => 'active',
            'label'         => trans("admin::messages.Active"),
            'type'          => 'model_function',
            'function_name' => 'getActiveHtml',
            'on_display'    => 'checkbox',
        ]);


// FIELDS
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
            'name'              => 'product_price',
            'label'             => 'Product price',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => trans("admin::messages.Price"),
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'label'             => trans("admin::messages.Currency"),
            'name'              => 'product_price_currency_code',
            'model'             => 'App\Models\Currency',
            'entity'            => 'currency',
            'attribute'         => 'code',
            'type'              => 'select2',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'name'              => 'delivery_price',
            'label'             => 'Delivery price',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => trans("admin::messages.Price"),
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'label'             => trans("admin::messages.Currency"),
            'name'              => 'delivery_price_currency_code',
            'model'             => 'App\Models\Currency',
            'entity'            => 'currency',
            'attribute'         => 'code',
            'type'              => 'select2',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
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
            'name'       => 'tracking_code',
            'label'      => 'Tracking code',
            'type'       => 'text',
            'attributes' => [
                'placeholder' => trans('admin::messages.Description'),
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
