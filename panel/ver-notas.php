<?php
	include 'header.php';
	if(isset($_GET['borrar'])){
		$id=$_GET['borrar'];
		$sql = "DELETE FROM articulos WHERE id='$id'";
		if ($conn->query($sql) === TRUE) {}
	}


?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
	        <table id="myTable" class="display">
	    		<thead>
	        		<tr>
	            		<th>Título</th>
	            		<th>Seccion</th>
	            		<th>Fecha</th>
	            		<th></th>
	            		<th></th>
	        		</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    				$sql = "SELECT * FROM articulos ORDER BY id DESC";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	$saxion=$row['seccion'];
						    	$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM secciones WHERE id='$saxion'"));
						        echo "
							        <tr>
					            		<td>".$row['titulo']."</td>
					            		<td>".$fetch['nombre']."</td>
					            		<td>".$row['fecha']."</td>
					            		<td><a href='una-nota.php?id=".$row['id']."'>EDITAR</a></td>
					            		<td><a href='ver-notas.php?borrar=".$row['id']."'>BORRAR</a></td>
					        		</tr>";
						    }
						}
	    			?>
	    		</tbody>
			</table>
        </div>
      </div>
    </div>

 <?php include 'footer.php'; ?>
