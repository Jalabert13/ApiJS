<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bert - Down With Us!</title>
    <style>
        table button {
            width: 50%;
        }

        body {
            background: url("https://img.freepik.com/fotos-premium/resumen-borroso-interior-hospital-clinica-lujo-hermoso-fondo_103324-624.jpg");
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
            height: 100vh;
        }

        body button:hover {
            background-color: #888;
        }

        h1,
        h2 {
            color: black;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background: url("https://www.shutterstock.com/image-photo/world-down-syndrome-day-background-600nw-2128536206.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            color: white;
        }

        .modal-content .btn {
            background-color: crimson;
            border: 3px solid black;
        }

        .modal-content .btn:hover {
            background-color: #a11832;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Bert - Clinica Discapacidad</h1>

    <button class="todos" id="todos">Listar Personas</button>
    <input type="text" name="buscar" id="buscar" placeholder="Busca por ID">
    <button id="botonBuscar">Buscar</button>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Edad</th>
                <th>Grado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tabla"></tbody>
    </table>

    <h2 style="text-align: center;display:contents;">Añadir Paciente-</h2>

    <button id="myBtn">Añadir</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder="Nombre del paciente">
            <br>
            <label for="tipo">Tipo:</label>
            <input type="string" id="tipo" placeholder="Tipo de discapacidad">
            <br>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" placeholder="Edad del paciente">
            <br>
            <label for="grado">Grado:</label>
            <input type="number" id="grado" placeholder="Grado de discapacidad">
            <br>
            <label for="fecha">Fecha:</label>
            <input type="number" id="fecha" placeholder="Fecha de ingreso">
            <br>
            <button type="button" class="btn" id="agregar">Enviar</button>
        </div>
    </div>
    <br>

    <button id="editar" style="display: none;">Open Modal</button>

    <div id="modalEditar" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Datos Paciente</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombreActualizar" placeholder="Nombre del paciente">
            <br>
            <label for="tipo">Tipo:</label>
            <input type="number" id="tipoActualizar" placeholder="Tipo de discapacidad">
            <br>
            <label for="edad">Edad:</label>
            <input type="number" id="edadActualizar" placeholder="Edad del paciente">
            <br>
            <label for="grado">Grado:</label>
            <input type="number" id="gradoActualizar" placeholder="Grado de discapacidad">
            <br>
            <label for="fecha">Fecha:</label>
            <input type="number" id="fechaActualizar" placeholder="Fecha de ingreso">
            <br>
            <button type="button" class="btn" id="editarPersona">Editar Paciente</button>
        </div>

        <script>
            function mostrarTabla() {
                let contador = 0;
                const apiUrl = 'http://127.0.0.1:8000/api/personas';

                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        let tablita = document.getElementById("tabla");

                        tablita.innerHTML = "";
                        for (const datos of data) {
                            let tr = document.createElement("tr");
                            tr.class = "table-danger";
                            contador++;
                            for (const key in datos) {
                                let col = document.createElement("td");
                                let textocol = document.createTextNode(datos[key])

                                col.appendChild(textocol);
                                tr.appendChild(col);
                            }
                            let eliminar = document.createElement("button");
                            let editar = document.createElement("button");
                            eliminar.id = "eliminar";
                            eliminar.innerHTML = "eliminar";
                            eliminar.value = contador;

                            editar.id = "editar";
                            editar.className = "myBtn";
                            editar.innerHTML = "Editar";
                            editar.value = contador;
                            tr.appendChild(editar);
                            tr.appendChild(eliminar);
                            tablita.appendChild(tr);
                        }
                    })
                    .catch(error => console.error('Error al obtener pacientes:', error));
            }
            document.getElementById('todos').addEventListener('click', event => {
                mostrarTabla();
            });

            document.getElementById('botonBuscar').addEventListener('click', () => {
                let id = document.getElementById('buscar').value;
                let apiUrl = 'http://127.0.0.1:8000/api/persona/' + id;

                return fetch(apiUrl, {
                        method: 'get',
                        cache: 'no-cache',
                        headers: {
                            'content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        let tablita = document.getElementById("tabla");
                        tablita.innerHTML = "";

                        let tr = document.createElement("tr");
                        for (const key in data) {

                            let col = document.createElement("td");
                            let textocol = document.createTextNode(data[key])
                            col.appendChild(textocol);
                            tr.appendChild(col);
                        }

                        let editar = document.createElement("button");
                        editar.id = "editar";
                        editar.innerHTML = "Editar";
                        editar.className = "btn btn-primary btn-lg";
                        tr.appendChild(editar);
                        let eliminar = document.createElement("button");
                        eliminar.id = "eliminar";
                        eliminar.innerHTML = "Eliminar";
                        eliminar.className = "btn btn-primary btn-lg";
                        tr.appendChild(eliminar);
                        tablita.appendChild(tr);

                    })
                    .catch(error => console.error('Error al obtener persona con id:' + id, error));
            });

            document.getElementById('agregar').addEventListener('click', () => {
                let apiUrl = 'http://127.0.0.1:8000/api/persona';

                let nombre = document.getElementById('nombre').value;
                let tipo = document.getElementById('tipo').value;
                let edad = document.getElementById('edad').value;
                let grado = document.getElementById('grado').value;
                let fecha = document.getElementById('fecha').value;
                const datos = new FormData();
                datos.append('nombre', nombre);
                datos.append('tipo', tipo);
                datos.append('edad', edad);
                datos.append('grado', grado);
                datos.append('fecha', fecha);
                console.log(datos);
                fetch(apiUrl, {
                        method: 'post',
                        body: datos,
                        cache: 'no-cache',
                    })
                    .then(response => response.json())
                    .then(data => {
                        mostrarTabla();
                        alert("Paciente agregado con exito");
                        modal.style.display = "none";
                    })
                    .catch(error => console.error('Error al agregar paciente:', error));
            });

            let tablita = document.getElementById("tabla");

            tablita.addEventListener("click", (e) => {
                let boton = e.target;
                valor = e.target.value;
                let primeraFila = tablita.rows[valor - 1];
                let valorDelTD = primeraFila.cells[0].textContent;

                document.getElementById('editarPersona').addEventListener('click', () => {
                    const apiUrl = 'http://127.0.0.1:8000/api/persona/' + valorDelTD;
                    let nombre = document.getElementById("nombreActualizar").value;
                    let armadura = document.getElementById("tipoActualizar").value;
                    let vida = document.getElementById("edadActualizar").value;
                    let velocidad = document.getElementById("gradoActualizar").value;
                    let reto = document.getElementById("fechaActualizar").value;

                    const datos = new FormData();
                    datos.append('nombre', nombre);
                    datos.append('tipo', tipo);
                    datos.append('edad', edad);
                    datos.append('grado', grado);
                    datos.append('fecha', fecha);
                    fetch(apiUrl, {
                            method: 'put',
                            body: datos,
                            cache: 'no-cache',
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert("Paciente actualizado correctamente");
                        })
                        .catch(error => console.error('Error al editar pacientes:', error));
                });

                function mostrarModal() {
                    const apiUrl = 'http://127.0.0.1:8000/api/persona/' + valorDelTD;
                    fetch(apiUrl)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("nombreActualizar").value = data["nombre"];
                            document.getElementById("tipoActualizar").value = data["tipo"];
                            document.getElementById("edadActualizar").value = data["edad"];
                            document.getElementById("gradoActualizar").value = data["grado"];
                            document.getElementById("fechaActualizar").value = data["fecha"];
                            modalEditar.style.display = "block";
                        })
                        .catch(error => console.error('Error al obtener pacientes:', error));
                }

                if (e.target.innerHTML === 'Editar') {
                    mostrarModal();
                } else {
                    const apiUrl = 'http://127.0.0.1:8000/api/persona/' + valorDelTD;

                    return fetch(apiUrl, {
                            method: 'delete',
                            cache: 'no-cache',
                        })
                        .then(response => response.json())
                        .then(data => {
                            let nombre = data["nombre"];
                            alert("Persona " + nombre + " eliminado correctamente");
                            mostrarTabla();
                        })
                        .catch(error => console.error('Error al obtener Persona:', error));
                }
            });

            function append(parent, el) {
                return parent.appendChild(el);
            }

            function createNode(element) {
                return document.createElement(element);
            }

            var modal = document.getElementById("myModal");
            var modalEditar = document.getElementById("modalEditar");
            var btn = document.getElementById("myBtn");
            var btnEditar = document.getElementById("editar");
            var span = document.getElementsByClassName("close")[0];
            var spanEditar = document.getElementsByClassName("close")[1];

            btn.onclick = function() {
                modal.style.display = "block";
            }

            btnEditar.onclick = function() {
                modalEditar.style.display = "block";
            }

            span.onclick = function() {
                modal.style.display = "none";
            }

            spanEditar.onclick = function() {
                modalEditar.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
                if (event.target == modalEditar) {
                    modalEditar.style.display = "none";
                }
            }
        </script>
</body>

</html>