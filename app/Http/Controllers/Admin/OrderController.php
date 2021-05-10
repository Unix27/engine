<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\User;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\Request as StoreRequest;
use App\Http\Requests\Admin\Request as UpdateRequest;

class OrderController extends PanelController
{
    public $parentEntity = null;
    private $userId = null;

	public function setup()
	{
        // Parents Entities
        $parentEntities = ['search', 'user', 'payment', 'packages'];

        // Get the parent Entity slug
        $this->parentEntity = request()->segment(3);
//        if ($this->parentEntity && !in_array($this->parentEntity, $parentEntities)) {
//            abort(404);
//        }

        // User => Orders
        if ($this->parentEntity == 'user') {
            $this->userId = request()->segment(4);
            $user = User::find($this->userId);
        }

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
		$this->xPanel->setModel('App\Models\Order');
		$this->xPanel->with(['user']);

		$this->xPanel->setRoute(admin_uri('orders'));
		$this->xPanel->setEntityNameStrings('order', 'orders');
        $this->xPanel->enableDetailsRow();
        $this->xPanel->allowAccess(['details_row']);
        $this->xPanel->allowAccess(['create', 'update', 'delete']);
        $this->xPanel->removeAllButtons();

        if ($this->parentEntity == 'user') {
            $this->xPanel->setRoute($this->xPanel->getRoute() . '/user/' . $this->userId . '/list');
            $this->xPanel->setParentKeyField('user_id');
            $this->xPanel->addClause('where', 'user_id', '=', $this->userId);
            $this->xPanel->setParentRoute(admin_uri('orders'));
            $this->xPanel->allowAccess(['reorder', 'parent']);
        }

//		$this->xPanel->removeAllButtons(); // Remove also: 'create' & 'reorder' buttons
		/*
		$this->xPanel->removeButton('update');
		$this->xPanel->removeButton('delete');
		$this->xPanel->removeButton('preview');
		$this->xPanel->removeButton('revisions');
		*/
		if (!request()->input('order')) {
			$this->xPanel->orderBy('created_at', 'DESC');
		}
		
		// Filters
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'id',
			'type'  => 'text',
			'label' => 'ID',
		],
		false,
		function ($value) {
			$this->xPanel->addClause('where', 'id', '=', $value);
		});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'from_to',
			'type'  => 'date_range',
			'label' => trans('admin::messages.Date range'),
		],
		false,
		function ($value) {
			$dates = json_decode($value);
			$this->xPanel->addClause('where', 'created_at', '>=', $dates->from);
			$this->xPanel->addClause('where', 'created_at', '<=', $dates->to);
		});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'payment_status',
			'type'  => 'dropdown',
			'label' => trans('admin::messages.Status'),
		], [
			1 => trans('admin::messages.Unapproved'),
			2 => trans('admin::messages.Approved'),
		], function ($value) {
			if ($value == 1) {
				$this->xPanel->addClause('where', 'active', '=', 0);
			}
			if ($value == 2) {
				$this->xPanel->addClause('where', 'active', '=', 1);
			}
		});
		
		
		/*
		|--------------------------------------------------------------------------
		| COLUMNS AND FIELDS
		|--------------------------------------------------------------------------
		*/
		// COLUMNS
		$this->xPanel->addColumn([
			'name'  => 'id',
			'label' => "ID",
		]);
		$this->xPanel->addColumn([
			'name'  => 'created_at',
			'label' => trans("admin::messages.Date"),
		]);
		$this->xPanel->addColumn([
			'name'          => 'number',
			'label'         => 'Number',
		]);
        $this->xPanel->addColumn([
            'name'  => 'package_id',
            'label' => 'Package #',
            'type'          => 'model_function',
            'function_name' => 'getPackageHtml',
        ]);
        $this->xPanel->addColumn([
            'name'          => 'user_id',
            'label'         => trans("admin::messages.User Name"),
            'type'          => 'model_function',
            'function_name' => 'getUserNameHtml',
        ]);

        $this->xPanel->addColumn([
			'name'          => 'total_price',
			'label'         => 'Total price',
		]);
        $this->xPanel->addColumn([
            'name'  => 'currency_code',
            'label' => trans("admin::messages.Currency"),
            'type'          => 'model_function',
            'function_name' => 'getCurrencyCodeHtml',
        ]);
		$this->xPanel->addColumn([
			'name'          => 'items_count',
			'label'         => 'Items count',
		]);
		$this->xPanel->addColumn([
			'name'          => 'payment_status',
			'label'         => 'Status',
		]);


		// FIELDS
        $this->xPanel->addField([
            'name'              => 'number',
            'label'             => 'Number',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Number',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'name'              => 'payment_id',
            'label'             => 'Payment id',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Payment id',
            ],
            'hint'              => trans('admin::messages.Short Name'),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->xPanel->addField([
            'name'              => 'customer_email',
            'label'             => 'Customer email',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Customer email',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'name'              => 'customer_email',
            'label'             => 'Customer email',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Customer email',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'name'              => 'customer_first_name',
            'label'             => 'Customer First Name',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Customer First Name',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'name'              => 'customer_last_name',
            'label'             => 'Customer Last Name',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Customer Last Name',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->xPanel->addField([
            'name'              => 'address',
            'label'             => 'Address',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Address',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->xPanel->addField([
            'name'              => 'mobile_phone',
            'label'             => 'Mobile phone',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Address',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->xPanel->addField([
            'name'              => 'items_count',
            'label'             => 'Items count',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Items count',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->xPanel->addField([
            'name'              => 'total_price',
            'label'             => 'Total price',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Total price',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->xPanel->addField([
            'name'              => 'payment_status',
            'label'             => 'Payment status',
            'type'              => 'text',
            'attributes'        => [
                'placeholder' => 'Payment status',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
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
}
