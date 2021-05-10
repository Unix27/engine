<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\PackageRequest as StoreRequest;
use App\Http\Requests\Admin\PackageRequest as UpdateRequest;

class PackageController extends PanelController
{
    public $parentEntity = null;
    private $userId = null;

    public function setup()
	{
        // Parents Entities
        $parentEntities = ['search', 'user', 'payment', 'order'];

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

        if ($this->parentEntity == 'order') {
            $order_id = request()->segment(4);
            $order = Order::find($order_id);
        }

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
		$this->xPanel->setModel('App\Models\Package');
        $this->xPanel->with(['order']);
		$this->xPanel->setRoute(admin_uri('packages'));
		$this->xPanel->setEntityNameStrings(trans('admin::messages.package'), trans('admin::messages.packages'));
		$this->xPanel->enableReorder('name', 1);
		$this->xPanel->enableDetailsRow();
		$this->xPanel->allowAccess(['reorder', 'details_row']);
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

        if ($this->parentEntity == 'order') {
            $this->xPanel->setRoute($this->xPanel->getRoute() . '/order/' . $order->id . '/list');
            $this->xPanel->setParentKeyField('order_id');
            $this->xPanel->addClause('where', 'order_id', '=', $order->id);
            $this->xPanel->setParentRoute(admin_uri('packages'));
            $this->xPanel->allowAccess(['reorder', 'parent']);
        }

        $this->xPanel->addButtonFromModelFunction('top', 'bulk_delete_btn', 'bulkDeleteBtn', 'end');
        $this->xPanel->addButtonFromModelFunction('line', 'items', 'itemsBtn', 'end');
        $this->xPanel->addButtonFromModelFunction('line', 'payments', 'paymentsBtn', 'end');

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
			'name'  => 'name',
			'label' => trans("admin::messages.Name"),
		]);
		$this->xPanel->addColumn([
			'name'  => 'order_id',
			'label' => 'Order #',
            'type'          => 'model_function',
            'function_name' => 'getOrderHtml',
		]);
		$this->xPanel->addColumn([
			'name'  => 'order_at',
			'label' => 'Order at',
            'type'          => 'model_function',
            'function_name' => 'getOrderAtHtml',
		]);

        $this->xPanel->addColumn([
            'name'          => 'user_id',
            'label'         => trans("admin::messages.User Name"),
            'type'          => 'model_function',
            'function_name' => 'getUserNameHtml',
        ]);

        $this->xPanel->addColumn([
			'name'  => 'price',
			'label' => 'Delivery price',
		]);
		$this->xPanel->addColumn([
			'name'  => 'currency_code',
			'label' => trans("admin::messages.Currency"),
		]);
        $this->xPanel->addColumn([
            'name'          => 'status',
            'label'         => 'Status',
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
			'name'              => 'name',
			'label'             => trans("admin::messages.Name"),
			'type'              => 'text',
			'attributes'        => [
				'placeholder' => trans("admin::messages.Name"),
			],
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
		]);
		$this->xPanel->addField([
			'name'              => 'short_name',
			'label'             => trans('admin::messages.Short Name'),
			'type'              => 'text',
			'attributes'        => [
				'placeholder' => trans('admin::messages.Short Name'),
			],
			'hint'              => trans('admin::messages.Short Name'),
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
		]);

		$this->xPanel->addField([
			'name'              => 'price',
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
			'name'              => 'currency_code',
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
			'name'              => 'lft',
			'label'             => trans('admin::messages.Position'),
			'type'              => 'text',
			'hint'              => trans('admin::messages.Quick Reorder') . ': '
				. trans('admin::messages.Enter a position number.') . ' '
				. trans('admin::messages.NOTE: High number will allow to show ads in top in ads listing. Low number will allow to show ads in bottom in ads listing.'),
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
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
            'new' => Package::STATUS_NEW,
            'panding' => Package::STATUS_PANDING,
            'success' => Package::STATUS_SUCCESS,
            'error' => Package::STATUS_ERROR,
        ]);
    }
}
