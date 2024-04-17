<?php
        session_start();
        require_once("../conexion/conexion.php");
        // include("../../../controller/validarSesion.php");
        $db = new Database();
        $con = $db -> conectar();

    //empieza la consulta
    $sql = $con -> prepare("SELECT * FROM duracion WHERE id_partida='".$_GET['id']."'");
    $sql -> execute();
    $fila = $sql -> fetch ();

    //declaracion de variables de campos en la tabla

    if (isset($_POST['actualizar'])){

          
    $id_partida= $_POST['id_partida'];
    $id_mundo= $_POST['id_mundo'];
    $fecha_ini= $_POST['fecha_ini'];
    $fecha_fin= $_POST['fecha_fin'];
    $id_ganador= $_POST['id_ganador'];
        
            $insert= $con -> prepare ("UPDATE duracion SET id_mundo='$id_mundo', fecha_ini='$fecha_ini', fecha_fin='$fecha_fin', id_ganador='$id_ganador'  WHERE id_partida = '".$_GET['id']."'");
            $insert -> execute();
            echo '<script> alert ("Registro actualizado exitosamente");</script>';
            echo '<script> window.close(); </script>';
                
        }

        else if (isset($_POST['eliminar'])){
               
    $nombre= $_POST['nombre'];
    $tipo= $_POST['tipo'];
    $cant_balas= $_POST['cant_balas'];
    $dano= $_POST['dano'];
            
                $insert= $con -> prepare ("DELETE FROM duracion WHERE id_partida = '".$_GET['id']."'");
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
                    <td>ID PARTIDA</td>
                    <td><input name="id_partida" value="<?php echo $fila['id_partida'] ?>" ></td>                 
                </tr>

                <tr>
                    <td>Mundo</td>
                    <td><input type="" name="id_mundo" value="<?php echo $fila['id_mundo'] ?>"></td>                 
                </tr>

                <tr>
                    <td>Fecha inicio </td>
                    <td><input type="datetime-local" name="fecha_ini" value="<?php echo $fila['fecha_ini'] ?>"></td>                 
                </tr>

                <tr>
                    <td>Fecha Fin</td>
                    <td><input type="datetime-local" name="fecha_fin" value="<?php echo $fila['fecha_fin'] ?>"></td>                 
                </tr>

                <tr>
                    <td>Ganador</td>
                    <td><input type="" name="id_ganador" value="<?php echo $fila['id_ganador'] ?>"></td>                 
                </tr>

                <tr>
                    <td><input type="submit" name="actualizar" value="Actualizar"></td>
                    <td><input type="submit" name="eliminar" value="Eliminar"></td>
                </tr>
            </form>
        </table>
    


</body>
</html>