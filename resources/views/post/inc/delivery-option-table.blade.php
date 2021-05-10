<div role="dialog" aria-modal="true" class="next-dialog next-closeable">
    <div class="next-dialog-body">
        <div class="logistics">
            <span class="logistics-vat"></span>
            <div class="choose-delivery">Shipping Method</div>
            <div class="next-loading next-loading-inline" style="display: block;">
                <div class="next-loading-wrap">
                    <div class="next-radio-group next-radio-group-hoz">
                        <div class="table-tr">
                            <div class="table-th">Date</div>
                            <div class="table-th time-cell">Estimated Delivery</div>
                            <div class="table-th cost-cell">Cost</div>
                            <div class="table-th track-cell">Tracking</div>
                            <div class="table-th">Carrier</div>
                        </div>
                        <div class="table-tr active" tabindex="-1">
                            <div class="table-td time-cell">03/17</div>
                            <div class="table-td">Free Shipping</div>
                            <div class="table-td"><i class="next-icon next-icon-select next-small"></i></div>
                            <div class="table-td">
                                <div class="service-name"><span class="logistics-logo logo-sf_eparcel"></span>SF eParcel
                                </div>
                                <div class="service-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>

    .next-dialog[dir=rtl],.next-dialog[dir=rtl] .next-dialog-footer.next-align-left {
        text-align: right
    }

    .next-dialog[dir=rtl] .next-dialog-footer.next-align-center {
        text-align: center
    }

    .next-dialog[dir=rtl] .next-dialog-footer.next-align-right {
        text-align: left
    }

    .next-dialog[dir=rtl] .next-dialog-btn+.next-dialog-btn {
        margin-right: 4px;
        margin-left: 0
    }

    .next-dialog[dir=rtl] .next-dialog-close {
        left: 16px;
        right: auto
    }

    .next-dialog,.next-dialog *,.next-dialog :after,.next-dialog :before {
        box-sizing: border-box
    }

    .next-dialog-header {
        padding: 12px 24px 32px;
        border-bottom: 0 solid transparent;
        font-size: 24px;
        background: transparent;
        color: #000
    }

    .next-dialog-body {
        padding: 20px;
        font-size: 14px;
        color: #000
    }

    .next-dialog-footer {
        padding: 12px 20px;
        border-top: 0 solid transparent;
        background: transparent
    }

    .next-dialog-footer.next-align-left {
        text-align: left
    }

    .next-dialog-footer.next-align-center {
        text-align: center
    }

    .next-dialog-footer.next-align-right {
        text-align: right
    }

    .next-dialog-btn+.next-dialog-btn {
        margin-left: 4px
    }

    .next-dialog-close {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 16px
    }

    .next-dialog-close,.next-dialog-close:link,.next-dialog-close:visited {
        height: 16px;
        color: #999
    }

    .next-dialog-close:hover {
        background: transparent;
        color: #000
    }

    .next-dialog-close .next-dialog-close-icon.next-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -8px;
        margin-left: -8px;
        width: 16px;
        height: 16px;
        line-height: 16px
    }

    .next-dialog-close .next-dialog-close-icon.next-icon:before {
        width: 16px;
        height: 16px;
        font-size: 16px;
        line-height: 16px
    }

    .next-dialog-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1001;
        padding: 40px;
        overflow: auto;
        text-align: center
    }

    .next-dialog-container:before {
        display: inline-block;
        vertical-align: middle;
        width: 0;
        height: 100%;
        content: ""
    }

    .next-dialog-container .next-dialog {
        display: inline-block;
        position: relative;
        vertical-align: middle
    }

    .next-dialog .next-dialog-message.next-message {
        min-width: 300px;
        padding: 0
    }

    .next-dialog-header {
        font-weight: 700;
        padding: 20px 30px 0
    }

    .next-dialog-body {
        padding: 16px 30px 26px;
        line-height: 21px
    }

    .next-dialog-footer {
        padding: 0 30px 30px
    }

    .next-btn.next-btn-primary,.next-btn.next-btn-secondary {
        font-weight: 600
    }

    .next-input {
        vertical-align: middle;
        display: inline-table;
        border-collapse: separate;
        font-size: 0;
        line-height: 1;
        width: 200px;
        border-spacing: 0;
        -webkit-transition: all .3s ease-out;
        transition: all .3s ease-out;
        border: 1px solid #ccc;
        background-color: #fff
    }

    .next-input,.next-input *,.next-input :after,.next-input :before {
        box-sizing: border-box
    }

    .next-input input {
        height: 100%
    }

    .next-input input[type=reset],.next-input input[type=submit] {
        -webkit-appearance: button;
        cursor: pointer
    }

    .next-input input::-moz-focus-inner {
        border: 0;
        padding: 0
    }

    .next-input input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px #fff inset
    }

    .next-input textarea {
        resize: none
    }

    .next-input input,.next-input textarea {
        width: 100%;
        border: none;
        outline: none;
        padding: 0;
        margin: 0;
        font-weight: 400;
        vertical-align: middle;
        background-color: transparent;
        color: #000
    }

    .next-input input::-ms-clear,.next-input textarea::-ms-clear {
        display: none
    }

    .next-input.next-input-textarea {
        border-radius: 4px;
        font-size: 0
    }

    .next-input.next-input-textarea textarea {
        color: #000;
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 4px
    }

    .next-input.next-input-textarea .next-input-control {
        display: block;
        width: auto;
        border-radius: 4px
    }

    .next-input.next-input-textarea .next-input-len {
        padding: 0 12px 4px;
        display: block;
        text-align: right;
        width: auto
    }

    .next-input.next-small {
        height: 32px;
        border-radius: 4px
    }

    .next-input.next-small .next-input-label {
        padding-left: 12px;
        font-size: 12px
    }

    .next-input.next-small .next-input-inner {
        font-size: 12px
    }

    .next-input.next-small .next-input-control {
        padding-right: 8px
    }

    .next-input.next-small input {
        height: 30px;
        line-height: 30px \0;
        padding: 0 8px;
        font-size: 12px
    }

    .next-input.next-small input::-webkit-input-placeholder {
        font-size: 12px
    }

    .next-input.next-small input::-moz-placeholder {
        font-size: 12px
    }

    .next-input.next-small input:-ms-input-placeholder {
        font-size: 12px
    }

    .next-input.next-small input::-ms-input-placeholder {
        font-size: 12px
    }

    .next-input.next-small input::placeholder {
        font-size: 12px
    }

    .next-input.next-small .next-input-text-field {
        padding: 0 8px;
        font-size: 12px;
        height: 30px;
        line-height: 30px
    }

    .next-input.next-small .next-icon:before {
        width: 12px;
        font-size: 12px;
        line-height: inherit
    }

    .next-input.next-small input {
        border-radius: 4px
    }

    .next-input.next-small .next-input-control {
        border-radius: 0 4px 4px 0
    }

    .next-input.next-medium {
        height: 36px;
        border-radius: 4px
    }

    .next-input.next-medium .next-input-label {
        padding-left: 8px;
        font-size: 12px
    }

    .next-input.next-medium .next-input-inner {
        font-size: 12px
    }

    .next-input.next-medium .next-input-control {
        padding-right: 12px
    }

    .next-input.next-medium input {
        height: 34px;
        line-height: 34px \0;
        padding: 0 12px;
        font-size: 12px
    }

    .next-input.next-medium input::-webkit-input-placeholder {
        font-size: 12px
    }

    .next-input.next-medium input::-moz-placeholder {
        font-size: 12px
    }

    .next-input.next-medium input:-ms-input-placeholder {
        font-size: 12px
    }

    .next-input.next-medium input::-ms-input-placeholder {
        font-size: 12px
    }

    .next-input.next-medium input::placeholder {
        font-size: 12px
    }

    .next-input.next-medium .next-input-text-field {
        padding: 0 12px;
        font-size: 12px;
        height: 34px;
        line-height: 34px
    }

    .next-input.next-medium .next-icon:before {
        width: 12px;
        font-size: 12px;
        line-height: inherit
    }

    .next-input.next-medium input {
        border-radius: 4px
    }

    .next-input.next-medium .next-input-control {
        border-radius: 0 4px 4px 0
    }

    .next-input.next-large {
        height: 40px;
        border-radius: 4px
    }

    .next-input.next-large .next-input-label {
        padding-left: 12px;
        font-size: 14px
    }

    .next-input.next-large .next-input-inner {
        font-size: 14px
    }

    .next-input.next-large .next-input-control {
        padding-right: 12px
    }

    .next-input.next-large input {
        height: 38px;
        line-height: 38px \0;
        padding: 0 12px;
        font-size: 14px
    }

    .next-input.next-large input::-webkit-input-placeholder {
        font-size: 14px
    }

    .next-input.next-large input::-moz-placeholder {
        font-size: 14px
    }

    .next-input.next-large input:-ms-input-placeholder {
        font-size: 14px
    }

    .next-input.next-large input::-ms-input-placeholder {
        font-size: 14px
    }

    .next-input.next-large input::placeholder {
        font-size: 14px
    }

    .next-input.next-large .next-input-text-field {
        padding: 0 12px;
        font-size: 14px;
        height: 38px;
        line-height: 38px
    }

    .next-input.next-large .next-icon:before {
        width: 12px;
        font-size: 12px;
        line-height: inherit
    }

    .next-input.next-large input {
        border-radius: 4px
    }

    .next-input.next-large .next-input-control {
        border-radius: 0 4px 4px 0
    }

    .next-input-hint-wrap {
        color: #999;
        position: relative
    }

    .next-input-hint-wrap .next-input-clear {
        opacity: 0;
        z-index: 1;
        position: absolute
    }

    .next-input-hint-wrap .next-input-hint {
        opacity: 1
    }

    .next-input .next-icon-delete-filling:hover {
        cursor: pointer;
        color: #ccc
    }

    .next-input.next-focus,.next-input:hover {
        border-color: #999;
        background-color: #fff
    }

    .next-input.next-focus .next-input-clear,.next-input:hover .next-input-clear {
        opacity: 1
    }

    .next-input.next-focus .next-input-clear+.next-input-hint,.next-input:hover .next-input-clear+.next-input-hint {
        opacity: 0
    }

    .next-input .next-input-clear:focus {
        opacity: 1
    }

    .next-input .next-input-clear:focus+.next-input-hint {
        opacity: 0
    }

    .next-input.next-focus {
        border-color: #666;
        background-color: #fff
    }

    .next-input.next-error,.next-input.next-error.next-focus,.next-input.next-error:hover {
        border-color: #e62e04
    }

    .next-input.next-hidden {
        display: none
    }

    .next-input.next-noborder {
        border: none
    }

    .next-input-control .next-input-len {
        font-size: 12px;
        line-height: 12px;
        color: #666;
        display: table-cell;
        width: 1px;
        vertical-align: bottom
    }

    .next-input-control .next-input-len.next-error {
        color: #e62e04
    }

    .next-input-control>* {
        display: table-cell;
        width: 1%;
        top: 0
    }

    .next-input-control>:not(:last-child) {
        padding-right: 4px
    }

    .next-input-control .next-icon {
        -webkit-transition: all .3s ease-out;
        transition: all .3s ease-out;
        color: #999
    }

    .next-input-control .next-icon-success-filling {
        color: #5bcc00
    }

    .next-input-control .next-icon-loading {
        color: #1c5fbc
    }

    .next-input-label {
        color: #666
    }

    .next-input input::-moz-placeholder,.next-input textarea::-moz-placeholder {
        color: #999;
        opacity: 1
    }

    .next-input input:-ms-input-placeholder,.next-input textarea:-ms-input-placeholder {
        color: #999
    }

    .next-input input::-webkit-input-placeholder,.next-input textarea::-webkit-input-placeholder {
        color: #999
    }

    .next-input.next-disabled {
        color: #999;
        cursor: not-allowed
    }

    .next-input.next-disabled,.next-input.next-disabled:hover {
        border-color: #f2f2f2;
        background-color: #fdfdfd
    }

    .next-input.next-disabled input::-moz-placeholder,.next-input.next-disabled textarea::-moz-placeholder {
        color: #999;
        opacity: 1
    }

    .next-input.next-disabled input:-ms-input-placeholder,.next-input.next-disabled textarea:-ms-input-placeholder {
        color: #999
    }

    .next-input.next-disabled input::-webkit-input-placeholder,.next-input.next-disabled textarea::-webkit-input-placeholder {
        color: #999
    }

    .next-input.next-disabled .next-input-label,.next-input.next-disabled .next-input-len {
        color: #999
    }

    .next-input.next-disabled input,.next-input.next-disabled textarea {
        color: #999;
        border-color: #f2f2f2;
        background-color: #fdfdfd;
        cursor: not-allowed
    }

    .next-input.next-disabled input:hover,.next-input.next-disabled textarea:hover {
        border-color: #f2f2f2;
        background-color: #fdfdfd
    }

    .next-input.next-disabled .next-input-hint-wrap {
        color: #999
    }

    .next-input.next-disabled .next-input-hint-wrap .next-input-clear {
        opacity: 0
    }

    .next-input.next-disabled .next-input-hint-wrap .next-input-hint {
        opacity: 1
    }

    .next-input.next-disabled .next-input-hint-wrap .next-icon-delete-filling:hover {
        cursor: not-allowed;
        color: #999
    }

    .next-input.next-disabled .next-icon {
        color: #999
    }

    .next-input-control,.next-input-inner,.next-input-label {
        display: table-cell;
        width: 1px;
        vertical-align: middle;
        line-height: 1;
        background-color: transparent;
        white-space: nowrap
    }

    .next-input-group {
        display: inline-table;
        border-collapse: separate;
        border-spacing: 0;
        line-height: 0;
        width: 100%
    }

    .next-input-group,.next-input-group *,.next-input-group :after,.next-input-group :before {
        box-sizing: border-box
    }

    .next-input-group-auto-width {
        width: 100%;
        border-radius: 0!important
    }

    .next-input-group>.next-input:first-child.next-large,.next-input-group>.next-input:first-child.next-medium,.next-input-group>.next-input:first-child.next-small {
        border-top-left-radius: 4px!important;
        border-bottom-left-radius: 4px!important
    }

    .next-input-group>.next-input:last-child.next-large,.next-input-group>.next-input:last-child.next-medium,.next-input-group>.next-input:last-child.next-small {
        border-top-right-radius: 4px!important;
        border-bottom-right-radius: 4px!important
    }

    .next-input-group-addon {
        width: 1px;
        display: table-cell;
        vertical-align: middle;
        white-space: nowrap
    }

    .next-input-group-addon:first-child,.next-input-group-addon:first-child>* {
        border-bottom-right-radius: 0!important;
        border-top-right-radius: 0!important
    }

    .next-input-group-addon:last-child,.next-input-group-addon:last-child>* {
        border-bottom-left-radius: 0!important;
        border-top-left-radius: 0!important
    }

    .next-input-group-text {
        color: #666;
        background-color: #f9f9f9;
        text-align: center;
        border: 1px solid #ccc;
        padding: 0 8px
    }

    .next-input-group-text:first-child {
        border-right-width: 0
    }

    .next-input-group-text:last-child {
        border-left-width: 0
    }

    .next-input-group-text.next-disabled {
        color: #999;
        cursor: not-allowed
    }

    .next-input-group-text.next-disabled,.next-input-group-text.next-disabled:hover {
        border-color: #f2f2f2;
        background-color: #fdfdfd
    }

    .next-input-group-text.next-medium,.next-input-group-text.next-small {
        font-size: 12px;
        border-radius: 4px
    }

    .next-input-group-text.next-large {
        font-size: 14px;
        border-radius: 4px
    }

    .next-input[dir=rtl].next-small .next-input-label {
        padding-left: 0;
        padding-right: 12px
    }

    .next-input[dir=rtl].next-small .next-input-control {
        padding-right: 0;
        padding-left: 8px
    }

    .next-input[dir=rtl].next-medium .next-input-label {
        padding-left: 0;
        padding-right: 8px
    }

    .next-input[dir=rtl].next-medium .next-input-control {
        padding-right: 0;
        padding-left: 12px
    }

    .next-input[dir=rtl].next-large .next-input-label {
        padding-left: 0;
        padding-right: 12px
    }

    .next-input[dir=rtl].next-large .next-input-control {
        padding-right: 0;
        padding-left: 12px
    }

    .next-input[dir=rtl].next-input-textarea .next-input-len {
        text-align: left
    }

    .next-input[dir=rtl] .next-input-control>:not(:last-child) {
        padding-left: 4px;
        padding-right: 0
    }

    .next-input-group[dir=rtl] .next-input-group-addon:first-child {
        border-bottom-left-radius: 0!important;
        border-top-left-radius: 0!important
    }

    .next-input-group[dir=rtl] .next-input-group-addon:first-child.next-large,.next-input-group[dir=rtl] .next-input-group-addon:first-child.next-medium,.next-input-group[dir=rtl] .next-input-group-addon:first-child.next-small {
        border-bottom-right-radius: 4px!important;
        border-top-right-radius: 4px!important
    }

    .next-input-group[dir=rtl] .next-input-group-addon:last-child {
        border-bottom-right-radius: 0!important;
        border-top-right-radius: 0!important
    }

    .next-input-group[dir=rtl] .next-input-group-addon:last-child.next-large,.next-input-group[dir=rtl] .next-input-group-addon:last-child.next-medium,.next-input-group[dir=rtl] .next-input-group-addon:last-child.next-small {
        border-bottom-left-radius: 4px!important;
        border-top-left-radius: 4px!important
    }

    .next-input-group[dir=rtl] .next-input-group-text:first-child {
        border-right-width: 1px;
        border-left: 0
    }

    .next-input-group[dir=rtl] .next-input-group-text:last-child {
        border-left-width: 1px;
        border-right: 0
    }

    .next-balloon {
        position: absolute;
        max-width: 300px;
        border-style: solid;
        border-radius: 4px;
        word-wrap: break-word;
        z-index: 0
    }

    .next-balloon,.next-balloon *,.next-balloon :after,.next-balloon :before {
        box-sizing: border-box
    }

    .next-balloon-primary {
        color: #e62e04;
        border-color: #e62e04;
        background-color: #fff;
        box-shadow: 3px 3px 14px 0 rgba(220,136,136,.2);
        border-width: 1px
    }

    .next-balloon-primary .next-balloon-close {
        position: absolute;
        top: 16px;
        right: 20px;
        font-size: 12px;
        color: #999
    }

    .next-balloon-primary .next-balloon-close .next-icon {
        width: 12px;
        height: 12px;
        line-height: 12px
    }

    .next-balloon-primary .next-balloon-close .next-icon:before {
        width: 12px;
        height: 12px;
        font-size: 12px;
        line-height: 12px
    }

    .next-balloon-primary .next-balloon-close :hover {
        color: #666
    }

    .next-balloon-primary:after {
        position: absolute;
        width: 12px;
        height: 12px;
        content: " ";
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        box-sizing: content-box!important;
        border: 1px solid #e62e04;
        background-color: #fff;
        z-index: -1
    }

    .next-balloon-primary.next-balloon-top:after {
        top: -7px;
        left: calc(50% + -7px);
        border-right: none;
        border-bottom: none;
        box-shadow: -1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-right:after {
        top: calc(50% + -7px);
        right: -7px;
        border-left: none;
        border-bottom: none;
        box-shadow: 1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-bottom:after {
        bottom: -7px;
        left: calc(50% + -7px);
        border-top: none;
        border-left: none;
        box-shadow: 1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-left:after {
        top: calc(50% + -7px);
        left: -7px;
        border-top: none;
        border-right: none;
        box-shadow: -1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-left-top:after {
        top: 12px;
        left: -7px;
        border-top: none;
        border-right: none;
        box-shadow: -1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-left-bottom:after {
        bottom: 12px;
        left: -7px;
        border-top: none;
        border-right: none;
        box-shadow: -1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-right-top:after {
        top: 12px;
        right: -7px;
        border-bottom: none;
        border-left: none;
        box-shadow: 1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-right-bottom:after {
        right: -7px;
        bottom: 12px;
        border-bottom: none;
        border-left: none;
        box-shadow: 1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-top-left:after {
        top: -7px;
        left: 12px;
        border-right: none;
        border-bottom: none;
        box-shadow: -1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-top-right:after {
        top: -7px;
        right: 12px;
        border-right: none;
        border-bottom: none;
        box-shadow: -1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-bottom-left:after {
        bottom: -7px;
        left: 12px;
        border-top: none;
        border-left: none;
        box-shadow: 1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-primary.next-balloon-bottom-right:after {
        right: 12px;
        bottom: -7px;
        border-top: none;
        border-left: none;
        box-shadow: 1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal {
        color: #000;
        border-color: #ccc;
        background-color: #fff;
        box-shadow: 1px 1px 8px 0 rgba(0,0,0,.12);
        border-width: 1px
    }

    .next-balloon-normal .next-balloon-close {
        position: absolute;
        top: 16px;
        right: 20px;
        font-size: 12px;
        color: #999
    }

    .next-balloon-normal .next-balloon-close .next-icon {
        width: 12px;
        height: 12px;
        line-height: 12px
    }

    .next-balloon-normal .next-balloon-close .next-icon:before {
        width: 12px;
        height: 12px;
        font-size: 12px;
        line-height: 12px
    }

    .next-balloon-normal .next-balloon-close :hover {
        color: #666
    }

    .next-balloon-normal:after {
        position: absolute;
        width: 12px;
        height: 12px;
        content: " ";
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        box-sizing: content-box!important;
        border: 1px solid #ccc;
        background-color: #fff;
        z-index: -1
    }

    .next-balloon-normal.next-balloon-top:after {
        top: -7px;
        left: calc(50% + -7px);
        border-right: none;
        border-bottom: none;
        box-shadow: -1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-right:after {
        top: calc(50% + -7px);
        right: -7px;
        border-left: none;
        border-bottom: none;
        box-shadow: 1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-bottom:after {
        bottom: -7px;
        left: calc(50% + -7px);
        border-top: none;
        border-left: none;
        box-shadow: 1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-left:after {
        top: calc(50% + -7px);
        left: -7px;
        border-top: none;
        border-right: none;
        box-shadow: -1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-left-top:after {
        top: 12px;
        left: -7px;
        border-top: none;
        border-right: none;
        box-shadow: -1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-left-bottom:after {
        bottom: 12px;
        left: -7px;
        border-top: none;
        border-right: none;
        box-shadow: -1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-right-top:after {
        top: 12px;
        right: -7px;
        border-bottom: none;
        border-left: none;
        box-shadow: 1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-right-bottom:after {
        right: -7px;
        bottom: 12px;
        border-bottom: none;
        border-left: none;
        box-shadow: 1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-top-left:after {
        top: -7px;
        left: 12px;
        border-right: none;
        border-bottom: none;
        box-shadow: -1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-top-right:after {
        top: -7px;
        right: 12px;
        border-right: none;
        border-bottom: none;
        box-shadow: -1px -1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-bottom-left:after {
        bottom: -7px;
        left: 12px;
        border-top: none;
        border-left: none;
        box-shadow: 1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon-normal.next-balloon-bottom-right:after {
        right: 12px;
        bottom: -7px;
        border-top: none;
        border-left: none;
        box-shadow: 1px 1px 1px 0 rgba(0,0,0,.1)
    }

    .next-balloon.visible {
        display: block
    }

    .next-balloon.hidden {
        display: none
    }

    .next-balloon-medium {
        padding: 16px 20px
    }

    .next-balloon-closable {
        padding: 16px 48px 16px 20px
    }

    .next-balloon-tooltip {
        box-sizing: border-box;
        position: absolute;
        max-width: 300px;
        border-radius: 4px;
        font-size: 14px;
        z-index: 0;
        color: #000;
        background-color: #fff;
        box-shadow: none;
        border: 1px solid #ccc
    }

    .logistics .choose-delivery {
        margin-top: 24px;
        font-size: 14px;
        color: #000;
        font-weight: 700;
    }
    .logistics .table-tr {
        cursor: pointer;
        display: table-row;
        height: 30px;
    }
    .logistics .table-tr .table-th.no-border {
        border: 0;
        width: 40px;
    }
    .logistics .table-tr .table-th {
        display: table-cell;
        text-align: left;
        height: 100%;
        border-bottom: 1px solid #f2f2f2;
        vertical-align: middle;
        font-size: 13px;
        color: #999;
        padding: 12px 12px 12px 0;
    }
    .logistics .table-tr .cost-cell {
        min-width: 100px;
    }
    .logistics .table-tr .cost-cell {
        width: 140px;
    }
    .logistics .table-tr .table-th {
        display: table-cell;
        text-align: left;
        height: 100%;
        border-bottom: 1px solid #f2f2f2;
        vertical-align: middle;
        font-size: 13px;
        color: #999;
        padding: 12px 12px 12px 0;
    }
    .logistics .table-tr .track-cell {
        width: 80px;
    }
    .logistics .table-tr .table-td {
        display: table-cell;
        text-align: left;
        height: 100%;
        vertical-align: top;
        padding: 8px 0;
        font-size: 13px;
    }
    .logistics .table-tr .time-cell {
        width: 200px;
    }
    .logistics .active .next-icon {
        color: #ff4747;
    }
    .next-dialog, .next-dialog *, .next-dialog :after, .next-dialog :before {
        box-sizing: border-box;
    }
    .next-icon {
        display: inline-block;
        font-family: NextIcon;
        font-style: normal;
        font-weight: 400;
        text-transform: none;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .next-icon.next-small:before {
        width: 16px;
        font-size: 16px;
        line-height: inherit;
    }
</style>
