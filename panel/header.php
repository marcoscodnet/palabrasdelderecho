<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<?php session_start(); include'../includes/conn.php';
    if($_SESSION['estamos']!="si")
        {header("Location: index.php");}
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Panel - Palabras del Derecho</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <!---->

  <!---->

  <!---->
</head>
<style type="text/css">
  .nav-link{font-size: 20px; text-align: center;}
  .separador{width: 100%; height: 20px}
  @media (min-width: 992px) {
    #mainNav .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
      padding-bottom: 0;
    }
  }
</style>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.html" target="_blank">Palabras del Derecho</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="ver-notas.php">
            <span class="nav-link-text">Ver Notas</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="una-nota.php">
            <span class="nav-link-text">Agregar Nota</span>
          </a>
        </li>
        <li class="separador"></li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="fallos.php">
            <span class="nav-link-text">Ver Fallos</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="fallo.php">
            <span class="nav-link-text">Agregar Fallo</span>
          </a>
        </li>
        <li class="separador"></li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="sitios.php">
            <span class="nav-link-text">Ver Sitios de Interés</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="sitio.php">
            <span class="nav-link-text">Agregar Sitios</span>
          </a>
        </li>
        <li class="separador"></li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="autores.php">
            <span class="nav-link-text">Autores</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
 <div class="content-wrapper">
