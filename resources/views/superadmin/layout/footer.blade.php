<script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <!--Data Table-->
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/js/dataTables.checkboxes.min.js') }}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>

    <!--Fontawesome-->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/side-offcanvas.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    @stack('scripts')

    <script>
        // datatable
        // $('.myTable').DataTable({
        //     responsive: true,
        //     "bLengthChange": false,
        //     "bFilter": false,
        // });

        /* Advance Wizard Tabs for add form tabs */
        $(".add-next").click(function () {
            const nextTabLinkEl = $("#myTab .active")
                .closest("li")
                .next("li")
                .find("a")[0];
            const nextTab = new bootstrap.Tab(nextTabLinkEl);
            nextTab.show();
        });
        $(".add-previous").click(function () {
            const prevTabLinkEl = $("#myTab .active")
                .closest("li")
                .prev("li")
                .find("a")[0];
            const prevTab = new bootstrap.Tab(prevTabLinkEl);
            prevTab.show();
        });

        /* Advance Wizard Tabs for edit form tabs */
        $(".next").click(function () {
            const nextTabLinkEl = $("#myTab1 .active")
                .closest("li")
                .next("li")
                .find("a")[0];
            const nextTab = new bootstrap.Tab(nextTabLinkEl);
            nextTab.show();
        });
        $(".previous").click(function () {
            const prevTabLinkEl = $("#myTab1 .active")
                .closest("li")
                .prev("li")
                .find("a")[0];
            const prevTab = new bootstrap.Tab(prevTabLinkEl);
            prevTab.show();
        });

       
        // Select Records
        $(function () {
            $('.speciality-kids-records').hide();
            $('#select-records').change(function () {
                $('.kids-filter-records').hide();
                $('#' + $(this).val()).show();
            });
        });
    </script>

    <script>
    // $(document).ready(function() {
    //     // toastr.options.timeOut = 5000;
    //     // @if (Session::has('error'))
    //     //     toastr.error('{{ Session::get('error') }}');
    //     // @elseif(Session::has('success'))
    //     //     toastr.success('{{ Session::get('success') }}');
    //     // @endif
    // });
    </script>