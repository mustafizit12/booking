<script src="<?php echo e(asset('plugins/moment.js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bs4-datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables/table-datatables-responsive.min.js')); ?>"></script>

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
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/layouts/includes/list-js.blade.php ENDPATH**/ ?>