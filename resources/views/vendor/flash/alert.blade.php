<script src="{{ asset('vendor/admin') }}/sweetalert2/sweetalert2.all.min.js"></script>
@if (Session::has('alert.config'))
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif
