

    <link rel="stylesheet" href="<?php echo base_url()?>formBuilder/src/css/style.css">


      <div id="formBuilder"></div>

     

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>formBuilder/src/libraries/dust-js/dust-core-0.3.0.min.js"></script>
    <script src="<?php echo base_url()?>formBuilder/src/libraries/dust-js/dust-full-0.3.0.min.js"></script>
    <script src="<?php echo base_url()?>formBuilder/src/libraries/dust-js/dust-helpers.js"></script>
    <script src="<?php echo base_url()?>formBuilder/src/libraries/tabs.jquery.js"></script>
    <script src="<?php echo base_url()?>formBuilder/src/formBuilder.jquery.js"></script>


    <script>

      $('#formBuilder').formBuilder({
        
        load_url: '<?php echo base_url()?>formBuilder/src/json/example.json',
        save_url: 'http://192.168.1.254/restoration/admin/category/render',
        
        onSaveForm: function() {
          // redirect to demo page
          window.location.href = '<?php echo base_url()?>formBuilder/demo/render.php';
        }

      });

    </script>
<style type="text/css">
.right-col #sortable-elements .form-element{border: 0px solid #cdcdcd;}
</style>