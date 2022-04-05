<script src="{{ asset('plugins/moment.js/moment.min.js') }}"></script>
<script src="{{ asset('plugins/bs4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables/table-datatables-responsive.min.js')}}"></script>

<script type="text/javascript">
    //Init jquery Date Picker
    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('.time24').datetimepicker({
      //defaultDate: new Date(),
        format: 'HH:mm',
        //useCurrent: false
    });
</script>
