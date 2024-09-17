<?php
include 'conexcion.php';

//Obtener el ID enviado de index
$idRegistro = $_GET['id']; //Pasar variables por URL siempre es con GET, obtengo el 'id' desde el index

//Seleccionar datos desde la DB con el id correspondiente
$query = "SELECT * FROM usuarios where id='" . $idRegistro . "'";
$usuario = mysqli_query($con, $query) or die(mysqli_error($con));

//volcamos los datos de ese registro en una fila
$fila = mysqli_fetch_assoc($usuario); //ahora tengo q colocar los valores en los campos "values" en el codigo HTML


//primero valido si esta seteado (isset — Determina si una variable está definida y no es null)
if (isset($_POST['borrarRegistro'])) {

    $query = "DELETE  FROM usuarios where id='$idRegistro'";

    //Si no se ejecuta el query(consulta)
    if (!mysqli_query($con, $query)) {
        die('Error: ' . mysqli_error($con));
        $error = "Error no se pudo borrar el registro";
    } else { //Si se creo el registro, redireccionar al index.php y mandar mensaje de "creado correctamente"
        $mensajeDel = "Registro borrado correctamente";
        header('Location: index.php?mensajeDel='.urldecode($mensajeDel));
        exit();
    }
}

?>


<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">

    <title>borrar</title>
</head>

<body>
    <h1 class="text-center">CRUD - contactos</h1>

    <div class="container">

        <div class="row">
            <h4>Borrar un Registro Existente</h4>
        </div>


        <div class="row caja">
            <div class="col-sm-6 offset-3">
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre" readonly value="<?php echo $fila['nombre']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos" readonly value="<?php echo $fila['apellidos']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono" readonly value="<?php echo $fila['telefono']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa el email" readonly value="<?php echo $fila['email']; ?>" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="borrarRegistro">Borrar Registro</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>