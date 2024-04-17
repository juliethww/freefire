<?php
        session_start();
        require_once("../conexion/conexion.php");
        // include("../../../controller/validarSesion.php");
        $db = new Database();
        $con = $db -> conectar();

    //empieza la consulta
    $sql = $con -> prepare("SELECT * FROM usuarios WHERE id='".$_GET['id']."'");
    $sql -> execute();
    $fila = $sql -> fetch ();

    //declaracion de variables de campos en la tabla

    if (isset($_POST['actualizar'])){

          
        $nombre= $_POST['nombre'];    
        $correo= $_POST['correo'];
        $username= $_POST['username'];
        $avatar= $_POST['avatar'];
        $nivel= $_POST['nivel'];
        $puntos= $_POST['puntos'];
        $id_estado= $_POST['$id_estado'];
        
            $insert= $con -> prepare ("UPDATE usuarios SET nombre='$nombre', correo='$correo', username='$username', avatar='$avatar', nivel='$nivel', puntos='$puntos', id_estado='$id_estado'  WHERE id = '".$_GET['id']."'");
            $insert -> execute();
            echo '<script> alert ("Registro actualizado exitosamente");</script>';
            echo '<script> window.close(); </script>';
                
        }

        else if (isset($_POST['eliminar'])){
               
        $nombre= $_POST['nombre'];    
        $correo= $_POST['correo'];
        $username= $_POST['username'];
        $avatar= $_POST['avatar'];
        $nivel= $_POST['nivel'];
        $puntos= $_POST['puntos'];
        $id_estado= $_POST['$id_estado'];

                $insert= $con -> prepare ("DELETE FROM usuarios WHERE id = '".$_GET['id']."'");
                $insert -> execute();
                echo '<script> alert ("Registro actualizado exitosamente");</script>';
                echo '<script> window.close(); </script>';
                    
            }
?>

<!DOCTYPE html>
<html lang="en">
    <script>
        function centrar() {
            iz=(screen.width-document.body.clientWidth) / 2;
            de=(screen.height-document.body.clientHeight) / 3;
            moveTo(iz,de);
        }
    </script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Articulos</title>
    <link rel="stylesheet" href="../../../css/tablaedi.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/6375/6375816.png">
</head>
<body onload="centrar();">
    
        <table class="center">
            <form autocomplete="off" name="form_actualizar" method="POST">

                <tr>
                    <td>avatar</td>
                    <td><input type="" name="avatar" value="<?php echo $fila['avatar'] ?>"></td>                 
                </tr>

                <tr>
                    <td>nombre</td>
                    <td><input type="" name="nombre" value="<?php echo $fila['nombre'] ?>"></td>                 
                </tr>

                <tr>
                    <td>correo </td>
                    <td><input type="" name="correo" value="<?php echo $fila['correo'] ?>"></td>                 
                </tr>

                <tr>
                    <td>username</td>
                    <td><input type="" name="username" value="<?php echo $fila['username'] ?>"></td>                 
                </tr>

                <tr>
                    <td>nivel</td>
                    <td><input type="" name="nivel" value="<?php echo $fila['nivel'] ?>"></td>                 
                </tr>

                <tr>
                    <td>puntos</td>
                    <td><input type="" name="puntos" value="<?php echo $fila['puntos'] ?>"></td>                 
                </tr>

                <td>Estado</td>
                <td>
                    <select class="form-control" name="id_estado" id="id_estado">
                        <option value="">Seleccione un Estado</option>
                        <?php
							$control = $con->prepare("SELECT * FROM estado WHERE id_estado BETWEEN 1 AND 5");
							$control->execute();
							while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
								echo "<option value='" . $fila['id_estado'] . "'>" . $fila['estado'] . "</option>";
							}
							?>
						</select>
                </td>
            </tr>

                <tr>
                    <td><input type="submit" name="actualizar" value="Actualizar"></td>
                    <td><input type="submit" name="eliminar" value="Eliminar"></td>
                </tr>
            </form>
        </table>
    


</body>
</html>