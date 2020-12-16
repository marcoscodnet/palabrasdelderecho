<?php mysqli_close($conn);?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <!---->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable({
            "order": [[ 2, "desc" ]]
          });
    } );
  </script>
  <!---->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=n6vr3upqwo1luecz9a5k2iz2mgd8ctddw5h5258jyzs0zahy"></script>
  <script>
    tinymce.init({ 
      selector:'#cuerpo', 
      height : "400",
      theme: 'modern',
      plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
     toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat image',
     //image_advtab: true,
     // without images_upload_url set, Upload tab won't show up
     images_upload_url: 'upload.php',
     images_upload_base_path: 'http://palabrasdelderecho.com.ar/panel',
     // override default upload handler to simulate successful upload
     images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
	      
	        xhr = new XMLHttpRequest();
	        xhr.withCredentials = false;
	        xhr.open('POST', 'upload.php');
	      
	        xhr.onload = function() {
	            var json;
	        
	            if (xhr.status != 200) {
	                failure('HTTP Error: ' + xhr.status);
	                return;
	            }
	        
	            json = JSON.parse(xhr.responseText);
	        
	            if (!json || typeof json.location != 'string') {
	                failure('Invalid JSON: ' + xhr.responseText);
	                return;
	            }
	        
	            success(json.location);
	        };
	      
	        formData = new FormData();
	        formData.append('file', blobInfo.blob(), blobInfo.filename());
	      
	        xhr.send(formData);
	    },
    });
  </script>
  </div>
</body>

</html>
