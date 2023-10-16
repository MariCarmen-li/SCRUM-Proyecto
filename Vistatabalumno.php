<!DOCTYPE html>
<html lang="es">
<head>
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CSS-->
    <link rel="stylesheet" href="css/estilostabalumno.css">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- TITULO -->
    <title>Vista tablero Alumno</title>
    <!-- FAVICON -->

</head>
<body>
   <!-- BARRA DE NAVEGACION -->
    <nav class="navbar navbar-expand-md bg-body-secondary">
        <div class="container-fluid">
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse " id="navbar-toggler">
                <a class="navbar-brand flex-grow-1 text-light" href="#">
                    <!-- <i class="bi bi-person-circle"></i> Nombre del Alumno -->
                    <div class="avatar">
                        <img src="img/avatar.png" alt="Avatar">
                    </div>
                </a>
                <button type="button" class="btn btn-outline">Editar Perfil</button>
                <button type="button" class="btn btn-outline">Ayuda</button>
                <button type="button" class="btn btn-outline">Cerrar Sesión</button>
            </div>
        </div>
    </nav>
    <!-- -->
    <div class="container-fluid-2">
        <div class="Tareas d-flex ">
            <div class="Asig container-md"><h3>Tareas Asignadas</h3>
                <div id="asig" class="container-md-2 d-flex flex-column">
                    
                    <div class="bloque" data-id="6" onclick="redirectToPage('Tareaenprocesoalumno.html')" >Tarea 6</div>
                    <div class="bloque" data-id="2" onclick="redirectToPage('Tareaenprocesoalumno.html')" >Tarea 4</div>
                    <?php
                        require 'consultarTituloTarea.php';

                        $valoresObtenidos = obtenerDatos();
                  
                        // Generar los divs correspondientes a los valores obtenidos
                        foreach ($valoresObtenidos as $valor) {
                        echo '<div class="bloque" data-id="5"onclick=("Tarasignada.html")">';
                        echo '<h5>' . htmlspecialchars($valor['titulo']) . '</h5>';
                        echo '</div>';
                        }
                    ?>
                </div>
            </div>
            <div class="Asig container-md flex-column"><h3>Tareas en Progreso</h3>
                <div class="Progre container-md-2 d-flex flex-column" id="prog">
                    <div class="bloque" data-id="3" onclick="redirectToPage('Tareaenprocesoalumno.html')" >Tarea 3</div>
                </div>
                <button onclick="moverDivYRedirigir()">Mover a Completadas</button>
            </div>
            <div class="Asig container-md flex-column"><h3>Tareas Completadas</h3>
                <div class="Comple container-md-2 d-flex flex-column" id="comp">
                    <div class="bloque" data-id="1"  >Tarea 1</div>
                    <div class="bloque" data-id="2"  >Tarea 2</div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function moverDivYRedirigir() {
            var container1 = document.getElementById('prog');
            var container2 = document.getElementById('comp');

            var div = container1.querySelector('.bloque');

            /*/ Obtener las propiedades del contenedor de destino
            var container2Styles = getComputedStyle(container2);
            var container2Width = container2Styles.width;
            var container2Height = container2Styles.height;
            var container2BorderColor = container2Styles.borderColor;*/

            // Mover el div al nuevo contenedor
            container2.appendChild(div);

            // Guardar el estado en localStorage
            localStorage.setItem('divMovido', container2.innerHTML);

            /*/ Guardar las propiedades en localStorage para acceder a ellas después de la redirección
            localStorage.setItem('container2Width', container2Width);
            localStorage.setItem('container2Height', container2Height);
            localStorage.setItem('container2BorderColor', container2BorderColor);*/

            // Redirigir a otra página
            //window.location.href = 'Tareacalificada.html';
        }

// Obtener el contenedor
        var container = document.getElementById('comp');

        // Agregar controlador de eventos al contenedor para capturar los clics en los divs
        container.addEventListener('click', function(event) {
            // Verificar si el evento se originó desde un div dentro del contenedor
            if (event.target.matches('.bloque')) {
                // Redirigir a la página deseada
                window.location.href = 'Tareacalificada.html';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
</body>
</html>