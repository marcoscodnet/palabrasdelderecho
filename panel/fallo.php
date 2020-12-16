<?php ob_start();
 	include 'header.php'; 
 
 	if(isset($_GET['actualizar'])){
 		$titulo=$_POST['titulo']; $id=$_GET['id']; $link=$_POST['link']; 
 		$sql = "UPDATE fallos SET titulo='$titulo', link='$link' WHERE id='$id'";
 		if ($conn->query($sql) === TRUE) {}
 	}

 	if(isset($_GET['nuevo'])){
 		$titulo=$_POST['titulo']; $id=$_GET['id']; $link=$_POST['link']; $hoy=date('y-m-d');
 		$sql = "INSERT INTO fallos (titulo, link, fecha) VALUES ('$titulo', '$link', '$hoy')";
 		if ($conn->query($sql) === TRUE) {header('Location: fallos.php');}
 	}
 
 	if(isset($_GET['id'])){
 		$id=$_GET['id'];
 		$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fallos WHERE id='$id'"));
 	}

 ?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
        	<form class="form-group" <?php if(isset($_GET['id'])){echo'action="fallo.php?actualizar&id='.$id.'"';}else{echo'action="fallo.php?nuevo"';} ?>  method="post">
        		<label>Título del Fallo</label>
		        <input type="text" name="titulo" class="form-control" <?php if(isset($_GET['id'])){echo'value="'.$fetch['titulo'].'"';} ?> >
		        <label>Link del Fallo</label>
		        <input type="text" name="link" class="form-control" <?php if(isset($_GET['id'])){echo'value="'.$fetch['link'].'"';} ?> >
		        <input type="submit" name="">
		    </form>
        </div>
      </div>
    </div>
 <?php include 'footer.php'; ?>