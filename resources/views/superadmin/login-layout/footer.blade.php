    </div>
</div>

<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
    <!--Data Table-->
    <script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/dataTables.responsive.min.js')}}"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/admin/js/dataTables.responsive.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    @stack('scripts')
    <script>
    $(document).ready(function() {
        toastr.options.timeOut = 5000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
    </script>
</body>
</html>