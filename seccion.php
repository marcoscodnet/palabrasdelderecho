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
<?php
$notasprohibidas=[];
if ($id==1){ ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding-0">
            <div class="slider-area">
                <div class="bend niceties preview-2">
                    <div id="ensign-nivoslider" class="slides">
                        <?php

                        $sql = "SELECT * FROM articulos WHERE seccion=1 AND publicada='on' AND destacada1='on' ORDER BY id DESC LIMIT 1";
                        //echo $sql;
                        $result = $conn->query($sql);
                        $tope=1;
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if($tope<4){
                                    echo'<img src="'.$row['foto'].'" alt="" title="#slider-direction-'.$tope.'" class="foti-desti" />';
                                    $notasprohibidas[]=$row['id'];
                                }
                                $tope=$tope+1;
                            }
                        }
                        ?>
                    </div>
                    <!-- direction 2 -->
                    <?php
                    $sql = "SELECT * FROM articulos WHERE seccion=1 AND publicada='on' AND destacada1='on' ORDER BY id DESC LIMIT 1";
                    //echo $sql;
                    $result = $conn->query($sql);
                    $tope=1;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if($tope<4){
                                $phpdate = strtotime($row['fecha']);
                                $mysqldate=date('Y-m-d',$phpdate );

                                $num_seccion=$row['seccion'];
                                $fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM secciones WHERE id='$num_seccion'"));
                                $bajada=$row['bajada']; $baj_rec=substr($bajada,0,180);
                                $notasprohibidas[]=$row['id'];
                                echo '
			        					<div id="slider-direction-'.$tope.'" class="slider-direction">
				                            <div class="slider-content t-cn s-tb slider-'.$tope.'">
				                                <div class="title-container s-tb-c">
				                                    <div class="slider-botton">
				                                        <ul>
				                                            <li>
				                                                <a class="cat-link" href="'.RUTA.'seccion/'.$fetch['id'].'/1/'.seo_url($fetch['nombre']).'">'.$fetch['nombre'].'</a>
				                                                <span class="date">
				                                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>'.$mysqldate.'
				                                                </span>
				                                                <span class="comment none">
				                                                    <a href="#">
				                                                    	<i class="fa fa-comment-o" aria-hidden="true"></i> 50
				                                                    </a>
				                                                </span>
				                                            </li>
				                                        </ul>
				                                    </div>
				                                    <h1 class="title1"><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h1>
				                                    <div class="title2">'.$baj_rec;
                                if(strlen($bajada)>180){echo"...";}
                                echo'</div>
				                                </div>
				                            </div>
				                        </div>';
                                $tope=$tope+1;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Slider Area End Here-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none">
            <div class="slider-right">
                <ul>
                    <?php
                    $sql = "SELECT * FROM articulos WHERE seccion=1 AND publicada='on' AND destacada2='on' ORDER BY id";
                    $result = $conn->query($sql);
                    $tope=0;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if($tope<2){
                                $phpdate = strtotime($row['fecha']);
                                $mysqldate=date('Y-m-d',$phpdate );
                                $num_seccion=$row['seccion'];
                                $fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM secciones WHERE id='$num_seccion'"));
                                $notasprohibidas[]=$row['id'];
                                echo '
			        					<li class="top-right-slider1">
				                            <div class="right-content ">
				                                <span class="category">
				                                	<a class="cat-link" href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$fetch['nombre'].'</a>
				                                </span>
				                                <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i>'.$mysqldate.'</span>
				                                <h3><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h3>
				                            </div>
				                            <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
				                            	<div class="right-image" style="height: 255px; background-image: url(\''.$row['foto'].'\'); background-size: cover;">
				                            	</div>
				                            </a>
				                        </li>';
                                $tope=$tope+1;
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } ?>
    <div class="blog-page-area">
        <div class="container">
            <?php
                $strprohibidas=implode(",", $notasprohibidas);
                if(!isset($_GET['page'])){$page=1;}else{$page=$_GET['page'];}

                $tope=1; $cuenta=1; $ribbon=1;
                if($page!=1){
	                $sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='$id' AND id not in (".$strprohibidas.") ORDER BY fecha DESC";
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
	            	$sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='$id' AND id not in (".$strprohibidas.") ORDER BY fecha DESC LIMIT 10";
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
                            	$sql = "SELECT * FROM articulos WHERE publicada='on' AND id not in (".$strprohibidas.") and seccion='$id'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while($row = $result->fetch_assoc()) {
								        if($row['publicada']==="on"){$kuenta=$kuenta+1;}
								    }
								}

								$limite=ceil($kuenta/10);
                            	for ($x=1; $x <= $limite; $x++) {
                            	    $style = '';
                            	    if ($x==$page){

                                        $style = ' style="line-height: 40px;color:red;"';
                                    }
    								echo "<li><a ".$style." href='".RUTA."seccion/".$id."/".$x."/".$seccion['nombre']."'>".$x."</a></li>";
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
