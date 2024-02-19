<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bestiario D&D</title>
    <style>
        table button {
            width: 50%;
        }

        body {
            background: url("https://wallpapercave.com/wp/zD18bKX.jpg");
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
            color: red;
            text-shadow: 5px -1px 0 #000, 3px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        }



        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background: url("https://wallpapers.com/images/hd/d-d-7680-x-4320-background-spk8fuxcnzkk30d6.jpg");
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

        /* The Close Button */
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
    <h1 style="text-align: center;">Bestiario API</h1>

    <button class="todos" id="todos">Obtener Monstruos</button>
    <input type="text" name="buscar" id="buscar" placeholder="Busca por ID">
    <button id="botonBuscar">Buscar</button>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Armadura</th>
                <th>Vida</th>
                <th>Velocidad</th>
                <th>Reto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tabla">

        </tbody>
    </table>

    <h2 style="text-align: center;display:contents;">Agregar Monstruo-</h2>


    <button id="myBtn">Agregar</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombreMonstruo" placeholder="Nombre del monstruo">
            <br>
            <label for="armadura">Armadura:</label>
            <input type="number" id="armadura" placeholder="Valor de armadura">
            <br>
            <label for="vida">Vida:</label>
            <input type="number" id="vida" placeholder="Valor de vida">
            <br>
            <label for="velocidad">Velocidad:</label>
            <input type="number" id="velocidad" placeholder="Valor de velocidad">
            <br>
            <label for="reto">Reto:</label>
            <input type="number" id="reto" placeholder="Valor de reto">
            <br>
            <button type="button" class="btn" id="agregar">Enviar</button>
        </div>
    </div>
    <br>

    <button id="editar" style="display: none;">Open Modal</button>

    <!-- The Modal -->
    <div id="modalEditar" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Monstruo</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombreActualizar" placeholder="Nombre del monstruo">
            <br>
            <label for="armadura">Armadura:</label>
            <input type="number" id="armaduraActualizar" placeholder="Valor de armadura">
            <br>
            <label for="vida">Vida:</label>
            <input type="text" id="vidaActualizar" placeholder="Valor de vida">
            <br>
            <label for="velocidad">Velocidad:</label>
            <input type="text" id="velocidadActualizar" placeholder="Valor de velocidad">
            <br>
            <label for="reto">Reto:</label>
            <input type="text" id="retoActualizar" placeholder="Valor de reto">
            <br>
            <button type="button" class="btn" id="editarMonstruo">Editar Monstruo</button>
        </div>

        <script>
            function mostrarTabla() {
                let contador = 0;
                const apiUrl = 'http://127.0.0.1:8000/api/monstruos';
                // Función para realizar una petición GET a la API

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
                    .catch(error => console.error('Error al obtener monstruos:', error));
            }
            document.getElementById('todos').addEventListener('click', event => {
                mostrarTabla();
            });

            document.getElementById('botonBuscar').addEventListener('click', () => {
                let id = document.getElementById('buscar').value;
                let apiUrl = 'http://127.0.0.1:8000/api/monstruo/' + id;



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
                    .catch(error => console.error('Error al obtener monstruo con id:' + id, error));
            });



            document.getElementById('agregar').addEventListener('click', () => {
                let apiUrl = 'http://127.0.0.1:8000/api/monstruo';

                let nombre = document.getElementById('nombreMonstruo').value;
                let armadura = document.getElementById('armadura').value;
                let vida = document.getElementById('vida').value;
                let velocidad = document.getElementById('velocidad').value;
                let reto = document.getElementById('reto').value;
                const datos = new FormData();
                datos.append('nombre', nombre);
                datos.append('armadura', armadura);
                datos.append('vida', vida);
                datos.append('velocidad', velocidad);
                datos.append('reto', reto);

                console.log(datos);
                fetch(apiUrl, {
                        method: 'post',
                        body: datos,
                        cache: 'no-cache',
                    })
                    .then(response => response.json())
                    .then(data => {
                        mostrarTabla();
                        alert("Monstruo agregado con exito");
                        modal.style.display = "none";
                    })
                    .catch(error => console.error('Error al agregar monstruo:', error));
            });




            let tablita = document.getElementById("tabla");

            tablita.addEventListener("click", (e) => {
                let boton = e.target;
                valor = e.target.value;
                let primeraFila = tablita.rows[valor - 1];
                let valorDelTD = primeraFila.cells[0].textContent;

                document.getElementById('editarMonstruo').addEventListener('click', () => {
                const apiUrl = 'http://127.0.0.1:8000/api/monstruo/' + valorDelTD;
                let nombre = document.getElementById("nombreActualizar").value;

                let armadura = document.getElementById("armaduraActualizar").value;

                let vida = document.getElementById("vidaActualizar").value;

                let velocidad = document.getElementById("velocidadActualizar").value;

                let reto = document.getElementById("retoActualizar").value;


                const datos = new FormData();
                datos.append('nombre', nombre);
                datos.append('armadura', armadura);
                datos.append('vida', vida);
                datos.append('velocidad', velocidad);
                datos.append('reto', reto);
                fetch(apiUrl, {
                        method: 'put',
                        body: datos,
                        cache: 'no-cache',
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert("Monstruo actualizado correctamente");
                    })
                    .catch(error => console.error('Error al editar monstruos:', error));
            });
                function mostrarModal() {

                    const apiUrl = 'http://127.0.0.1:8000/api/monstruo/' + valorDelTD;
                    fetch(apiUrl)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("nombreActualizar").value = data["nombre"];
                            document.getElementById("armaduraActualizar").value = data["armadura"];
                            document.getElementById("vidaActualizar").value = data["vida"];
                            document.getElementById("velocidadActualizar").value = data["velocidad"];
                            document.getElementById("retoActualizar").value = data["reto"];
                            modalEditar.style.display = "block";
                        })
                        .catch(error => console.error('Error al obtener monstruos:', error));
                }

                if (e.target.innerHTML === 'Editar') {
                    mostrarModal();



                } else {

                    const apiUrl = 'http://127.0.0.1:8000/api/monstruo/' + valorDelTD;

                    return fetch(apiUrl, {
                            method: 'delete',
                            cache: 'no-cache',
                        })
                        .then(response => response.json())
                        .then(data => {
                            let nombre = data["nombre"];
                            alert("Monstruo " + nombre + " eliminado correctamente");
                            mostrarTabla();

                        })
                        .catch(error => console.error('Error al obtener monstruos:', error));



                }
            });


            function append(parent, el) {
                return parent.appendChild(el);
            }

            function createNode(element) {
                return document.createElement(element);
            }

            // Get the modal

            var modal = document.getElementById("myModal");
            var modalEditar = document.getElementById("modalEditar");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            var btnEditar = document.getElementById("editar");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            var spanEditar = document.getElementsByClassName("close")[1];
            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }
            btnEditar.onclick = function() {
                modal.style.display = "block";
            }
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
            spanEditar.onclick = function() {
                modalEditar.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
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
