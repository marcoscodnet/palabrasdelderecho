<?php include'includes/header.php'; ?>
 	<div class="home-about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="title2">Quienes Somos </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>Palabras del Derecho es un espacio dedicado al aporte, debate y análisis de la actualidad jurídica. Está conformado por un equipo de abogados, abogadas y periodistas que tienen el objetivo de facilitar el acceso de la información normativa y judicial.</p>

					<p>Comenzó como un blog, creado por José Ignacio López en 2011, donde se publicaban textos académicos y de análisis jurisprudencial sobre distintas áreas jurídicas. Con el transcurso del tiempo y de la mano del crecimiento de las redes sociales, logró instalarse como un sitio de referencia en la actualidad del mundo del derecho. </p>

					<p>Hoy cuenta con un espacio web renovado, pero conserva el mismo espíritu: difundir información de diversos ámbitos del derecho, promover el intercambio de ideas y la publicidad de los actos estatales. </p>

					<p>El equipo de Palabras del Derecho está compuesto por:</p>
                </div>
            </div>
		    <div class="team-page-area">
		        <div class="container">
					<?php
						$sql = "SELECT * FROM autores WHERE id <= 5";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {

								echo'<div class="col-md-3 col-lg-3 col-sm-6">
										<div class="single-member-area">
											<div class="cl-single-member">
												<figure><img class="img-responsive" src="'.RUTA.'upload/'.$row['foto'].'" alt="jon"></figure>
						                        <div class="overlay">
						                            <h2 class="member-name">
						                            	<!--<a href="'.RUTA.'autor/'.$row['id'].'/'.seo_url($row['nombre'].' '.$row['apellido']).'">'.$row['nombre'].' '.$row['apellido'].'
						                            	</a>-->
						                            </h2>
						                            <h3 class="member-title">'.$row['puesto'].'</h3>
						                            <!--<a href="'.RUTA.'autor/'.$row['id'].'/'.seo_url($row['nombre'].' '.$row['apellido']).'">-->
						                            	<div class="short-desc">'.$row['descripcion'].'</div>
						                            <!--</a>-->
													<div class="social-icons">';
						                             if($row['facebook']!=""){
						                             	echo'<a href="#" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>';}
						                             if($row['twitter']!=""){
						                             	echo'<a href="#" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>';}
						                             if($row['linkedin']!=""){echo'<a href="#" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>';}
						                        echo'</div>
											    </div>
											</div>
						                    <div class="article">
						                            <h3>'.$row['nombre'].' '.$row['apellido'].'</h3>
						                            <div class="member-title">'.$row['puesto'].'</div>
						                        </div>
										</div>
									</div>';
						    }
						}

					?>

				</div>
                <div class="container">
                    <?php
                    $sql = "SELECT * FROM autores WHERE id > 5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            echo'<div class="col-md-3 col-lg-3 col-sm-6" style="float: left;">
										<div class="single-member-area">
											<div class="cl-single-member">
												<figure><img class="img-responsive" src="'.RUTA.'upload/'.$row['foto'].'" alt="jon"></figure>
						                        <div class="overlay">
						                            <h2 class="member-name">

						                            </h2>
						                            <h3 class="member-title">'.$row['puesto'].'</h3>

						                            	<div class="short-desc">'.$row['descripcion'].'</div>
						                            </a>
													<div class="social-icons">';
                            if($row['facebook']!=""){
                                echo'<a href="#" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>';}
                            if($row['twitter']!=""){
                                echo'<a href="#" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>';}
                            if($row['linkedin']!=""){echo'<a href="#" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>';}
                            echo'</div>
											    </div>
											</div>
						                    <div class="article">
						                            <h3>'.$row['nombre'].' '.$row['apellido'].'</h3>
						                            <div class="member-title">'.$row['puesto'].'</div>
						                        </div>
										</div>
									</div>';
                        }
                    }

                    ?>

                </div>
			</div>
        </div>
    </div>

 <?php include'includes/footer.php'; ?>
