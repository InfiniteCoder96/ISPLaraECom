<script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('admin/lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{asset('admin/lib/jquery-toggles/toggles.min.js')}}"></script>
<script src="{{asset('admin/lib/d3/d3.js')}}"></script>
<script src="{{asset('admin/lib/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('admin/lib/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin/lib/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin/lib/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('admin/lib/flot-spline/jquery.flot.spline.js')}}"></script>
<script src="{{asset('admin/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/lib/datatables-responsive/dataTables.responsive.js')}}"></script>


<script src="{{asset('admin/js/amanda.js')}}"></script>
<script src="{{asset('admin/js/ResizeSensor.js')}}"></script>
<script src="{{asset('admin/js/dashboard.js')}}"></script>

<script>
    $(function(){
        'use strict';

        $('#datatable11').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>
</body>
</html>
