<?php
$nombres = $_POST['Nombres'];
$correo = $_POST['correo'];
$celular = $_POST['Celular'];
$password = $_POST['password'];
$repassword = $_POST['rePassword'];
$reqlen = strlen($nombres) * strlen ($correo) * strlen ($celular) * strlen ($password) * strlen ($repassword);

if ($reqlen > 0){
    if ($password === $repassword) {
        $mysql=new mysqli("localhost","root","","boox_db");
         $password = md5($password);
         $nombres= mysqli_real_escape_string($mysql,$nombres);
         $correo= mysqli_real_escape_string($mysql,$correo);
         $celular= mysqli_real_escape_string($mysql,$celular);
         $password= mysqli_real_escape_string($mysql,$password);
         $resultado= mysqli_query($mysql, 'INSERT INTO clientes
          (nombre_completo, correo, numero_celular, contraseña, ) VALUES ("' .$nombres . '", "' . $correo . '", "' . $celular . '", "' . $password . '")');
         mysqli_close ($mysql);
         echo "Se ha registrado exitosamente";
         
    } else {
        echo " Por favor, introduzca dos contraseñas identicas.";
    }

}else {
    echo "Por favor, rellene todos los campos requeridos.";
}



?>