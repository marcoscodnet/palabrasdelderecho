 <?php include'includes/header.php'; ?>
 <div class="blog-page-area gallery-page gellary-area">
    <div class="container">
        <?php
            $koso=1;
            $sql = "SELECT * FROM seccion_sitios ORDER BY id ASC";
            $result2 = $conn->query($sql);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $sexi=$row2['id'];
                    if($koso===0){echo"<h3 style='margin-top: 25px'>".$row2['nombre']."</h3>";}
                    else{echo"<h3>".$row2['nombre']."</h3>"; $koso=0;}
                    $cuenta=1;
                    $sql = "SELECT * FROM sitios WHERE seccion='$sexi' ORDER BY id DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if($cuenta===5){$cuenta=1;}
                            if($cuenta===1){echo'<div class="row" style="padding-bottom: 20px;">';}
                            echo'
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="single-gellary">
                                    <div class="image" style="display: none">
                                        <img src="" alt="">
                                        <div class="overley">
                                            <ul>
                                                <li>
                                                    <a href="'.$row['link'].'" target="_blank">
                                                    <i class="fa fa-link" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="gellary-informations" style="text-align: center">
                                        <ul>
                                            <li style="padding-top: 4px; margin-right: 0">
                                                <h3 style="padding: 0 6px;">
                                                    <a href="'.$row['link'].'" target="_blank">'.$row['titulo'].'</a>
                                                </h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>';
                            if($cuenta===4){echo'</div>'; $cierra=1; $cuenta=5;}
                            if($cuenta===3){$cuenta=4; $cierra=0;}
                            if($cuenta===2){$cuenta=3; $cierra=0;}
                            if($cuenta===1){$cuenta=2; $cierra=0;}
                        }
                    }
                    if($cierra===0){echo"</div>";}
                }
            }
        ?>

    </div>    
</div>
 <?php include'includes/footer.php'; ?>