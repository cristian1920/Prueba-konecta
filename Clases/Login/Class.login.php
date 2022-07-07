<?php

class Login
{

    function __construct()
    {
        require_once('../../Clases/Conexion/conexion.php');
        $conexion = new ConexionMysql();
        $this->conectar = $conexion->conexion();
        return $this->conectar;
    }

    function Ingresar($usuario, $contrasena)
    {

        session_start();
        $query = $this->conectar->prepare('SELECT idusuario,usuario,nombre FROM usuarios WHERE usuario=:user and contraseña=:pass;');
        $query->execute(['user' => $usuario, 'pass' => $contrasena]);
        if ($query->rowCount()) {

            foreach ($query as $currentUser) {
                //Agrega a la variable de conexion lo que viene en el arreglo consultado por base de datos
                $_SESSION['idusuario'] = $currentUser['idusuario'];
                $_SESSION['nombre'] = $currentUser['nombre'];
                $_SESSION['usuario'] = $currentUser['usuario'];
            }
            header("location: ../../Vistas/Principal/principal.php?validar=1");
        } else {
            echo '
                <script>
                    alert("Usuario :' . $usuario . ' No registrado, verifique los datos");
                    window.location.href="../../Vistas/Login/login.php"
                </script>
            ';
        }
    }
}
