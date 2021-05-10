@if(!empty($product))
    <section class="content" id="wizard-preview">
        <form method="POST" action="" accept-charset="UTF-8">
            @csrf
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box box-primary">
                        <div class="box-body row">
                            @if($categories)
                                <div class="form-group col-md-12">
                                    <label>Category</label>
                                    <select name="category_id" style="width: 100%"
                                            class="form-control select2_from_array" tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $key => $cat)
                                            <option value="{{ $key }}">{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input disabled type="text" name="title" value="{{ $product->getTitle() }}"
                                       placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea disabled type="text" name="description"
                                          value="{{ $product->getDescription() }}" placeholder="Description"
                                          class="form-control">
                                    {{ trim(strip_tags($product->getDescription())) }}
                                </textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Pictures</label>
                                @foreach($product->getImages() as $image)
                                    <div style="display: block; text-align: center;">
                                        <div style="margin: 10px 5px; display: inline-block;">
                                            <img src="{{ $image }}" style="width:320px; height:auto;">
                                        </div>
                                    </div>
                                @endforeach
                                <div style="clear: both;"></div>
                            </div>
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