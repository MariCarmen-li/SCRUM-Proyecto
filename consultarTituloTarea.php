<?php
function obtenerDatos(){
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="tareasprofe";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }
    $consulta="SELECT titulo, descripcion FROM tareas";
    $resultado=$conn->query($consulta);

    $valoresObtenidos= array();

    if($resultado->num_rows>0){
        while($fila=$resultado->fetch_assoc()){
            $valoresObtenidos[]=array(
                "titulo" => $fila["titulo"],
                "descripcion" => $fila["descripcion"]
            );
        }
    }
    $conn->close();
//     print_r($valoresObtenidos)
    return $valoresObtenidos;
}
?>