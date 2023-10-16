<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title>Vista Tablero Profesor</title>
    <link rel="stylesheet" href="css/estilostabprofesor.css">

</head>

<body>
    <header>
        <div class="avatar">
            <img src="img/avatar.png" alt="Avatar">
        </div>
        <nav>
            <ul>
                <li><a href="#">Editar Perfil</a></li>
                <li><a href="#">Editar Grupo</a></li>
                <li><a href="#">Ayuda</a></li>
                <li><a href="#">Cerrar Sesión </a></li>
            </ul>
        </nav>
    </header>
    <div class="contenedor">
        <div id="leftDiv">
            <div class="titulo">
                <h2>Tareas Asignadas</h2>
            </div>
            <div class="sticky-container">
                
                <?php
                  require 'consultarTituloTarea.php';

                  $valoresObtenidos = obtenerDatos();
                  
                  // Generar los divs correspondientes a los valores obtenidos
                  foreach ($valoresObtenidos as $valor) {
                      echo '<div  class="sticky-note-left" onclick=("Tarasignada.html")">';
                      echo '<h3>' . htmlspecialchars($valor['titulo']) . '</h3>';
                      echo '</div>';
                  }
                ?>
            </div>
            <div class="butnewtarea">
                <button type="submit" onclick="redirectToPage('nuevaTarea.html')" >Agregar Tarea</button>
            </div>
        </div>
        <div id="rightDiv">
            <div class="titulo">
                <h2>Tareas Completadas</h2>
            </div>
            <div class="sticky-container">
                <div class="sticky-note-right" onclick="redirectToPage('Tareaentregada.html')">
                  <h3>ggg</h3>
                  <p >Contenido de la Tarea 1...</p>
                </div>
                <div class="sticky-note-right" onclick="redirectToPage('Tareaentregada.html')">
                  <h3>Tarea 2</h3>
                  <p>Contenido de la Tarea 2...</p>
                </div>
                <div class="sticky-note-right" onclick="redirectToPage('Tareaentregada.html')">
                    <h3>Tarea 3</h3>
                    <p>Contenido de la Tarea 3...</p>
                  </div>
                <div class="sticky-note-right" onclick="redirectToPage('Tareaentregada.html')">
                    <h3>Tarea 4</h3>
                    <p>Contenido de la Tarea 4...</p>
                </div>
              </div>
        </div>
    </div>
    </div>
    </div>
  <script src="./js/mainProfesor.js"></script>

</body>

</html>