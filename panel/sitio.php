<?php ob_start();
	include 'header.php'; 

 	if(isset($_GET['actualizar'])){
 		$titulo=$_POST['titulo']; $id=$_GET['id']; $link=$_POST['link']; $secsion=$_POST['secsion']; 
 		$sql = "UPDATE sitios SET titulo='$titulo', link='$link', seccion='$secsion' WHERE id='$id'";
 		if ($conn->query($sql) === TRUE) {}
 	}

 	if(isset($_GET['nuevo'])){
 		$titulo=$_POST['titulo']; $id=$_GET['id']; $link=$_POST['link']; $foto=$_POST['foto']; 
 		$sql = "INSERT INTO sitios (titulo, link, foto) VALUES ('$titulo', '$link', '$foto')";
 		if ($conn->query($sql) === TRUE) {header('Location: sitios.php');}
 	}
 
 	if(isset($_GET['id'])){
 		$id=$_GET['id'];
 		$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sitios WHERE id='$id'"));
 	}
  if(isset($fetch)){$sexion=$fetch['seccion'];}
?>
<style type="text/css">
  label {
    display: inline-block;
    margin-bottom: 5px;
    margin-top: 25px;
  }
</style>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
          <form class="form-group" <?php if(isset($_GET['id'])){echo'action="sitio.php?actualizar&id='.$id.'"';}else{echo'action="sitio.php?nuevo"';} ?>  method="post">
        		<label>Nombre del Sitio</label>
		        <input type="text" name="titulo" class="form-control" <?php if(isset($_GET['id'])){echo'value="'.$fetch['titulo'].'"';} ?> >
		        <label>Link del Sitio</label>
		        <input type="text" name="link" class="form-control" <?php if(isset($_GET['id'])){echo'value="'.$fetch['link'].'"';} ?> >
		        <label>Sección</label>
            <select style="width: 100%" name="secsion">
              <?php
                $sql = "SELECT * FROM seccion_sitios";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo"<option value='".$row['id']."' ";
                    if(isset($fetch)){if($row['id']===$sexion){echo" selected";}}
                    echo" >".$row['nombre']."</option>";
                  }
                }
              ?>
            </select>
		        <input style="margin-top: 25px;" type="submit" class="btn btn-info" value="Subir">
		    </form>
        </div>
      </div>
    </div>
 <?php include 'footer.php'; ?>