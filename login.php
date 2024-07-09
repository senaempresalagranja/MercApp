<?php
include 'conn.php';
session_start();
$password = check_input($_REQUEST["contrasena"]);
        $fpassword = md5($password);
    
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = check_input($_POST['cuenta']);

    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $_SESSION['msg'] = "palma caremonda hay no llevan asteriscos!";
        header('location: index.php');
    } else {

        $fusername = $username;

        $password = check_input($_POST["contrasena"]);
        $fpassword = md5($password);

        $query = mysqli_query($conn, "SELECT * FROM `tbusuario` WHERE cuenta='" . $fusername . "' AND contrasena='" . $fpassword . "'");

        if (mysqli_num_rows($query) == 0) {
            echo "$fusername"."$fpassword";
            $_SESSION['msg'] = "Ingreso Invalido, Intentelo Otra Vez!";
            header('location: index.php');
        } else {

            $row = mysqli_fetch_array($query);
            if ($row['tipoUsuario'] == 1) {
                $_SESSION['id'] = $row['idUsuario'];
                $_SESSION['rol'] = "admin";
                ?>
                <script>
                    window.alert('Ingreso Exitoso, Bienvenido Administador!');
                    window.location.href='admin/';
                </script>
                <?php
} elseif ($row['tipoUsuario'] == 2) {
                $_SESSION['id'] = $row['idUsuario'];
                $_SESSION['rol'] = "usuarioCliente";
                ?>
                <script>
                    window.alert('Ingreso Exitoso, Bienvenido Usuario!');
                    window.location.href='user/';
                </script>
                <?php
} elseif ($row['tipoUsuario'] == 3) {
                $_SESSION['id'] = $row['idUsuario'];
                
                ?>
                <script>
                    window.alert('Ingreso Exitoso, Bienvenido Proveedor!');
                    window.location.href='supplier/';
                </script>
                <?php
}

        }

    }
}
?>