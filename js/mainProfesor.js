//Boton calificar vista docente
function obtenerCalificacionYComentario() {
    var calificacion = prompt("Ingrese una calificación:");
    var comentario = prompt("Ingrese un comentario:");
  
    var resultadoDiv = document.getElementById("resultado-calificacion");
  resultadoDiv.innerHTML = "Calificación: " + calificacion + "<br>Comentario: " + comentario;

    // Mostrar los datos ingresados
    alert("Calificación: " + calificacion + "\nComentario: " + comentario);
  }

//---------------------


function agregarLink() {
    // Crear un nuevo elemento de botón
    var btnAgregar = document.createElement('button');
    btnAgregar.innerHTML = 'Agregar';
          
    // Crear un nuevo campo de texto
    var urlInput = document.createElement('input');
    urlInput.type = 'text';
    urlInput.placeholder = 'Ingrese una URL';
          
    // Agregar el botón y el campo de texto al contenedor de links
    var linkContainer = document.getElementById('linkContainer');
    linkContainer.appendChild(urlInput);
    linkContainer.appendChild(btnAgregar);
          
    // Asignar el evento clic al botón "Agregar"
    btnAgregar.addEventListener('click', function() {
    // Obtener el valor del campo de texto
    var url = urlInput.value;
            
    // Crear un elemento de enlace <a>
    var enlace = document.createElement('a');
    enlace.href = url;
    enlace.innerHTML = url;
            
    // Crear un elemento de lista <li>
    var listItem = document.createElement('li');
    listItem.appendChild(enlace);
            
    // Agregar el elemento de lista al contenedor de resultados
    var resultado = document.getElementById('resultado');
    resultado.appendChild(document.createElement('br'));
    resultado.appendChild(listItem);
            
    // Limpiar el campo de texto
    urlInput.value = '';
    });
}
function openPopup() {
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}

function addText() {
    var textitulo=document.getElementById("titulo").value;
    var lineas2=textitulo.split("\n");
    var textoFormateado2 = lineas2.map(function(linea2) {
        return "<span class='texto-sangria2'>&nbsp;&nbsp;&nbsp;&nbsp;" + lineas2 + "</span>";
    }).join("<br><br>");
    document.getElementById("texto-agregado").innerHTML += textoFormateado2 + "<br><br>";

    var texto = document.getElementById("texto").value;
    var lineas = texto.split("\n");
    var textoFormateado = lineas.map(function(linea) {
        return "<span class='texto-sangria'>&nbsp;&nbsp;&nbsp;&nbsp;" + linea + "</span>";
    }).join("<br><br>");
    document.getElementById("texto-agregado").innerHTML += textoFormateado + "<br><br>";

    var imagenInput = document.getElementById("imagen");
    if (imagenInput.files && imagenInput.files[0]) {
        var imagen = imagenInput.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
          var imagenHTML = "<div class='imagen-container'><img src='" + e.target.result + "'></div>";
          document.getElementById("texto-agregado").innerHTML += imagenHTML + "<br><br>";
          clearInputFile(imagenInput);
        };
        reader.readAsDataURL(imagen);
    }
      
    var pdfInput = document.getElementById("pdf");
    if (pdfInput.files && pdfInput.files[0]) {
        var pdf = pdfInput.files[0];
        var pdfName = escape(pdf.name);
        var pdfHTML = "<a href='" + URL.createObjectURL(pdf) + "' target='_blank'>" + pdfName + "</a>";
        document.getElementById("texto-agregado").innerHTML += pdfHTML + "<br><br>";
        clearInputFile(pdfInput);
    }
    document.getElementById("texto").value = "";
    closePopup();
  }

// funcion para almacenar el valor del titulo y pasarselo a las distintas paginas del alumno y profesor
// pagina de nueva tarea
function enviarValor() {
    var valor = document.getElementById("titulo").value;
    localStorage.setItem('miVariable', valor);
    window.location.href = "tabprofe.html";
    window.location.href = "vistabalumno.php";
    window.location.href = "Tarasignada.html";
}
function clearInputFile(input) {
    input.value = "";
}

// pagina del tablero del profesor
function redirectToPage(url) {
    window.location.href = url;
  }
  // Obtener el valor de la variable desde el LocalStorage
  const valorRecibido = localStorage.getItem('miVariable');
  // Mostrar el valor en la página
  document.getElementById("tarea1").innerText += valorRecibido;


