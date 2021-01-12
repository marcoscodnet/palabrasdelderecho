	<?php include'includes/header.php';
	ini_set('display_errors', '1');?>

    <!--Header area end here-->
    <!-- Slider Section Start Here -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding-0">
                <div class="slider-area">
                    <div class="bend niceties preview-2">
                        <div id="ensign-nivoslider" class="slides">
                        <?php
                        	$notasprohibidas=[];
		                    $sql = "SELECT * FROM articulos WHERE publicada='on' AND destacada1='on' ORDER BY id DESC LIMIT 1";
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
		                    $sql = "SELECT * FROM articulos WHERE publicada='on' AND destacada1='on' ORDER BY id DESC LIMIT 1";
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
		                    $sql = "SELECT * FROM articulos WHERE publicada='on' AND destacada2='on' ORDER BY id";
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
    <!-- Slider Section end Here -->
    <!-- All News Section Start Here -->
    <div class="all-news-area">
        <div class="container">
            <!-- latest news Start Here -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 tab-home">
                    <ul class="nav nav-tabs" style="margin-bottom: 30px !important">
                        <li class="title-bg">Noticias</li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="tab-top-content">
                            	<?php
		                            $sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='1' ORDER BY fecha DESC";
									$result = $conn->query($sql);
									$tope=0;
									if ($result->num_rows > 0) {
		    							while($row = $result->fetch_assoc()) {
		        							if($tope===0 && !in_array($row['id'], $notasprohibidas)){
		        								$phpdate = strtotime($row['fecha']);
												$mysqldate=date('Y-m-d',$phpdate );
			        							echo '
			        							<div class="row">
				                                    <div id="foto-noti-home" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 paddimg-right-none" style=" background-image: url(\''.$row['foto'].'\');">
				                                        <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">

				                                        </a>
				                                    </div>
				                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 last-col">
				                                        <span class="date none"><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
				                                        	<i class="fa fa-user-o" aria-hidden="true"></i> james Bond </a>
				                                        </span>
				                                        <span class="comment none">
				                                        	<a href="#"><i class=" fa fa-comment-o" aria-hidden="true"></i> 50</a>
				                                       	</span>
				                                        <h3><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h3>
				                                        <p>'.$row['bajada'].'</p>
				                                        <a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'" class="read-more hvr-bounce-to-right">Leer más</a>
				                                    </div>
				                                </div>';
				                                $tope=$tope+1; $nousar=$row['id'];
				                            }
		    							}
									}
		                        ?>
                            </div>
                            <div class="tab-bottom-content">
                                <div class="row">
                                	<?php
		                            	$sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='1' ORDER BY fecha DESC";
										$result = $conn->query($sql);
										$tope=0;
										if ($result->num_rows > 0) {
		    								while($row = $result->fetch_assoc()) {
	        									$phpdate = strtotime($row['fecha']);
												$mysqldate=date('Y-m-d',$phpdate );
												if(!in_array($row['id'], $notasprohibidas) && $tope<4 && $row['id']!=$nousar){
			        								echo '
			        								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tab-area">
	                                					<a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
		                                					<div class="col-sm-12 col-xs-3 img-tab" style="background-image: url( \''.$row['foto'].' \'); height: 120px; background-size: cover;     background-position: center;">


				                                            </div>

				                                        </a>
				                                        <div class="col-sm-12 col-xs-9 img-content">
				                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i>'.$mysqldate.'</span>
				                                            <h4><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h4>
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
                    </div>
                    <!-- Trending news  here-->
                    <div class="trending-news separator-large">
                        <div class="row">
                            <div class="view-area" style="padding-bottom: 4px;">
                                <div class="col-sm-8">
                                    <h3 class="title-bg">Publicaciones</h3>
                                </div>
                                <div class="col-sm-4 text-right" style="padding: 25px 40px 0px 0;">
                                    <a href="<?php echo RUTA ?>seccion/3/1/publicaciones">Ver todas <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="list-col">
                            		<?php
		                            	$sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='3' ORDER BY fecha DESC";
										$result = $conn->query($sql);
										$tope=0;
										if ($result->num_rows > 0) {
		    								while($row = $result->fetch_assoc()) {
		        								if($tope===0  && !in_array($row['id'], $notasprohibidas)){
		        									$phpdate = strtotime($row['fecha']);
													$mysqldate=date('d-m-Y',$phpdate );
			        								echo '
			        								<a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
	                                    				<img src="'.$row['foto'].'" alt="" title="" />
	                                    			</a>
				                                    <div class="dsc">
				                                        <span class="date">
				                                        	<i class="fa fa-calendar-check-o" aria-hidden="true"></i>'.$mysqldate.'
				                                        </span>
				                                        <span class="comment none">
				                                        	<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a>
				                                        </span>
				                                        <h3><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h3>
				                                        <p>'.$row['bajada'].'</p>
				                                    </div>';
				                                    $tope=1; $nousar=$row['id'];
				                                }
		    								}
										}
		                            ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="news-post">
                                	<?php
		                            	$sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='3' ORDER BY id DESC";
										$result = $conn->query($sql);
										$tope=0;
										if ($result->num_rows > 0) {
		    								while($row = $result->fetch_assoc()) {
		        								if(!in_array($row['id'], $notasprohibidas) && $tope<4 && $row['id']!=$nousar){
		        									$phpdate = strtotime($row['fecha']);
													$mysqldate=date('Y-m-d',$phpdate );
			        								echo '
			        								 <li>
		                                        		<div class="row">
		                                            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
		                                                		<div class="item-post">
		                                                    		<div class="row">
		                                                    			<a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
		                                                        			<div style="height: 100px; background-image: url(\''.$row['foto'].'\'); background-size: cover; background-position: center;" class="col-lg-4 col-md-4 col-sm-3 col-xs-3 paddimg-right-none">
			                                                        		</div>
		                                                            	</a>
		                                                        		<div class="col-lg-8 col-md-8 col-sm-9 col-xs-9">
		                                                            		<h4><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h4>
		                                                            		<span style="display: none" class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>'.$mysqldate.'</span>
		                                                        		</div>
		                                                    		</div>
		                                                		</div>
		                                            		</div>
		                                        		</div>
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
                    <!--Start what’s hot now -->
                    <div class="hot-news">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="view-area" style="margin-bottom: -25px; padding-bottom: 5px;">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h3 class="title-bg">Legislación</h3>
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <a href="<?php echo RUTA.'seccion/4/1/Legislacion' ?>">Ver todas <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <ul class="news-post news-feature-mb">
                                	<?php
		                            	$sql = "SELECT * FROM articulos WHERE publicada='on' AND seccion='4' ORDER BY id DESC";
										$result = $conn->query($sql);
										$tope=0;
										if ($result->num_rows > 0) {
		    								while($row = $result->fetch_assoc()) {
		        								if($tope<3){
		        									$phpdate = strtotime($row['fecha']);
													$mysqldate=date('Y-m-d',$phpdate );
			        								echo '
			        								<li>
                                       					<div class="row">
                                            				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                                                				<a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">
                                                					<img src="'.$row['foto'].'" alt="News image" />
                                                				</a>
                                            				</div>
                                            				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-8 content">
                                                				<h4><a href="'.RUTA.'articulo/'.$row['id'].'/'.seo_url($row['titulo']).'">'.$row['titulo'].'</a></h4>
                                                				<span class="author none"><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> yeamin</a></span>
                                                				<span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>'.$mysqldate.'</span>
                                                				<span class="comment none"><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 50</a></span>
                                                				<p>'.$row['bajada'].'</p>
                                            				</div>
                                        				</div>
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
                <!--Sidebar Start Here -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none sidebar-latest">

                	<div style="height: 40px; width: 100%; float: left"></div>

                	<a class="twitter-timeline" data-lang="es" data-height="500" href="https://twitter.com/blogdelderecho?ref_src=twsrc%5Etfw">Tweets by blogdelderecho</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                	<div style="height: 40px; width: 100%; float: left"></div>
                    <div id="redes">
                        <a href="https://www.facebook.com/palabrasdelderecho/" target="_blank" class="fa fa-facebook boto-soc fa-5x"></a>
                        <a  href="https://twitter.com/blogdelderecho" target="_blank" class="fa fa-twitter boto-soc fa-5x"></a>
                        <a href="https://www.instagram.com/palabrasdelderecho/" target="_blank" class="fa fa-instagram boto-soc fa-5x"></a>
                    </div>
                    <div style="height: 40px; width: 100%; float: left"></div>
                    <div class="hot-news popular-related">
                    	<h3 class="title-bg">Últimos Fallos</h3>
                        <ul class="news-post">
                        	<?php
			                    $sql = "SELECT * FROM fallos ORDER BY id DESC LIMIT 5";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
			    					while($row = $result->fetch_assoc()) {
			        					$phpdate = strtotime($row['fecha']);
										$mysqldate=date('Y-m-d',$phpdate );
				        				echo '<li>
				                                <div class="row">
				                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
				                                        <div class="item-post">
				                                            <div class="row">
				                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 paddimg-right-none" style="text-align: center;">
				                                                    <img style="padding-top: 7px;" src="images/libra.png" alt="" title="">
				                                                </div>
				                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
				                                                    <h4 style="padding-top: 5px !important;">
				                                                    	<a href="'.$row['link'].'" target="_blank">'.$row['titulo'].'</a>
				                                                    </h4>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                            </li>';
			    					}
								}
			                ?>

                        </ul>
                    </div>
                    <!--popular Post End Here -->

                </div>
            </div>
        </div>
    </div>

    <?php include'includes/footer.php'; ?>
