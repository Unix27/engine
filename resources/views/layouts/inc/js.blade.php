<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script defer src="{{ assetVer('app.min.js', '', 'build', 'js/') }}"></script>
<script src="{{ asset('vendor/admin') }}/sweetalert2/sweetalert2.all.min.js"></script>
<script src="{{ url('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ url('js/jquery.validate.min.js') }}"></script>
@if(app()->getLocale() == 'de')
    <script src="{{ url('js/messages_de.js') }}"></script>
@endif

