<div class="wizard-products-list-container wizard-list-table">
    <div class="form-group col-md-12">
        <label>Title</label>
        <input disabled type="text" value="{{ $product_name }}" placeholder="Title" class="form-control">
    </div>
    <div class="form-group col-md-12 wizard-product-description">
        <label>Description</label>
{{--        <table class="wizard-product-description">--}}
            {!! $product_description !!}
{{--        </table>--}}
    </div>
    <div class="form-group col-md-12">
        <label>Price, {{ $currency }}</label>
        <input disabled type="text" name="price" value="{{ $price }}" placeholder="Price" class="form-control">
    </div>
    <div class="form-group col-md-12">
        <label>Approximately price</label>
        <input disabled type="text" name="approximately_price" value="{{ $approximately_price }}" placeholder="Approximately price" class="form-control">
    </div>
    <div class="form-group col-md-12" style="height: 30% !important;
    flex-grow: 1 !important;
    overflow-y: auto !important;">
        <label>Pictures</label>
        <div style="display: flex; flex-wrap: wrap; justify-content: flex-start">
        @foreach($product_images as $image)
            <img src="{{ $image }}" style="max-width:80px; max-height:80px; margin-right: 15px; margin-bottom: 15px">
        @endforeach
        </div>
        <div style="clear: both;"></div>
    </div>
</div>