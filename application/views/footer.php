  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      B+ Amin
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2021 <a target="_blank" href="https://youtu.be/Dp6DcNwEkrM">FCBOI.Inc</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url(); ?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<script>
  function searchFunc() {
      var input, filter, row, li, a, i, txtValue;
      input = document.getElementById("searchhome");
      filter = input.value.toUpperCase();
      row = document.getElementById("rowcatalog");
      li = row.getElementsByClassName("coursecat");
      for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByClassName("class-bg")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      }
  }
  // $(document).ready(function () {
  //   $('#join1').on('click', function(){
  //     $.ajax({
  //       url: '<?php echo base_url() ?>home/join',
  //       type: 'POST',
  //       data: {
  //         username: user[0]->username,
  //         idcourse: $(this).val(),
  //         joined: false
  //       },
  //       cache: false,
  //       success: function(dataRes){
  //         var dataRes = JSON.parse(dataRes);
  //         if(dataRes.statusCode==200) {
  //           $(this).removeClass('btn-info');
  //           $(this).addClass('btn-secondary disabled');
  //           $(this).text('Waiting Approval');
  //         } else {
  //           alert("Error occured !");
  //         }
  //       }
  //     });
  //   });
  // });

  $(document).ready(function() {
    var t = $('#summernote').summernote(
      {
      height: 200,
      focus: true
    });
    var y = $('#summernote1').summernote(
      {
      height: 200,
      focus: true
    });
  });
  //Date picker
  $('#birthdate1').datetimepicker({
      format: 'L'
  });
  $('#deadline1').datetimepicker({ icons: { time: 'far fa-clock' } });

</script>
</body>
</html>
