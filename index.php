<?php include 'conexcion.php' ?>

<?php
//LEER registros 1
//crear y seleccionar query(consulta sql)
$query = "SELECT * FROM usuarios ORDER BY id ASC";
//el que ejecuta el query(consulta sql)
$usuarios = mysqli_query($con, $query);

//END 1

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

    <title>CRUD PHP Y MYSQL</title>
</head>

<body>
    <h1 class="text-center">CRUD - contactos</h1>

    <div class="container">
    <div class="row">
        <?php //Si se setea por GET el mensaje de la variable $mensaje $_GET['mensaje']
        if (isset($_GET['mensaje'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php
                        //Muestro el mensaje de la variable $mensaje por GET
                        echo $_GET['mensaje'];
                        ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        </div>

        <div class="row">
        <?php //Si se setea por GET el mensaje de la variable $mensaje $_GET['mensaje']
        if (isset($_GET['mensajeEdit'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php
                        //Muestro el mensaje de la variable $mensaje por GET
                        echo $_GET['mensajeEdit'];
                        ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        </div>

        <div class="row">
        <?php //Si se setea por GET el mensaje de la variable $mensaje $_GET['mensaje']
        if (isset($_GET['mensajeDel'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php
                        //Muestro el mensaje de la variable $mensaje por GET
                        echo $_GET['mensajeDel'];
                        ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        </div>
        

        <div class="row">
            <div class="col-sm-4 offset-8">
                <a href="crear.php" class="btn btn-success w-100"> Crear Nuevo Registro</a>
            </div>
        </div>

        <div class="row caja">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($usuarios)) : //$usuarios es el que ejecta todos los registros
                        ?>
                            <tr>
                                <?php //Leer registros 1 
                                ?>
                                <td><?php echo $fila['id'] //tal como figura en la DB 
                                    ?></td>
                                <td><?php echo $fila['nombre'] //tal como figura en la DB
                                    ?></td>
                                <td><?php echo $fila['apellidos'] //tal como figura en la DB
                                    ?></td>
                                <td><?php echo $fila['telefono'] //tal como figura en la DB
                                    ?></td>
                                <td><?php echo $fila['email'] //tal como figura en la DB
                                    ?></td>
                                <?php //END 1 
                                ?>
                                <td>
                                    <a href="editar.php  ?id=<?php echo $fila['id'] //para verificar que este editando el ID correspondiente
                                                                ?>" class="btn btn-primary"> Editar</a>
                                    <a href="borrar.php  ?id=<?php echo $fila['id'] //para verificar que este borrando el ID correspondiente
                                                                ?>" class="btn btn-danger"> Borrar</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->


</body>

</html>