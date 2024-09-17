
<?php
    /*mysqli_real_escape_string — Escapa los caracteres especiales de una cadena para usarla en una sentencia SQL, 
    tomando en cuenta el conjunto de caracteres actual de la conexión*/
 include 'conexcion.php';
 
//Crear nuevo registro 2
//primero valido si esta seteado (isset — Determina si una variable está definida y no es null)
if(isset($_POST['crearRegistro'])){
    //Si se obtuvieron los datos correspondientes,  me conecto a la DB y recibo por POST los datos nombre, apellido,etc
    $nombre= mysqli_real_escape_string($con,$_POST['nombre']);
    $apellidos=mysqli_real_escape_string($con, $_POST['apellidos']);
    $telefono=mysqli_real_escape_string($con, $_POST['telefono']);
    $email=mysqli_real_escape_string($con, $_POST['email']);

    //Configurar tiempo y zona horaria
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $time = date('h:i:s a', time());

    //Validar si los campos estan vacios
    //Si los campos no esta setiados(configurados) O si esta campo X == " "...
    if(!isset($nombre) || $nombre == ''|| !isset($apellidos)||$apellidos==''||!isset($telefono)|| $telefono==''||!isset($email)||$email==''){
        $error= "Algunos campos estan vacios";
    }else{
        //Creo una query(consulta) que me permita insertar una nueva tabla EN LA BASE DE DATOS
        $query = "INSERT INTO usuarios(nombre, apellidos, telefono, email) VALUES('$nombre','$apellidos','$telefono','$email')";

        //Si no se ejecuta el query(consulta)
        if(!mysqli_query($con, $query)){
            die('Error: '.mysqli_error($con));
            $error = "Error no se pudo crear el registro";
            
        }else{//Si se creo el registro, redireccionar al index.php y mandar mensaje de "creado correctamente"
            $mensaje="Registro creado correctamente";
            header('Location: index.php?mensaje='.urldecode($mensaje));
            exit();//para q salga
        }
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

    <title>crear</title>
  </head>
  <body>
  <h1 class="text-center">CRUD - contactos</h1>

    <div class="container">

    <div class="row">
        <h4>Crear un Nuevo Registro</h4>
    </div>   

        <div class="row caja">
        <?php //valido error
       if(isset($error)): ?>
        <h4 class="bg-danger text-white" ><?php echo $error; ?></h4>
       <?php endif; ?> 

            <div class="col-sm-6 offset-3">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>"><!--El nombre del archivo de script ejecutándose actualmente, relativa al 
                                                                            directorio raíz de documentos del servidor. Por ejemplo, el valor de 
                                                                            $_SERVER['PHP_SELF'] en un script ejecutado en la dirección 
                                                                            http://example.com/foo/bar.php será /foo/bar.php-->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre">                    
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos">                    
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono">                    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa el email">                    
                </div>
              
                <button type="submit" class="btn btn-primary w-100" name="crearRegistro">Crear Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>