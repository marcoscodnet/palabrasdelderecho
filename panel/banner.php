<?php ob_start();
include 'header.php';

if(isset($_GET['actualizar'])){
    $id = $_GET['id'];
    $url = $_POST['url'];
    $posicion = $_POST['posicion'];
    $estado = $_POST['estado'];

    // Comprobar si se ha subido una nueva imagen
    if($_FILES['imagen']['name'] != '') {
        $imagen = 'images/' . basename($_FILES['imagen']['name']);
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
            // La imagen se subió correctamente
        } else {
            // Error al subir la imagen
            echo "<p style='color: red;'>Error al subir la imagen.</p>";
        }
    } else {
        $imagen = $_POST['imagen_antigua']; // Si no se ha subido nueva imagen, mantener la existente
    }

    $sql = "UPDATE banners SET imagen='$imagen', url='$url', posicion='$posicion', estado='$estado' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Los datos se actualizaron correctamente.</p>";
    } else {
        echo "<p style='color: red;'>Error al actualizar el banner: " . $conn->error . "</p>";
    }
}

if(isset($_GET['nuevo'])){
    $url = $_POST['url'];
    $posicion = $_POST['posicion'];
    $estado = $_POST['estado'];
    $hoy = date('Y-m-d');

    // Subir la imagen
    $imagen = 'images/' . basename($_FILES['imagen']['name']);
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
        // La imagen se subió correctamente
    } else {
        echo "<p style='color: red;'>Error al subir la imagen.</p>";
    }

    // Verificar si ya existe un banner en esa posición
    $sql_check = "SELECT id FROM banners WHERE posicion = '$posicion'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Si ya hay un banner, actualiza
        $sql = "UPDATE banners SET imagen='$imagen', url='$url', posicion='$posicion', estado='$estado' WHERE id='$id'";
    } else {
        // Si no hay, inserta un nuevo banner
        $sql = "INSERT INTO banners (imagen, url, posicion, estado, creado_en) VALUES ('$imagen', '$url', '$posicion', '$estado', '$hoy')";
    }


    if ($conn->query($sql) === TRUE) {
        header('Location: banners.php');
    } else {
        echo "<p style='color: red;'>Error al insertar el banner: " . $conn->error . "</p>";
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM banners WHERE id='$id'"));
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form class="form-group" <?php if(isset($_GET['id'])){echo 'action="banner.php?actualizar&id='.$id.'"';}else{echo 'action="banner.php?nuevo"';} ?> method="post" enctype="multipart/form-data">
                <label>Imagen del Banner (Subir imagen)</label>
                <input type="file" name="imagen" class="form-control">

                <?php if(isset($_GET['id'])){ ?>
                    <input type="hidden" name="imagen_antigua" value="<?php echo $fetch['imagen']; ?>">
                    <img src="<?php echo $fetch['imagen']; ?>" width="100" height="auto" alt="Imagen del Banner">
                <?php } ?>

                <label>URL del Banner</label>
                <input type="text" name="url" class="form-control" <?php if(isset($_GET['id'])){echo 'value="'.$fetch['url'].'"';} ?> >

                <label>Posición</label>
                <select name="posicion" class="form-control">
                    <option value="cabecera" <?php if(isset($_GET['id']) && $fetch['posicion'] == 'cabecera') echo 'selected'; ?>>Cabecera</option>
                    <option value="medio" <?php if(isset($_GET['id']) && $fetch['posicion'] == 'medio') echo 'selected'; ?>>Medio</option>
                    <option value="pie" <?php if(isset($_GET['id']) && $fetch['posicion'] == 'pie') echo 'selected'; ?>>Pie</option>
                    <!--<option value="estandar" <?php if(isset($_GET['id']) && $fetch['posicion'] == 'estandar') echo 'selected'; ?>>Estandar</option>-->
                </select>

                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="activo" <?php if(isset($_GET['id']) && $fetch['estado'] == 'activo') echo 'selected'; ?>>Activo</option>
                    <option value="inactivo" <?php if(isset($_GET['id']) && $fetch['estado'] == 'inactivo') echo 'selected'; ?>>Inactivo</option>
                </select>

                <input type="submit" value="Guardar" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
