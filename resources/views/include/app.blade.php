<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-4.min.css') }}">


    {{-- <link rel="stylesheet" href="{{asset('assets/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
    <!-- JQVMap -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('datatables-bs4/css/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    {{-- <link rel="stylesheet" href="{{asset('assets/daterangepicker/daterangepicker.css')}}"> --}}
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @if (session('success'))
        <style>
            /* مثال فقط إذا bootstrap يؤثر على الأيقونات */
            .swal2-icon.swal2-success {
                display: flex !important;
                background: inherit !important;
                color: inherit !important;
                font-size: 0, 8em !important;
            }
        </style>
    @elseif (session('error'))
        <style>
            /* مثال فقط إذا bootstrap يؤثر على الأيقونات */
            .swal2-icon.swal2-error {
                display: flex !important;
                background: inherit !important;
                color: inherit !important;
                font-size: 0, 8em !important;
            }


        </style>
    @endif
<style>


.dataTables_wrapper {
    overflow-x:scroll !important;
    max-height: 500px !important;
}
.dataTables_scrollHead {
    position: relative !important;
}
    </style>
    
</head>
{{-- hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed --}}
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('include.navbar')


        @include('include.sidebar')

        @include('include.content')

        @include('include.footer')



        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    {{-- <script src="{{asset('assets/jquery-ui/jquery-ui.min.js')}}"></script> --}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    {{-- <script src="plugins/chart.js/Chart.min.js"></script> --}}
    <!-- Sparkline -->
    {{-- <script src="plugins/sparklines/sparkline.js"></script> --}}
    <!-- JQVMap -->
    {{-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> --}}
    {{-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> --}}
    <!-- daterangepicker -->

    {{-- <script src="{{asset('assets/moment/moment.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/daterangepicker/daterangepicker.js')}}"></script> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src="{{asset('assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}
    <!-- Summernote -->
    {{-- <script src="{{asset('assets/summernote/summernote-bs4.min.js')}}"></script> --}}
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->

    <!-- SweetAlert2 JS -->
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>



    <!-- تحميل jQuery -->

    <!-- تحميل DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- تحميل Bootstrap 4 لـ DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>





    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <script src="{{ asset('/assets/select2/js/select2.full.min.js') }}"></script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'نجاح',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top',
                    timer: 3000,
                    background: '#80FF00',
                    timerProgressBar: true,
                    showConfirmButton: false,
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ',
                    text: '{{ session('error') }}',
                    toast: true,
                    position: 'top',
                    background: 'lightcoral',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                });
            });
        </script>
    @endif
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });
        })

        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    type: 'success',
                    title: 'تم اضافة البيانات بنجاح.'
                })
            });

            $('.swalDefaultError').click(function() {
                Toast.fire({
                    type: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });

        });


        $(document).ready(function() {
            $('#example1').DataTable({
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "lengthMenu": "عرض _MENU_ سجل",
                    "zeroRecords": "لا توجد سجلات",
                    "info": "عرض صفحة _PAGE_ من _PAGES_",
                    "infoEmpty": "لا توجد سجلات متاحة",
                    "infoFiltered": "(تم تصفية _MAX_ من السجلات)",
                    "search": "بحث:",
                    "paginate": {
                        "first": "الأول",
                        "last": "الأخير",
                        "next": "التالي",
                        "previous": "السابق"
                    }
                }
            });
        });
    </script>

</body>

</html>
