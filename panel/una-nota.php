<?php ob_start(); include 'header.php'; if(isset($_GET['id'])){$id=$_GET['id'];}
    $url = "http://palabrasdelderecho.com.ar";
    //echo $_SERVER['SERVER_NAME'];
    if ($_SERVER['SERVER_NAME'] == "localhost") {
        $url = "http://localhost/palabrasdelderecho";
    } elseif ($_SERVER['SERVER_NAME'] == "test.palabrasdelderecho.com.ar") {
        $url = "http://test.palabrasdelderecho.com.ar ";
    }

	if (isset($_POST['submit-foto'])) {
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
		) && ($_FILES["file"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {

			if ($_FILES["file"]["error"] > 0) {
				echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			} else {
				echo "<div style='display: none'>";
				echo "<span>Your File Uploaded Succesfully...!!</span><br/>";
				echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
				echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
				echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
				if (file_exists("../upload/" . $_FILES["file"]["name"])) {
					$nuevo_nombre="1".$_FILES["file"]["name"];
					move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $nuevo_nombre);
					$imgFullpath = $url . "/upload/" . $nuevo_nombre;
					echo "<b>Stored in:</b><a href = '$imgFullpath' target='_blank'> " .$imgFullpath.'<a>';

					$sql = "UPDATE articulos SET foto='$imgFullpath' WHERE id=$id";
					if ($conn->query($sql) === TRUE) {
						header("Location: una-nota.php?id=".$id."&roger1");
					}
					else {echo "Error updating record roger: " . $conn->error;}
				} else {
					move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"]);
					$imgFullpath = $url . "/upload/" . $_FILES["file"]["name"];
					echo "<b>Stored in:</b><a href = '$imgFullpath' target='_blank'> " .$imgFullpath.'<a>';

					$sql = "UPDATE articulos SET foto='$imgFullpath' WHERE id=$id";
					if ($conn->query($sql) === TRUE) {
						header("Location: una-nota.php?id=".$id."&pepe1");
					}
					else {echo "Error updating record pepe: " . $conn->error;}
				}
				echo "</div>";
			}
		} else {
			echo "<span>***Tamaño o tipo de foto inválidos***<span>";
		}
	}
	$destacada1="";
    $destacada2="";
    $noticia1="";
    $noticia2="";
    $noticia3="";
    switch ($_POST['destacadas']) {
        case "1":
            $destacada1="on";
            break;
        case "2":
            $destacada2="on";
            break;
        case "3":
            $noticia1="on";
            break;
        case "4":
            $noticia2="on";
            break;
        case "5":
            $noticia3="on";
            break;
    }
 	if(isset($_GET['actualizar'])){
 		$titulo=$_POST['titulo']; $bajada=$_POST['bajada'];
 		$cuerpo=mysqli_real_escape_string($conn, $_POST['cuerpo']);
 		$fecha=$_POST['fecha']; $seccion=$_POST['seccion']; $autor=$_POST['autor'];
 		$id=$_GET['id']; $publicada=$_POST['publicada']; $foto=$_POST['foto'];






 		 $tags=$_POST['tags'];
 		$autor_invitado=$_POST['autor_invitado'];
 		$sql = "UPDATE articulos SET titulo='$titulo', bajada='$bajada', cuerpo='$cuerpo', seccion='$seccion', foto='$foto', fecha='$fecha', publicada='$publicada', autor='$autor', destacada1='$destacada1', destacada2='$destacada2', noticia1='$noticia1', noticia2='$noticia2', noticia3='$noticia3', tags='$tags', autor_invitado='$autor_invitado' WHERE id=$id";
		if ($conn->query($sql) === TRUE) {
			header("Location: una-nota.php?id=".$id);
		}
		else{echo "Error: " . $sql . "<br>" . $conn->error;}
 	}

 	if(isset($_GET['nueva'])){
 		$titulo=$_POST['titulo']; $bajada=$_POST['bajada'];
 		$cuerpo=mysqli_real_escape_string($conn, $_POST['cuerpo']);
 		$fecha=$_POST['fecha']; $seccion=$_POST['seccion']; $autor=$_POST['autor'];
 			$id=$_GET['id'];
 		$publicada=$_POST['publicada']; $foto=$_POST['foto']; $autor_invitado=$_POST['autor_invitado'];
 		$sql = "INSERT INTO articulos (titulo, bajada, cuerpo, seccion, foto, fecha, publicada, autor, destacada1, destacada2, noticia1, noticia2, noticia3, tags, autor_invitado) VALUES ('$titulo', '$bajada', '$cuerpo','$seccion','$foto', '$fecha', '$publicada', '$autor', '$destacada1', '$destacada2', '$noticia1', '$noticia2', '$noticia3', '$tags', '$autor_invitado')";
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			header('Location: una-nota.php?id='.$last_id);
		}
 	}

 	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM articulos WHERE id='$id'"));}



 ?>
 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 	<script type="text/javascript">
 		$(document).ready(function() {
			// Function for Preview Image.
			$(function() {
				$(":file").change(function() {
					if (this.files && this.files[0]) {
						var reader = new FileReader();
						reader.onload = imageIsLoaded;
						reader.readAsDataURL(this.files[0]);
					}
				});
			});
			function imageIsLoaded(e) {
				$('#message').css("display", "none");
				$('#preview').css("display", "block");
				$('#previewimg').attr('src', e.target.result);
			};
			// Function for Deleting Preview Image.
			$("#deleteimg").click(function() {
				$('#preview').css("display", "none");
				$('#file').val("");
			});
			// Function for Displaying Details of Uploaded Image.
			$("#submit").click(function() {
				$('#preview').css("display", "none");
				$('#message').css("display", "block");
			});
		});
 	</script>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
          <form class="form-group" method="post" <?php if(isset($_GET['id'])){echo'action="una-nota.php?id='.$id.'&actualizar"';}else{echo'action="una-nota.php?nueva"';} ?> >
          	<div class="col-md-9 float-left">
	          	<input type="text" name="titulo" placeholder="Título" class="form-control" <?php if(isset($_GET['id'])){echo'value="'.htmlentities($fetch['titulo']).'"';} ?>>
	          	<textarea style="margin: 20px 0;" name="bajada" class="form-control" placeholder="Bajada"><?php if(isset($_GET['id'])){echo htmlentities($fetch['bajada']);} ?></textarea>
	          	<textarea id="cuerpo" name="cuerpo"  class="form-control" placeholder="Cuerpo de la Nota"><?php if(isset($_GET['id'])){echo $fetch['cuerpo'];} ?></textarea>
	        </div>
	        <div class="col-md-3 float-right">

	        	<?php
	        		if(isset($_GET['id'])){
	        			echo'<input style="width: 100%; " class="btn btn-success" type="submit" value="ACTUALIZAR">';
	        		} else {
	        			echo'<input style="width: 100%; " class="btn btn-success" type="submit" value="PUBLICAR">';
	        		}
	        	?>

				<input style="width: 100%; margin-top:15px" type="date" name="fecha" <?php if(isset($_GET['id'])){echo 'value="'.$fetch['fecha'].'"';}else{echo 'value="'.date('Y-m-d').'"';} ?>>

	        	<?php
	        		echo"<select name='seccion' style='width: 100%; margin-top: 20px; margin-bottom: 20px;'>";
	        			$sql = "SELECT * FROM secciones";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
        						echo "<option ";
        						if(isset($fetch)){if($fetch['seccion']===$row['id']){echo"selected";}}
        						echo" value='".$row['id']."'>".$row['nombre']."</option>";
    						}
						}
	        		echo"</select>";
	        	?>



	        	<div class="col-md-6 float-left">
                    <input type="checkbox" name="publicada" <?php if(isset($fetch)){if($fetch['publicada']==="on"){echo"checked";}} ?>>Publicada
	        	</div>


                <?php
                echo"<select name='destacadas' style='width: 100%; margin-top: 20px; margin-bottom: 20px;'>";

                        echo "<option value='0'>Seleccionar...</option>";
                        echo "<option ";
                        if(isset($fetch)){if($fetch['destacada1']==="on"){echo"selected";}}
                        echo " value='1'>Destacada 1</option>";
                        echo "<option ";
                        if(isset($fetch)){if($fetch['destacada2']==="on"){echo"selected";}}
                        echo " value='2'>Destacada 2</option>";
                        echo "<option ";
                        if(isset($fetch)){if($fetch['noticia1']==="on"){echo"selected";}}
                        echo " value='3'>Noticia 1</option>";
                        echo "<option ";
                        if(isset($fetch)){if($fetch['noticia2']==="on"){echo"selected";}}
                        echo " value='4'>Noticia 2</option>";
                        echo "<option ";
                        if(isset($fetch)){if($fetch['noticia3']==="on"){echo"selected";}}
                        echo " value='5'>Noticia 3</option>";
                echo"</select>";
                ?>


		        <div style="width: 100%; float: left; margin-top: 10px">
		        	<label><b>tags (separadas por comas)</b></label>
		        	<input type="text" name="tags" value="<?php if(isset($fetch)){echo $fetch['tags'];} ?>" style="width: 100%" >
		        </div>

		        <div style="width: 100%; float: left; margin-top: 10px">
		        	<label><b>autor invitado (si está vacío, figura el del staff)</b></label>
		        	<input type="text" name="autor_invitado" value="<?php if(isset($fetch)){echo $fetch['autor_invitado'];} ?>" style="width: 100%" >
		        </div>

	        	<?php
	        		echo"<select name='autor' style='width: 100%; margin-top: 20px; margin-bottom: 20px;'>";
	        			$sql = "SELECT * FROM autores";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
        						echo "<option ";
        						if(isset($fetch)){if($fetch['autor']===$row['id']){echo"selected";}}
        						echo" value='".$row['id']."'>".$row['nombre']." ".$row['apellido']."</option>";
    						}
						}
	        		echo"</select>";
	        	?>

 			</form>
	 			<div <?php if(!isset($_GET['id'])){echo"style='display: none'";} ?> >
	 				<!--LINEA FANTASMA-->
	        		<input style="width: 100%" type="text" name="foto" <?php if(isset($fetch)){if($fetch['foto']!=""){echo'value="'.$fetch['foto'].'"';}} ?> >
	 				<?php
	 					if(isset($fetch)){
		 					if($fetch['foto']!=""){
		 						echo"<img style='width: 100%' src='".$fetch['foto']."'>";
		 					}
		 				}
	 				?>
	 				<style type="text/css">
				 		#upload{width: 100%; height: 35px; background-image: url(img/subirfoto.jpg);
				    		background-repeat: no-repeat; box-shadow: 0 0 10px grey;
				    		background-size: 100%;}
				 		#file{opacity: 0; height: 35px; cursor: pointer; width: 100%}
				 		#previewimg{width: 100%}
				 	</style>

		        	<form action="una-nota.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" id="form" method="post" name="form">
						<div id="upload">
							<input id="file" name="file" type="file">
						</div>
						<input id="submit" name="submit-foto" type="submit" value="Subir Foto Destacada">
					</form>
					<div id="preview">
						<img id="previewimg" src="">
					</div>
					<div id="message">

					</div>
				</div>
	        </div>

        </div>
      </div>
    </div>
 <?php include 'footer.php'; ?>
