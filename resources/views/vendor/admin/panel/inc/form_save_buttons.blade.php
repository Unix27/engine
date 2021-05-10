<div style="display: flex">
    <div>
        @if(!empty($saveAction['options']['wizard_post_id']))
            <div class="btn-group dropup" id="postEditListWizardBtn" data-post-id="{{ $saveAction['options']['wizard_post_id'] }}" style="margin-right: 2px">
                <button type="button" class="btn btn-primary ladda-button">
                    <span class="fa fa-magic" role="presentation" aria-hidden="true"></span> &nbsp;<span data-value="">Choose a Parser</span>
                </button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Parsers Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    @foreach(\App\Models\Post::$services as $service)
                        <li><a href="#" data-post_id="{{ $saveAction['options']['wizard_post_id'] }}" data-value="{{ $service }}">{{ ucfirst($service) }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div id="saveActions" class="form-group">

        <input type="hidden" name="save_action" value="{{ $saveAction['active']['value'] }}">

        <div class="btn-group">

            <button type="submit" class="btn btn-success">
                <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
                <span data-value="{{ $saveAction['active']['value'] }}">{{ $saveAction['active']['label'] }}</span>
            </button>

            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Save Dropdown</span>
            </button>

            <ul class="dropdown-menu">
                @foreach( $saveAction['options'] as $value => $label)
                    <li><a href="javascript:void(0);" data-value="{{ $value }}">{{ $label }}</a></li>
                @endforeach
            </ul>

        </div>

        <a href="{{ url($xPanel->route) }}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;{{ trans('admin::messages.cancel') }}</a>
    </div>
</div>
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
