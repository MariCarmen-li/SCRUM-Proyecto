<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'])){
        
      
        $servername="localhost";
        $username="root";   
        $password="";
        $dbname="tareasprofe";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }
        $titulo=$_POST['titulo'];
        $descripcion=$_POST['texto'];
        $imagen=$_FILES['imagen'];
        $archivo= $_FILES['archivo'];

        $archivo_temporal=$archivo['tmp_name'];
        $archivoNombre = basename($archivo['name']);

        $imagen_temporal=$imagen['tmp_name'];
        $imagenNombre = basename($imagen['name']);
        // Mueve y guarda los archivos en una ubicación permanente
        $ruta_archivo = "TareasProfe/" . $archivoNombre;
        $ruta_imagen = "TareasProfe/" . $imagenNombre;

        move_uploaded_file($archivo_temporal, $ruta_archivo);
        move_uploaded_file($imagen_temporal, $ruta_imagen);
        
        $stmt = $conn->prepare("INSERT INTO tareas(titulo, descripcion, imagen, archivo) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $titulo,$descripcion, $ruta_imagen, $ruta_archivo);
        $stmt->execute();
        
        if ($stmt== TRUE) {
            echo "<script>alert('La tarea se ha publicado con exito, los alumnos la podran ver en seguida.');</script>";
            header("refresh:0.1; url=tabprofe2.php");
        }
        $stmt->close();
        $conn->close();

}else{
    echo("no se pudo");
}
?>