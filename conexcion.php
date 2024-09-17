<?php
//Conectar a Mysql, ya no se usa esta forma ahora es con PDO la conexcion
$con=mysqli_connect('localhost', 'root', '','crud_php_mysql');

//probar conexcion
if(mysqli_connect_errno()){
    echo "fallo al conectarse a Mysql: ".mysqli_connect_error();
}/*else{
    echo "Conectado correctamente";
}*/
?>