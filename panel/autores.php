 <?php 
 	include 'header.php'; ?>
 	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
        	 <table id="myTable" class="display">
	    		<thead>
	        		<tr>
	            		<th>Nombre</th>
	            		<th>Apellido</th>
	            		<th>Mail</th>
	            		<th></th>
	            		<th></th>	            		
	        		</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    				$sql = "SELECT * FROM autores";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        echo "	        		
							        <tr>
					            		<td>".$row['nombre']."</td>
					            		<td>".$row['apellido']."</td>
					            		<td>".$row['mail']."</td>
					            		<td><a href='autor.php?id=".$row['id']."'>EDITAR</a></td>
					            		<td><a href='autor.php?do=borrar&id=".$row['id']."'>BORRAR</a></td>
					        		</tr>";
						    }
						}
	    			?>
	    		</tbody>
			</table>
        </div>
      </div>
    </div>
<?php 
 	include 'footer.php'; ?>
