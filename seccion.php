<?php
	include'includes/header.php';
	$id=$_GET['id'];
	$seccion = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM secciones WHERE id='$id'"));
?>
<div class="inner-page-header">
        <div class="banner">
            <img src="<?php echo RUTA ?>images/sexiones/<?php echo $seccion['foto_seccion']; ?>" alt="Banner">
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="<?php echo RUTA ?>index.html">Home <i class="fa fa-compress" aria-hidden="true"></i> </a><?php echo $seccion['nombre']; ?></li>
                            </ul>
                        </div>
                        <div class="header-page-title">
                            <h1><?php echo $seccion['nombre']; ?></h1>
                        </div>
                        <div class="header-page-subtitle">
                            <p><?php echo $seccion['descripcion']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-page-area">
        <div class="container">
            <?php

                if(!isset($_GET['page'])){$page=1;}else{$page=$_GET['page'];}

                $tope=1; $cuenta=1; $ribbon=1;
                if($page!=1){
	                $sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='$id' ORDER BY fecha DESC";
	                $result = $conn->query($sql);
	                if ($result->num_rows > 0) {
	                    while($row = $result->fetch_assoc()) {
	                        $phpdate = strtotime($row['fecha']);
	                        $mysqldate=date('Y-m-d',$phpdate );
	                        $mayor_a=$page-1; $mayor_a=$mayor_a*10;
	                        $menor_a=$menor_a*10; $menor_a=$menor_a+1;
	                        if($cuenta>$mayor_a && $cuenta<$menor_a ){
		                        if ($tope % 2 == 0){}else{echo'<div class="row">';}
		                        echo'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			                            <ul>
			                                <li>
			                                    <div class="carousel-inner">
			                                        <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
			                                        	<div class="blog-image" style="height: 330px; background-image: url(\''.$row['foto'].'\'); background-size: cover; background-position: center;">
			                                        	</div>
			                                        </a>
			                                    </div>
			                                        <h3><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h3>
			                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>'.$mysqldate.'</span>
			                                        <p>'.$row['bajada'].'</p>
			                                </li>
			                            </ul>
			                        </div>';
		                        if($tope % 2 == 0) {echo '</div>'; $cierra=1;}
		                        else {$cierra=0;}
		                    }
	                        $tope=$tope+1; $cuenta=$cuenta+1;
	                    }
	                }
	            } else {
	            	/*bueno este es el if que reproduje par ahacer la priemra pagina del paginado, porque me dio paja ver cual era el error*/
	            	$sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='$id' ORDER BY fecha DESC LIMIT 10";
	                $result = $conn->query($sql);
	                if ($result->num_rows > 0) {
	                    while($row = $result->fetch_assoc()) {
	                        $phpdate = strtotime($row['fecha']);
	                        $mysqldate=date('Y-m-d',$phpdate );

	                            if ($tope % 2 == 0){}else{echo'<div class="row">';}
	                            echo'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			                            <ul>
			                                <li>
			                                    <div class="carousel-inner">
			                                    	<a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
			                                        	<div class="blog-image" style="height: 330px; background-image: url(\''.$row['foto'].'\'); background-size: cover; background-position: center;">
			                                            </div>
			                                        </a>
			                                    </div>
			                                        <h3><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h3>
			                                        <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>'.$mysqldate.'</span>
			                                        <p>'.$row['bajada'].'</p>
			                                </li>
			                            </ul>
			                        </div>';


		                        if($tope % 2 == 0) {echo '</div>'; $cierra=1;}
		                        else {$cierra=0;}

	                        $tope=$tope+1; $cuenta=$cuenta+1;
	                    }
	                }
	            }
                if($cierra===0){echo"</div>";}
            ?>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="pagination-area">
                        <ul>
                            <!--<li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>-->
                            <?php
                            	$kuenta=0;
                            	$sql = "SELECT * FROM articulos WHERE publicada='on' and seccion='$id'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while($row = $result->fetch_assoc()) {
								        if($row['publicada']==="on"){$kuenta=$kuenta+1;}
								    }
								}

								$limite=ceil($kuenta/10);
                            	for ($x=1; $x <= $limite; $x++) {
    								echo "<li><a href='".RUTA."seccion/".$id."/".$x."'>".$x."</a></li>";
								}
                            ?>

                            <!--<li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include'includes/footer.php'; ?>
