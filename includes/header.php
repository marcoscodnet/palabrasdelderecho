<!doctype html>
<html class="no-js" lang="es">
<?php include'includes/conn.php';
define('RUTA', 'http://localhost/palabrasdelderecho/');
?>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123570262-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123570262-1');
</script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Palabras del Derecho</title>
    <meta name="description" content="Un espacio dedicado al aporte, discusión y crítica de la actualidad jurídica">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA ?>images/fav.png">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
    
    <!--FEIBUK META-->
    <?php
        $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        $filename=$uri_parts[0];
      	if (isset($_GET['id'])) {
      		$id=$_GET['id'];

            $fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM articulos WHERE id='$id'"));

      	}
        /*echo $filename;
        if($filename==="/articulo.php"){*/
        if(strpos($filename, 'articulo')
){
            echo'
                <meta property="og:url"                content="'.$current_url.'" />
                <meta property="og:type"               content="article" />
                <meta property="og:title"              content="'.$fetch['titulo'].'" />
                <meta property="og:description"        content="'.$fetch['bajada'].'" />
                <meta property="og:image"              content="'.$fetch['foto'].'" />
            ';
        }
        //if($filename==="/index.php"){
    if(strpos($filename, 'index')
    ){
            echo'
                <meta property="og:url"                content="http://palabrasdelderecho.com.ar/" />
                <meta property="og:type"               content="website" />
                <meta property="og:title"              content="Palabras del Derecho" />
                <meta property="og:description"        content="Un espacio dedicado al aporte, discusión y crítica de la actualidad jurídica" />
                <meta property="og:image"              content="http://palabrasdelderecho.com.ar/images/logofb.jpg" />
            ';
        }
    ?>
    <!--FEIBUK META-->
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/bootstrap.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/font-awesome.min.css">
    <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">-->
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/animate.css">
    <!-- hover-min css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/hover-min.css">
      <!-- magnific-popup css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/magnific-popup.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/owl.carousel.css">
    <!-- lightbox css -->
    <link href="<?php echo RUTA ?>/css/lightbox.min.css" rel="stylesheet" type="text/css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/inc/custom-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/inc/custom-slider/css/preview.css" type="text/css" media="screen" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/style.css?ver=1">
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/responsive.css">
    <!-- modernizr js -->
    <script src="<?php echo RUTA ?>/js/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA ?>/css/mi.css">
    <style type="text/css">
        .publi{display: none}
    </style>
</head>

<body class="home">
	<!--Preloader area Start here-->
	<div class="preloader">
		 <div class="sk-cube-grid">
			<div class="sk-cube sk-cube1"></div>
			<div class="sk-cube sk-cube2"></div>
			<div class="sk-cube sk-cube3"></div>
			<div class="sk-cube sk-cube4"></div>
			<div class="sk-cube sk-cube5"></div>
			<div class="sk-cube sk-cube6"></div>
			<div class="sk-cube sk-cube7"></div>
			<div class="sk-cube sk-cube8"></div>
			<div class="sk-cube sk-cube9"></div>
		  </div>
	</div>
	<!--Preloader area end here-->

    <!--Header area start here-->
    <header>
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="header-top-left">
                            <ul>
                                <li><span><?php setlocale(LC_ALL,"es_ES.UTF-8"); echo strftime("%A %d de %B del %Y"); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="social-media-area">
                            <nav>
                                <ul>
                                    <li><a href="https://www.facebook.com/palabrasdelderecho/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/blogdelderecho" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/palabrasdelderecho/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area" style="padding-top: 0">
                            <a href="<?php echo RUTA ?>index.html"><img src="<?php echo RUTA ?>/images/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="right-banner publi">
                            <img src="<?php echo RUTA ?>/images/add/1.png" alt="add image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-area" id="sticky" style="font-size: 1px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="navbar-header">
                            <div class="col-sm-8 col-xs-8 padding-null">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
	                                <span class="sr-only">Toggle navigation</span>
	                                <span class="icon-bar"></span>
	                                <span class="icon-bar"></span>
	                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="col-sm-4 col-xs-4 hidden-desktop text-right search">
                                <a href="#search-mobile" data-toggle="collapse" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <div id="search-mobile" class="collapse search-box">
                                    <form id="formBuscadorM" method="post" action="<?php echo RUTA ?>buscador.php">
                                        <input type="text" class="form-control" id="terminoM" name="termino" placeholder="Buscar...">
                                        <input type="submit" name="" hidden>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu navbar-collapse collapse">
                            <nav>
                                <ul>
                                	<li><a href="<?php echo RUTA ?>index.html">Inicio</a></li>
                                    <li><a href="<?php echo RUTA ?>seccion/1/1/noticias">Noticias</a></li>
                                    <li><a href="<?php echo RUTA ?>seccion/2/1/jurisprudencia">Jurisprudencia</a></li>
									<li><a href="<?php echo RUTA ?>seccion/3/1/publicaciones">Publicaciones</a></li>
                                    <li><a href="<?php echo RUTA ?>seccion/4/1/legislacion">Legislación</a></li>
                                    <li><a href="<?php echo RUTA ?>sitiosdeinteres.html">Sitios de Interés</a></li>
                                    <li><a href="<?php echo RUTA ?>quienessomos.html">Quienes Somos</a></li>
                                    <li><a href="<?php echo RUTA ?>suscripciones.html">Suscripciones</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-hidden col-xs-hidden text-right search hidden-mobile">
                        <a href="#search" data-toggle="collapse" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <div id="search" class="collapse search-box">
                            <form id="formBuscador" method="post" action="<?php echo RUTA ?>buscador.php">
                                <input type="text" class="form-control" id="termino" name="termino" placeholder="Qué estás buscando?">
                                <input type="submit" name="" hidden>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
