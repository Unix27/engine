@if(!empty($data))
    <section class="content">
        <form method="POST" action="" accept-charset="UTF-8">
            @csrf
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box box-primary">
                        <div class="box-body row">
                            <div class="form-group col-md-12">
                                <label>Category</label>
                                <select name="category_id" style="width: 100%" class="form-control select2_from_array" tabindex="-1" aria-hidden="true">
                                    @foreach($data['categories'] as $key => $cat)
                                        <option value="{{ $key }}">{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if(!empty($data['de']))
                                <div class="form-group col-md-12">
                                    <label>Title DE</label>
                                    <input disabled type="text" name="title_de" value="{{ $data['de']['title'] }}" placeholder="Title DE" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Description DE</label>
                                    <textarea disabled type="text" name="description_de" value="{{ $data['de']['description'] }}" placeholder="Description DE" class="form-control">
                                    {{ trim(strip_tags($data['de']['description'])) }}
                                </textarea>
                                </div>
                            @endif
                            <div class="form-group col-md-12">
                                <label>Title EN</label>
                                <input disabled type="text" name="title" value="{{ $data['en']['title'] }}" placeholder="Title EN" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description EN</label>
                                <textarea disabled type="text" name="description" value="{{ $data['en']['description'] }}" placeholder="Description EN" class="form-control">
                                    {{ trim(strip_tags($data['en']['description'])) }}
                                </textarea>
                            </div>
                            @if(!empty($data['de']['price']))
                            <div class="form-group col-md-6">
                                <label>Price DE</label>
                                <input disabled type="text" name="price_de" value="{{ $data['de']['price'] }}" placeholder="Price DE" class="form-control">
                            </div>
                            @endif
                            @if(!empty($data['de']['old_price']))
                            <div class="form-group col-md-6">
                                <label>Old Price DE</label>
                                <input disabled type="text" name="old_price_de" value="{{ $data['de']['old_price'] }}" placeholder="Old Price DE" class="form-control">
                            </div>
                            @endif
                            @if(!empty($data['de']['price_from']))
                            <div class="form-group col-md-6">
                                <label>Price From DE</label>
                                <input disabled type="text" name="price_from_de" value="{{ $data['de']['price_from'] }}" placeholder="Price From DE" class="form-control">
                            </div>
                            @endif
                            @if(!empty($data['de']['price_to']))
                                <div class="form-group col-md-6">
                                    <label>Price To DE</label>
                                    <input disabled type="text" name="price_to_de" value="{{ $data['de']['price_to'] }}" placeholder="Price To DE" class="form-control">
                                </div>
                            @endif
                            @if(!empty($data['en']['price']))
                            <div class="form-group col-md-6">
                                <label>Price EN</label>
                                <input disabled type="text" name="price" value="{{ $data['en']['price'] }}" placeholder="Price EN" class="form-control">
                            </div>
                            @endif
                            @if(!empty($data['en']['old_price']))
                            <div class="form-group col-md-6">
                                <label>Old Price EN</label>
                                <input disabled type="text" name="old_price" value="{{ $data['en']['old_price'] }}" placeholder="Old Price EN" class="form-control">
                            </div>
                            @endif
                            @if(!empty($data['en']['price_from']))
                                <div class="form-group col-md-6">
                                    <label>Price From EN</label>
                                    <input disabled type="text" name="price_from" value="{{ $data['en']['price_from'] }}" placeholder="Price From EN" class="form-control">
                                </div>
                            @endif
                            @if(!empty($data['en']['price_to']))
                                <div class="form-group col-md-6">
                                    <label>Price To EN</label>
                                    <input disabled type="text" name="price_to" value="{{ $data['en']['price_to'] }}" placeholder="Price To EN" class="form-control">
                                </div>
                            @endif
                            @if(!empty($data['de']['images']))
                                <div class="form-group col-md-12">
                                    <label>Pictures DE</label>
                                    @foreach($data['de']['images'] as $image)
                                        <div style="display: block; text-align: center;">
                                            <div style="margin: 10px 5px; display: inline-block;">
                                                <img src="{{ $image }}" style="width:320px; height:auto;">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div style="clear: both;"></div>
                                </div>
                            @elseif(!empty($data['en']['images']))
                                <div class="form-group col-md-12">
                                    <label>Pictures DE</label>
                                    @foreach($data['en']['images'] as $image)
                                        <div style="display: block; text-align: center;">
                                            <div style="margin: 10px 5px; display: inline-block;">
                                                <img src="{{ $image }}" style="width:320px; height:auto;">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div style="clear: both;"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@else
    <div class="wizard-products-list-no-matches-container">
        <span class="text-capitalize">No matches found!</span>
    </div>
@endif
<style>
    div.swal2-popup {
        max-height: 100% !important;
    }
    div.swal2-content {
        height: 30% !important;
        flex-grow: 1 !important;
        overflow-y: auto !important;
    }
    table.wizard-list-table {
        font-size: 1.4rem;
        text-align: left
    }
    table.wizard-product-description h2 {
        font-size: 1rem;
    }
    table.wizard-product-description td {
        min-width: 100px;
        text-align: left;
    }
    div.wizard-products-list-container {
        min-width: 400px
    }
    div.wizard-products-list-no-matches-container {
        min-width: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    button.wizard-apply-button {
        padding: 5px 12px;
    }
</style>