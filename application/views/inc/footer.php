<!-- Essential javascripts for application to work-->
    <script src="<?= base_url();?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url();?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url();?>/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?= base_url();?>/assets/js/plugins/chart.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript">
      $('#Notify').click(function(){
        $.notify({
          title: "Okay! ",
          message: "Something cool is just updated!",
          icon: 'fa fa-check' 
        },{
          type: "info"
        });
      });
  </body>
</html>