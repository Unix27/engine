<div class="simpleRegister">
    <div class="simpleContainer" data-transitioned-child="true">
        <div class="centerContainer narrowCenterContainer" style="display: block; transform: none; opacity: 1; transition-duration: 250ms;">
            <div class="planFormContainer" data-uia="form-plan-selection">
                <div>
                    <div class="stepHeader-container" data-uia="header">
                        <div class="stepHeader" data-a11y-focus="true" tabindex="0">
                            <span class="stepIndicator" data-uia="" id="">@lang('register.step_1_title')</span>
                            <h1 class="stepTitle" data-uia="stepTitle">@lang('register.step_1_subtitle')</h1>
                        </div>
                    </div>
                </div>
                <div class="planGrid planGrid--has3Plans" data-uia="plan-grid">
                    <div class="planGrid__header">
                        <div aria-describedby="planGrid_planChoice_description" aria-label="Plan" class="planGrid__selector planGrid__planSelector" data-uia="plan-grid-plan-selector" role="radiogroup">
                            <span aria-hidden="true" class="planGrid__selectorDescription" data-uia="plan-grid-plan-selector+description" id="planGrid_planChoice_description">Select the plan you'd like</span>
                            {{--<label class="planGrid__selectorChoice planGrid__planChoice" data-uia="plan-grid-plan-selector+label-text_1_stream_name" for="planGrid_planChoice_0">
                                <input class="planGrid__selectorInput planGrid__planInput" data-uia="plan-grid-plan-selector+input-text_1_stream_name" id="planGrid_planChoice_0" name="planChoice" type="radio" value="114001031">
                                <span class="planGrid__selectorLabel planGrid__planLabel">Basic</span>
                            </label>
                            <label class="planGrid__selectorChoice planGrid__planChoice" data-uia="plan-grid-plan-selector+label-text_2_stream_name" for="planGrid_planChoice_1">
                                <input class="planGrid__selectorInput planGrid__planInput" data-uia="plan-grid-plan-selector+input-text_2_stream_name" id="planGrid_planChoice_1" name="planChoice" type="radio" value="10318">
                                <span class="planGrid__selectorLabel planGrid__planLabel">Standard</span>
                            </label>--}}
                            <label class="planGrid__selectorChoice planGrid__planChoice" data-uia="plan-grid-plan-selector+label-text_4_stream_name" for="planGrid_planChoice_2">
                                <input checked class="planGrid__selectorInput planGrid__planInput" data-uia="plan-grid-plan-selector+input-text_4_stream_name" id="planGrid_planChoice_2" name="planChoice" type="radio" value="10338">
                                <span class="planGrid__selectorLabel planGrid__planLabel">@lang('register.step_1_subscribe')</span>
                            </label>
                        </div>
                    </div>
                    <table class="planGrid__featureTable" data-uia="plan-grid-feature-table" role="table">
                        <tbody class="planGrid__featureTableBody" data-uia="plan-grid-feature-table-body">
                        <tr class="planGrid__featureTableRow" role="row">
                            <td class="planGrid__cell planGrid__featureCell" data-uia="plan-grid-feature-table-cell+planPrice-feature" role="cell">@lang('register.step_1_discount')</td>
                            {{--<td aria-label="Basic" class="planGrid__cell planGrid__stringCell" data-uia="plan-grid-feature-table-cell+planPrice-text_1_stream_name" role="cell">EUR7.99</td>
                            <td aria-label="Standard" class="planGrid__cell planGrid__stringCell" data-uia="plan-grid-feature-table-cell+planPrice-text_2_stream_name" role="cell">EUR9.99</td>--}}
                            <td aria-label="Premium" class="planGrid__cell planGrid__cell--isSelected planGrid__stringCell" data-uia="plan-grid-feature-table-cell+planPrice-text_4_stream_name" role="cell">€8,33/mo*</td>
                        </tr>
                        <tr class="planGrid__featureTableRow" role="row">
                            <td class="planGrid__cell planGrid__featureCell" data-uia="plan-grid-feature-table-cell+planHasHd-feature" role="cell">@lang('register.step_1_economy')</td>
                            {{--<td aria-label="Basic" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+planHasHd-text_1_stream_name" role="cell"><span class="planGrid__booleanLabel">No</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-x planGrid__booleanGraphic" id="thin-x" viewbox="0 0 26 26">
								<path d="M10.5 9.3L1.8 0.5 0.5 1.8 9.3 10.5 0.5 19.3 1.8 20.5 10.5 11.8 19.3 20.5 20.5 19.3 11.8 10.5 20.5 1.8 19.3 0.5 10.5 9.3Z"></path></svg></span></td>
                            <td aria-label="Standard" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+planHasHd-text_2_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>--}}
                            <td aria-label="Premium" class="planGrid__cell planGrid__cell--isSelected planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+planHasHd-text_4_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                        </tr>
                        <tr class="planGrid__featureTableRow" role="row">
                            <td class="planGrid__cell planGrid__featureCell" data-uia="plan-grid-feature-table-cell+planHasUltraHd-feature" role="cell">@lang('register.step_1_fast_db')</td>
                            {{--<td aria-label="Basic" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+planHasUltraHd-text_1_stream_name" role="cell"><span class="planGrid__booleanLabel">No</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-x planGrid__booleanGraphic" id="thin-x" viewbox="0 0 26 26">
								<path d="M10.5 9.3L1.8 0.5 0.5 1.8 9.3 10.5 0.5 19.3 1.8 20.5 10.5 11.8 19.3 20.5 20.5 19.3 11.8 10.5 20.5 1.8 19.3 0.5 10.5 9.3Z"></path></svg></span></td>
                            <td aria-label="Standard" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+planHasUltraHd-text_2_stream_name" role="cell"><span class="planGrid__booleanLabel">No</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-x planGrid__booleanGraphic" id="thin-x" viewbox="0 0 26 26">
								<path d="M10.5 9.3L1.8 0.5 0.5 1.8 9.3 10.5 0.5 19.3 1.8 20.5 10.5 11.8 19.3 20.5 20.5 19.3 11.8 10.5 20.5 1.8 19.3 0.5 10.5 9.3Z"></path></svg></span></td>--}}
                            <td aria-label="Premium" class="planGrid__cell planGrid__cell--isSelected planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+planHasUltraHd-text_4_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                        </tr>
                        <tr class="planGrid__featureTableRow" role="row">
                            <td class="planGrid__cell planGrid__featureCell" data-uia="plan-grid-feature-table-cell+planMaxScreenCount-feature" role="cell">@lang('register.step_1_all_articles')</td>
                            {{--<td aria-label="Basic" class="planGrid__cell planGrid__stringCell" data-uia="plan-grid-feature-table-cell+planMaxScreenCount-text_1_stream_name" role="cell">1</td>
                            <td aria-label="Standard" class="planGrid__cell planGrid__stringCell" data-uia="plan-grid-feature-table-cell+planMaxScreenCount-text_2_stream_name" role="cell">2</td>--}}
                            <td aria-label="Premium" class="planGrid__cell planGrid__cell--isSelected planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+planHasHd-text_4_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                        </tr>
                        <tr class="planGrid__featureTableRow" role="row">
                            <td class="planGrid__cell planGrid__featureCell" data-uia="plan-grid-feature-table-cell+4-feature" role="cell">@lang('register.step_1_unique_props')</td>
                            {{--<td aria-label="Basic" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+4-text_1_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                            <td aria-label="Standard" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+4-text_2_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>--}}
                            <td aria-label="Premium" class="planGrid__cell planGrid__cell--isSelected planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+4-text_4_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                        </tr>
                        <tr class="planGrid__featureTableRow" role="row">
                            <td class="planGrid__cell planGrid__featureCell" data-uia="plan-grid-feature-table-cell+5-feature" role="cell">@lang('register.step_1_test')</td>
                            {{--<td aria-label="Basic" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+5-text_1_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                            <td aria-label="Standard" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+5-text_2_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>--}}
                            <td aria-label="Premium" class="planGrid__cell planGrid__cell--isSelected planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+5-text_4_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                        </tr>
                        <tr class="planGrid__featureTableRow" role="row">
                            <td class="planGrid__cell planGrid__featureCell" data-uia="plan-grid-feature-table-cell+6-feature" role="cell">@lang('register.step_1_hz')</td>
                            {{--<td aria-label="Basic" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+6-text_1_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                            <td aria-label="Standard" class="planGrid__cell planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+6-text_2_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>--}}
                            <td aria-label="Premium" class="planGrid__cell planGrid__cell--isSelected planGrid__booleanCell" data-uia="plan-grid-feature-table-cell+6-text_4_stream_name" role="cell"><span class="planGrid__booleanLabel">Yes</span><span aria-hidden="true" class="planGrid__booleanIcon"><svg class="svg-icon svg-icon-thin-check planGrid__booleanGraphic" id="thin-check" viewbox="0 0 26 26">
								<path d="M9.19 22.892L.5 14.198l1.232-1.233 7.236 7.24L23.793.516l1.38 1.04L9.19 22.892"></path></svg></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="loadingText">
                <div class="loadingTextContent">
                    <span></span>
                </div>
            </div>
            <div class="submitBtnContainer">
                <a class="nf-btn nf-btn-primary nf-btn-solid nf-btn-oversize" data-uia="cta-plan-selection" type="button" href="{{route('regstep2')}}">@lang('register.step_1_btn2')</a>
            </div>
        </div>
    </div>
</div>
