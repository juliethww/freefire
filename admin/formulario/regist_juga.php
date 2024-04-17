<?php
require_once("../../conexion/conexion.php");
$db = new Database();
$con =$db->conectar();

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {
    $nombre= $_POST['nombre'];
    $correo= $_POST['correo'];
    $username= $_POST['username'];
    $contrasena= $_POST['contrasena'];
    $avatar= $_POST['avatar'];
    $nivel= $_POST['nivel'];
    $puntos= $_POST['puntos'];
    $id_estado= $_POST['id_estado'];
    
    
    // Establecer automáticamente el rol de jugador
    $tip_user = 2; // ID de jugador

    $sql = $con -> prepare ("SELECT * FROM usuarios where username='$username'");
    $sql->execute();
    $fila = $sql->fetchAll(PDO::FETCH_ASSOC);

    if($nombre=="") {
        echo '<script>alert ("COMPLETE EL CAMPO NOMBRE"); </script>';
        echo '<script>window.location="registro.php"</script>';
    } else if($correo=="") {
        echo '<script>alert ("COMPLETE EL CAMPO CORREO"); </script>';
        echo '<script>window.location="registro.php"</script>';
    } else if($username=="") {
        echo '<script>alert ("COMPLETE EL CAMPO USERNAME"); </script>';
        echo '<script>window.location="registro.php"</script>';
    } else if($contrasena=="") {
        echo '<script>alert ("COMPLETE EL CAMPO CONTRASEÑA"); </script>';
        echo '<script>window.location="registro.php"</script>';
    } else if($avatar=="") {
        echo '<script>alert ("COMPLETE EL CAMPO AVATAR"); </script>';
        echo '<script>window.location="registro.php"</script>';
    } else if($fila){
        echo '<script>alert ("USUARIO YA REGISTRADO"); </script>';
        echo '<script>window.location="regist_juga.php"</script>';
    } else {
        $pass_cifrado=password_hash($contrasena,PASSWORD_DEFAULT,array("pass"=>12));
        $insertSQL = $con->prepare ("INSERT INTO usuarios(nombre,correo,username,contrasena,avatar,id_tip_user,nivel,puntos,id_estado) 
        VALUES ('$nombre','$correo', '$username', '$pass_cifrado','$avatar','$tip_user','$nivel','$puntos','$id_estado')");
        $insertSQL->execute();
        echo '<script>alert ("registro exitoso"); </script>';
        echo '<script>window.location="../formulario/formulario.php"</script>';
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/regis.css">
        <title>Registrarse</title>
        <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    </head>
    
    <body style="background-image: url('images/fondo1.jpg');">  
     
        <div class="login-form">
            
            <div class="logo"><img src="../../imagenes/free4.png" alt="logo"></div>
            <form  method="POST" autocomplete="off" class="formulario" id="formulario">
<input type="submit" value="Regresar" name="regresar" id="regresar">
<?php 
if (isset($_POST['regresar'])){
    header('Location: ../formulario/formulario.php');

}
?>

            <h6>Registrese</h6>

            <form action="" method="post">

            

            <div class="textbox">
    <input type="text" name="nombre" placeholder="Nombre">
    <span class="check-message hidden">Obligatorio</span>
</div>

<div class="textbox">
    <input type="text" name="correo" placeholder="Correo">
    <span class="check-message hidden">Obligatorio</span>
</div>

<div class="textbox">
    <input type="text" name="username" placeholder="Username">
    <span class="check-message hidden">Obligatorio</span>
</div>

<div class="textbox">
    <input type="password" name="contrasena" placeholder="Contraseña" id="password">
    <span class="check-message hidden">Obligatorio</span>
</div>

<div class="textbox">
    <select class="textbox" name="avatar" id="avatar">
        <option value="">Seleccione un Personaje</option>
        <option value="kelly">Kelly</option>
        <option value="moco">Moco</option>   
        <option value="kapella">Kapella</option> 
        <option value="skyler">Skyler</option> 
        <option value="alok">Alok</option> 
        <option value="orion">Orion</option> 
    </select>
    <span class="check-message hidden">Obligatorio</span>
</div>
<br>
<div class="textbox">
    <input type="text" name="nivel" placeholder="Nivel">
    <span class="check-message hidden">Obligatorio</span>
</div>
<div class="textbox">
    <input type="text" name="puntos" placeholder="puntos">
    <span class="check-message hidden">Obligatorio</span>
</div>

<div class="textbox">
<select class="textbox" name="id_estado">
							<?php
							$control = $con->prepare("SELECT * FROM estado WHERE id_estado BETWEEN 1 AND 5");
							$control->execute();
							while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
								echo "<option value='" . $fila['id_estado'] . "'>" . $fila['estado'] . "</option>";
							}
							?>
						</select>
</div>

<input type="submit" value="Registrarse" name="inicio" class="login-btn">
<input type="hidden" name="MM_insert" value="formreg">


            <div class="name">
                ~ Julian Daniel Andrea ~
            </div>
        </div>

        
        </form>
    </body>
    </html>