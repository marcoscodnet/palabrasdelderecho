<?php include 'header.php';

if(isset($_GET['borrar'])){
    $id = $_GET['borrar'];
    $sql = "DELETE FROM banners WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {}
}

?>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <div class="row">
        <div class="col-12">
            <table id="myTable" class="display">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Posición</th>
                    <th>Estado</th>
                    <th>Creado en</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM banners";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "                
                                    <tr>
                                        <td><img src='".$row['imagen']."' alt='Banner' width='100' height='auto'></td>
                                        <td>".$row['posicion']."</td>
                                        <td>".$row['estado']."</td>
                                        <td>".$row['creado_en']."</td>
                                        <td><a href='banner.php?id=".$row['id']."'>EDITAR</a></td>
                                        <td><a href='banners.php?borrar=".$row['id']."'>BORRAR</a></td>
                                    </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
