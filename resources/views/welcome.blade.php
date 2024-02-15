<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bestiario D&D</title>
    <style>
        button{
            color: green;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Bestiario API</h1>

    <button onclick="obtenerMonstruos()">Obtener Monstruos</button>
    <table class="table table-dark table-striped">
    <thead>
            <tr>
            <th>ID</th><th>Nombre</th><th>Armadura</th><th>Vida</th><th>Velocidad</th><th>Reto</th>
            </tr>
        </thead>
        <tbody id="tabla">

        </tbody>
    </table>

    <h2 style="text-align: center;">Agregar Monstruo</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" placeholder="Nombre del monstruo">
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
    <button onclick="agregarMonstruo()">Agregar Monstruo</button>

    <h2>Actualizar Monstruo</h2>
    <label for="idActualizar">ID del Monstruo a actualizar:</label>
    <input type="number" id="idActualizar" placeholder="ID del monstruo">
    <br>
    <label for="armaduraActualizar">Nueva armadura:</label>
    <input type="number" id="armaduraActualizar" placeholder="Nuevo valor de armadura">
    <br>
    <label for="vidaActualizar">Nueva vida:</label>
    <input type="number" id="vidaActualizar" placeholder="Nuevo valor de vida">
    <br>
    <button onclick="actualizarMonstruo()">Actualizar Monstruo</button>

    <script>


        function obtenerMonstruos() {

            const apiUrl = 'http://127.0.0.1:8000/api/monstruos';
            // Función para realizar una petición GET a la API

            fetch(apiUrl)
                .then(response => response.json())
                .then(data=>{
                 let tablita = document.getElementById("tabla");
                 tablita.innerHTML = "";
                for(const datos of data){
                    let tr = document.createElement("tr");
                    tr.class = "table-danger";
                    for (const key in datos) {
                        let col = document.createElement("td");
                        let textocol=document.createTextNode(datos[key])
                        col.appendChild(textocol);
                        tr.appendChild(col);
                    }
                    let elemetons = document.createElement("th");
                    elementos.innerHTML = "Acciones";
                    tablita.appendChild(elementos);
                    let editar = document.createElement("button");
                    editar.id = "editar";
                    editar.innerHTML ="Editar";
                    tr.appendChild(editar);
                    let eliminar = document.createElement("button");
                    eliminar.id = "eliminar";
                    eliminar.innerHTML ="eliminar";
                    tr.appendChild(eliminar);
                    tablita.appendChild(tr);
               }
            })
                .catch(error => console.error('Error al obtener monstruos:', error));
        }


        function agregarMonstruo() {
            // Implementación de la función agregarMonstruo
        }

        function actualizarMonstruo() {
            // Implementación de la función actualizarMonstruo
        }
    </script>
</body>

</html>
