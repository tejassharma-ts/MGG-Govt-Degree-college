  <!-- Footer -->

</div>


  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/simplebar/simplebar.min.js"></script>
  <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



  <script src="plugins/apexcharts/apexcharts.js"></script>



  <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>



  <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>



  <script src="plugins/daterangepicker/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <script>
jQuery(document).ready(function() {
    jQuery('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
    });
    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
        jQuery(this).val('');
    });
});
  </script>



  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



  <script src="plugins/toaster/toastr.min.js"></script>



  <script src="js1/mono.js"></script>
  <script src="js1/chart.js"></script>
  <script src="js1/map.js"></script>
  <script src="js1/custom.js"></script>


  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->




  </body>

  </html>