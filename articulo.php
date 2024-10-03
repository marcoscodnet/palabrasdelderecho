<?php
    include'includes/header.php';
	$id2=$_GET['id'];

    //$fetch2=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM notas WHERE id='$id2'"));
    $eutor=$fetch['autor'];
    $tags = explode(",", $fetch['tags']);
    $num_seccion=$fetch['seccion'];
    $seccion = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM secciones WHERE id='$num_seccion'"));
    $nombre_seccion=$seccion['nombre'];
    $autor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM autores WHERE id='$eutor'"));


?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&autoLogAppEvents=1&version=v3.0&appId=1645656972157015';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style type="text/css">
	.single-blog-page-area h3{font-size: 24px}
	.single-blog-page-area {padding: 20px 0 0;}
</style>
<div class="single-blog-page-area">
        <div class="container" id="cuerpo-articulo">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                	<h3 id="titulo-articulo"><?php echo $fetch['titulo']; ?></h3>
                	<p style="margin-bottom: 0px"><?php echo $fetch['bajada']; ?></p>
                	<div class="row" style="margin: 10px -15px 16px;">
                		<div style="float: right;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 life-style">
                                <span class="author">
                                    <?php
                                            if($fetch['autor_invitado']==="")
                                                {
                                                    echo "<a href='#'><i class='fa fa-user-o' aria-hidden='true'></i>";
                                                    echo $autor['nombre']." ".$autor['apellido'];
                                                    echo "</a>";
                                                }
                                            else
                                                {
                                                    echo "<a href='".RUTA."quienessomos.html'><i class='fa fa-user-o' aria-hidden='true'></i>";
                                                    echo $fetch['autor_invitado'];
                                                    echo "</a>";
                                                }
                                    ?>
                                </span>
                                <?php
                                	$mysqldate=$fetch['fecha'];
									$phpdate=strtotime($mysqldate);
									$mysqldate=date( 'd-m-Y', $phpdate );
                                ?>
                                <span class="date">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo $mysqldate; ?>
                                </span>
                                <span class="cat">
                                    <a href="<?php echo RUTA.'seccion/'.$num_seccion.'/1/'.seo_url($nombre_seccion); ?>" >
                                    	<i class="fa fa-folder-o" aria-hidden="true"></i><?php echo $nombre_seccion; ?></a>
                                </span>
                            </div>
                	</div>
                	<div id="foto-principal" style="display: flex; margin-bottom: 20px; background-image: url('<?php $lafoto=$fetch["foto"]; echo $lafoto; ?>')">

                	</div>
                	<p hidden><?php echo $fetch2["foto"]; ?></p>

                    <?php
                    $cuerpo = str_ireplace("../upload", RUTA.'/upload', $fetch['cuerpo']);
                    echo $cuerpo;
                    ?>
                    <div class="share-section">
                        <div class="row">tags

                            <div>
                                <ul class="share-link">
                                    <li class="hvr-bounce-to-right"><a href=""> Etiquetas:</a></li>
                                    <?php
                                        foreach ($tags as $value) {
                                            echo '<li class="hvr-bounce-to-right"><a href="'.RUTA.'tags/'.trim($value).'">'.$value.'</a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="share-section share-section2">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <span> Compartí esta nota </span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            	<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                                <ul class="share-link">
                                    <li class="hvr-bounce-to-right">
                                    	<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link; ?>"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                    </li>
                                    <li class="hvr-bounce-to-right">
                                    	<a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link; ?>"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    	$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
                    	$url = $base_url . $_SERVER["REQUEST_URI"];
                     	$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                     ?>
                    <p id="prueba-coso" style="display: none"><?php echo $url; ?></p>
                    <div class="fb-comments" data-href="<?php echo $url; ?>" width="755" data-numposts="5"></div>
                    <div class="slider-banner">
                        <a href="<?php echo RUTA.'suscripciones.html' ?>">
                            <div class="banner-mini">
                                <img src="<?php echo RUTA.'upload/suscripcion.png' ?>" alt="Suscribite" >
                            </div>
                        </a>
                        <a href="https://www.codnet.com.ar">
                            <div class="banner-mini">
                                <img src="<?php echo RUTA.'upload/codnet.jpeg' ?>" alt="Cod Net" >
                            </div>
                        </a>
                        <a href="https://www.jursoc.unlp.edu.ar/">
                            <div class="banner-smini">
                                <img src="<?php echo RUTA.'upload/juridicas.jpeg' ?>" alt="Facultad de Ciencias Juridicas y Sociales" >
                            </div>
                        </a>
                    </div>

                    <div class="like-section">
                        <h3 class="title-bg" style="padding-top: 25px;">NOTAS RELACIONADAS</h3>
                        <div class="row">
                            <?php
                                $sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='$num_seccion' ORDER BY fecha DESC";
                                $result = $conn->query($sql);
                                $cuenta=1;
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if($row['id']!=$id && $cuenta<4){
                                            $mysqldate=$row['fecha'];
                                            $phpdate=strtotime($mysqldate);
                                            $mysqldate=date( 'd-m-Y', $phpdate );
                                            echo '
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="popular-post-img">
                                                    <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
                                                        <img src="'.$row['foto'].'">
                                                    </a>
                                                </div>
                                                <h3>
                                                    <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a>
                                                </h3>
                                                <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> '.$mysqldate.'</span>
                                            </div>';
                                            $cuenta=$cuenta+1;
                                        }
                                    }
                                }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- Blog Single Sidebar Start Here -->
                    <div class="sidebar-area" style="margin-top: 10px;">

                        <div class="recent-post-area hot-news">
                            <h3 class="title-bg" style="margin-top: 0; margin-left: 15px">Últimas Notas</h3>
                            <ul class="news-post">
                            	<?php
                            		$sql = "SELECT * FROM articulos WHERE publicada='on' and id <> ".$fetch['id']." ORDER BY id DESC LIMIT 5";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									    while($row = $result->fetch_assoc()) {
											$mysqldate=$row['fecha'];
											$phpdate=strtotime($mysqldate);
											$mysqldate=date( 'd-m-Y', $phpdate );
                                            if ($row['id']!=$_GET['id']){
            									echo '
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="popular-post-img">
                                                        <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
                                                            <img src="'.$row['foto'].'">
                                                        </a>
                                                    </div>
                                                    <h3 style="text-transform: unset;">
                                                        <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a>
                                                    </h3>

                                                </div>';
                                            }
    									}
									}
                            	?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include'includes/footer.php'; ?>
