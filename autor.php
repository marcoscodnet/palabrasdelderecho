<?php 
	include'includes/header.php';
	$id=$_GET['id'];
	$autor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM autores WHERE id='$id'"));
?>
    <div class="single-team-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 single-image">
                    <figure><img class="img-responsive" src="upload/<?php echo $autor['foto']; ?>" alt="Toya"></figure>                
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 single-bio">
                    <h2 class="member-name"><?php echo $autor['nombre']." ".$autor['apellido']; ?></h2>
                    <h3 class="member-title"><?php echo $autor['puesto']; ?></h3>
                    <div class="member-desc">
                        <p><?php echo $autor['descripcion']; ?></p>
                    </div>
                    <div class="contact-info"> 
                        <ul>
                            <?php 
                                if($autor['telefono']!="") 
                                    {echo'<li><i class="fa fa-phone"></i>'.$autor['telefono'].'</li>';}

                                if($autor['mail']!="")
                                    {echo '<li><i class="fa fa-envelope-o"></i><a href="mailto: '.$autor['mail'].'">'.$autor['mail'].'</a></li>';}
                            ?>
                            
                            <li>
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                <?php 
                                    if($autor['facebook']!="")
                                        {echo '<a href="'.$autor['facebook'].'" target="_blank">facebook</a>';}
                                    if($autor['twitter']!="")
                                        {echo '<a href="'.$autor['twitter'].'" target="_blank"> twitter</a>';}
                                    if($autor['linkedin']!="")
                                        {echo '<a href="'.$autor['linkedin'].'" target="_blank"> linkedin</a>';}
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        
    <!-- Author Slider End Here -->
    </div>
<?php include'includes/footer.php'; ?>