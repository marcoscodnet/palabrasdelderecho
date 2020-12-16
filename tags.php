<?php
include'includes/header.php';
$tags_post=($_GET['tag']);
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
//COMPARAR TITULO
/*$sql = "SELECT * FROM articulos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tags = strtolower($row['tags']);
        $array_tags=explode(', ', $tags);
        if(in_array($tags_post,$array_tags)){$rezult[] = $row['id'];}
    }
}*/
?>

<div class="inner-page-header">
    <div class="banner">
        <img src="<?php echo RUTA; ?>images/sexiones/buscar.jpg" alt="Banner">
    </div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page-locator">
                        <ul>
                            <li><a href="<?php echo RUTA; ?>index.html">Home <i class="fa fa-compress" aria-hidden="true"></i> </a>ETIQUETAS</li>
                        </ul>
                    </div>
                    <div class="header-page-title">
                        <h1>NOTAS CON LA ETIQUETA "<?php echo htmlentities($tags_post); ?>"</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-page-area">
    <div class="container">
        <?php
        $tope=1; $cuenta=1; $ribbon=1;
        $sql = "SELECT * FROM articulos WHERE publicada='on' AND tags LIKE '%".($tags_post)."%'";
        //echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //if(in_array($row['id'], $rezult)){
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
            //}
        }
        ?>
    </div>
</div>

<?php include'includes/footer.php'; ?>
