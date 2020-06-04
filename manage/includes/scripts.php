<!-- jQuery 3 -->
<script src="<?=$OCPATH.$assets['bower']?>jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=$OCPATH.$assets['bower']?>jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="<?=$OCPATH.$assets['bower']?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=$OCPATH.$assets['bower']?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=$OCPATH.$assets['bower']?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?=$OCPATH.$assets['bower']?>raphael/raphael.min.js"></script>
<script src="<?=$OCPATH.$assets['bower']?>morris.js/morris.min.js"></script>
<!-- ChartJS -->
<script src="<?=$OCPATH.$assets['bower']?>chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="<?=$OCPATH.$assets['bower']?>jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=$OCPATH.$plugins['*']?>jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=$OCPATH.$plugins['*']?>jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=$OCPATH.$assets['bower']?>jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=$OCPATH.$assets['bower']?>moment/min/moment.min.js"></script>
<script src="<?=$OCPATH.$assets['bower']?>bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=$OCPATH.$assets['bower']?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=$OCPATH.$plugins['*']?>timepicker/bootstrap-timepicker.min.js"></script>
<!-- Select2 -->
<script src="<?=$OCPATH.$assets['bower']?>select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=$OCPATH.$plugins['*']?>input-mask/jquery.inputmask.js"></script>
<script src="<?=$OCPATH.$plugins['*']?>input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=$OCPATH.$plugins['*']?>input-mask/jquery.inputmask.extensions.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?=$OCPATH.$plugins['*']?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=$OCPATH.$assets['bower']?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$OCPATH.$assets['bower']?>fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$OCPATH.$assets['dst']?>js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=$OCPATH.$assets['dst']?>js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -- >
<script src="< ?=$OCPATH.$assets['dst']?>js/demo.js"></script-->
 
<script>
  $(function () {
	  $('.select2').select2()
	  
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<script>

$(function(){
	
	//Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })
  

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

});
</script>
