<?php include 'header.php';
	
	if(isset($_GET['borrar'])){
		$id=$_GET['borrar'];
		$sql="DELETE FROM fallos WHERE id='$id'";
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
	            		<th>Fallo</th>
	            		<th>Link</th>
	            		<th>Fecha</th>
	            		<th></th>
	            		<th></th>	            		
	        		</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    				$sql = "SELECT * FROM fallos";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        echo "	        		
							        <tr>
					            		<td>".$row['titulo']."</td>
					            		<td>".$row['link']."</td>
					            		<td>".$row['fecha']."</td>
					            		<td><a href='fallo.php?id=".$row['id']."'>EDITAR</a></td>
					            		<td><a href='fallos.php?id=".$row['id']."&borrar'>BORRAR</a></td>
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