<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\User;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\Request as StoreRequest;
use App\Http\Requests\Admin\Request as UpdateRequest;

class PaymentController extends PanelController
{
    public $parentEntity = null;
    private $userId = null;
    private $packageId = null;

	public function setup()
	{
        // Parents Entities
        $parentEntities = ['search', 'user', 'order', 'package'];
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

        // User => Orders
        if ($this->parentEntity == 'package') {
            $this->packageId = request()->segment(4);
            $package = Package::find($this->packageId);
        }

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
		$this->xPanel->setModel('App\Models\Payment');
		$this->xPanel->with(['user', 'post', 'package', 'paymentMethod']);
		$this->xPanel->setRoute(admin_uri('payments'));
		$this->xPanel->setEntityNameStrings(trans('admin::messages.payment'), trans('admin::messages.payments'));
		$this->xPanel->denyAccess(['create', 'update', 'delete']);
		$this->xPanel->removeAllButtons(); // Remove also: 'create' & 'reorder' buttons
		/*
		$this->xPanel->removeButton('update');
		$this->xPanel->removeButton('delete');
		$this->xPanel->removeButton('preview');
		$this->xPanel->removeButton('revisions');
		*/
		if (!request()->input('order')) {
			$this->xPanel->orderBy('created_at', 'DESC');
		}

        if ($this->parentEntity == 'user') {
            $this->xPanel->setRoute($this->xPanel->getRoute() . '/user/' . $this->userId . '/list');
            $this->xPanel->setParentKeyField('user_id');
            $this->xPanel->addClause('where', 'user_id', '=', $this->userId);
            $this->xPanel->setParentRoute(admin_uri('users'));
            $this->xPanel->allowAccess(['reorder', 'parent']);
        }

        if ($this->parentEntity == 'package') {
            $this->xPanel->setRoute($this->xPanel->getRoute() . '/package/' . $this->packageId . '/list');
            $this->xPanel->setParentKeyField('package_id');
            $this->xPanel->addClause('where', 'package_id', '=', $this->packageId);
            $this->xPanel->setParentRoute(admin_uri('packages'));
            $this->xPanel->allowAccess(['reorder', 'parent']);
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
			'name'  => 'transaction_id',
			'type'  => 'text',
			'label' => 'Transaction id',
		],
		false,
		function ($value) {
			$this->xPanel->addClause('where', 'transaction_id', '=', $value);
		});
//		// -----------------------
//		$this->xPanel->addFilter([
//			'name'  => 'package',
//			'type'  => 'select2',
//			'label' => trans('admin::messages.Package'),
//		],
//		$this->getPackages(),
//		function ($value) {
//			$this->xPanel->addClause('where', 'package_id', '=', $value);
//		});
		// -----------------------
//		$this->xPanel->addFilter([
//			'name'  => 'payment_method',
//			'type'  => 'dropdown',
//			'label' => trans('admin::messages.Payment Method'),
//		],
//		$this->getPaymentMethods(),
//		function ($value) {
//			$this->xPanel->addClause('where', 'payment_method_id', '=', $value);
//		});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'status',
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
			'name'          => 'user_id',
			'label'         => trans("admin::messages.User Name"),
			'type'          => 'model_function',
			'function_name' => 'getUserNameHtml',
		]);

		$this->xPanel->addColumn([
			'name'          => 'transaction_id',
			'label'         => 'Transaction id',
		]);

		$this->xPanel->addColumn([
			'name'          => 'payment_status',
			'label'         => 'Status',
		]);
		$this->xPanel->addColumn([
			'name'          => 'payment_method_id',
			'label'         => trans("admin::messages.Payment Method"),
			'type'          => 'model_function',
			'function_name' => 'getPaymentMethodNameHtml',
		]);
		
		// FIELDS
	}
	
	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}
	
	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
	
	public function getPackages()
	{
		$entries = Package::trans()->where('price', '>', 0)->orderBy('currency_code', 'asc')->orderBy('lft', 'asc')->get();
		
		$arr = [];
		if ($entries->count() > 0) {
			foreach ($entries as $entry) {
				$arr[$entry->id] = $entry->name . ' (' . $entry->price . ' ' . $entry->currency_code . ')';
			}
		}
		
		return $arr;
	}
	
	public function getPaymentMethods()
	{
		$entries = PaymentMethod::orderBy('lft', 'asc')->get();
		
		$arr = [];
		if ($entries->count() > 0) {
			foreach ($entries as $entry) {
				$arr[$entry->id] = $entry->display_name;
			}
		}
		
		return $arr;
	}
}
