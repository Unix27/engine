@extends('layouts.master')

@section('content')
    <div class="main-container account">
        @include('common.spacer')
        <div class="container">
            <div class="row">

                @if (Session::has('flash_notification'))
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                @include('flash::message')
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-3 page-sidebar">
                    @include('account.inc.sidebar')
                </div>
                <!--/.page-sidebar-->
                <div class="col-sm-9 page-content">
                    <h3 class="text-center">{{ $page->title }}</h3>
                    <div class="text-content text-left from-wysiwyg">
                        {!! $page->content !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('before_styles')
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ assetVer('cabinet.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection
@section('after_styles')
    <style>
        .action-td p {
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('after_scripts')
    <script src="{{ url('assets/js/footable.js?v=2-0-1') }}" type="text/javascript"></script>
    <script src="{{ url('assets/js/footable.filter.js?v=2-0-1') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#addManageTable').footable().bind('footable_filtering', function (e) {
                var selected = $('.filter-status').find(':selected').text();
                if (selected && selected.length > 0) {
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                }
            });

            $('.clear-filter').click(function (e) {
                e.preventDefault();
                $('.filter-status').val('');
                $('table.demo').trigger('footable_clear_filter');
            });

            $('#checkAll').click(function () {
                checkAll(this);
            });

            $('a.delete-action, button.delete-action, a.confirm-action').click(function (e) {
                e.preventDefault(); /* prevents the submit or reload */
                var confirmation = confirm("{{ t('confirm_this_action') }}");

                if (confirmation) {
                    if ($(this).is('a')) {
                        var url = $(this).attr('href');
                        if (url !== 'undefined') {
                            redirect(url);
                        }
                    } else {
                        $('form[name=listForm]').submit();
                    }

                }

                return false;
            });
        });
    </script>
    <!-- include custom script for ads table [select all checkbox]  -->
    <script>
        function checkAll(bx) {
            var chkinput = document.getElementsByTagName('input');
            for (var i = 0; i < chkinput.length; i++) {
                if (chkinput[i].type == 'checkbox') {
                    chkinput[i].checked = bx.checked;
                }
            }
        }
    </script>
@endsection
