<?php 
 	include 'header.php'; 

 	if(isset($_GET['actualizar'])){
		$id=$_GET['id'];
 		$nombre=$_POST['nombre']; $apellido=$_POST['apellido']; $mail=$_POST['mail']; 
 		$descripcion=$_POST['descripcion']; $foto=$_POST['foto'];
 		$sql = "UPDATE autores SET nombre='$nombre', apellido='$apellido', mail='$mail', descripcion='$descripcion', foto='$foto' WHERE id='$id'";
		if ($conn->query($sql) === TRUE) {}
 	}

 	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM autores WHERE id='$id'"));
	}

?>
 	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
      		<form class="form-group" method="post" <?php if(isset($_GET['id'])){echo'action="autor.php?id='.$id.'&actualizar"';}else{echo'action="autor.php?&nueva"';} ?> >
      			<div class="col-md-12 float-left">
	      			<div class="col-md-6 float-left">	
	      				<label>Nombre</label>
	      				<input class="form-control" type="text" name="nombre" <?php if(isset($_GET['id'])){echo "value= '".$fetch['nombre']."'";} ?> >
	      			</div>
	      			<div class="col-md-6 float-left">
	      				<label>Apellido</label>
	      				<input class="form-control" type="text" name="apellido" <?php if(isset($_GET['id'])){echo "value= '".$fetch['apellido']."'";} ?> >
	      			</div>
      			</div>
      			<div class="col-md-12 float-left">
	      			<div class="col-md-6 float-left">	
	      				<label>Mail</label>
	      				<input class="form-control" type="text" name="mail" <?php if(isset($_GET['id'])){echo "value= '".$fetch['mail']."'";} ?> >
	      			</div>
      			</div>
      			<div class="col-md-12 float-left">
      				<div class="col-md-12 float-left">
	      				<label>Descripción</label>
	      				<textarea id="cuerpo" style="height: 180px" name="descripcion" class="form-control"><?php if(isset($_GET['id'])){echo $fetch['descripcion'];} ?></textarea>
	      			</div>
      			</div>
      			<div class="col-md-12 float-left">
      				<div class="col-md-12 float-left">
      					<input type="submit"  class="btn btn-success">		
      				</div>
      			</div>
      		</form>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
