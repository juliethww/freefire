    <?php
        require_once("conexion/conexion.php");
        $db = new Database();
        $con =$db->conectar();
    ?>
    <?php
        if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
        {
        $nombre= $_POST['nombre'];
        $correo= $_POST['correo'];
        $username= $_POST['username'];
        $contrasena= $_POST['contrasena'];
        $avatar= $_POST['avatar'];

        $sql = $con->prepare("SELECT * FROM usuarios WHERE username = :username OR correo = :correo");
        $sql->bindParam(':username', $username);
        $sql->bindParam(':correo', $correo);
        $sql->execute();
        $fila = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        
        
        if($nombre=="")
        {
            echo '<script>alert ("COMPLETE EL CAMPO NOMBRE"); </script>';
            echo '<script>window.location="registro.php"</script>';
        }

        else if($correo=="")
        {
            echo '<script>alert ("COMPLETE EL CAMPO CORREO"); </script>';
            echo '<script>window.location="registro.php"</script>';
        }

        else if($username=="")
        {
            echo '<script>alert ("COMPLETE EL CAMPO USERNAME"); </script>';
            echo '<script>window.location="registro.php"</script>';
        }

        else if($contrasena=="")
        {
            echo '<script>alert ("COMPLETE EL CAMPO CONTRASEÑA"); </script>';
            echo '<script>window.location="registro.php"</script>';
        }

        else if($avatar=="")
        {
            echo '<script>alert ("COMPLETE EL CAMPO AVATAR"); </script>';
            echo '<script>window.location="registro.php"</script>';
        }

        else if($fila){
            echo '<script>alert ("USUARIO YA REGISTRADO"); </script>';
            echo '<script>window.location="registro.php"</script>';
        }

                
        else
        {
            $pass_cifrado=password_hash($contrasena,PASSWORD_DEFAULT,array("pass"=>12));
            $insertSQL = $con->prepare ("INSERT INTO usuarios(nombre,correo,username,contrasena,avatar) 
            VALUES ('$nombre','$correo', '$username', '$pass_cifrado','$avatar')");
            $insertSQL->execute();
            echo '<script>alert ("registro exitoso"); </script>';
            echo '<script>window.location="index.php"</script>';
        }
        }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/registro.css">
        <title>Registrarse</title>
        <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    </head>
    <body style="background-image: url('images/fondo1.jpg');">   
        <div class="login-form">
            
            <div class="logo"><img src="images/free4.png" alt="logo"></div>

            <div class="social-media">
                <button class="fb"><img src="images/fb.png" alt="facebook"></button>
                <button class="google"><img src="images/google.png" alt="google"></button>
                <button class="ps"><img src="images/vk5.png" alt="ps"></button>
                <button class="xbox"><img src="images/apple.png" alt="xbox"></button>
                <button class="switch"><img src="images/twt.png" alt="switch"></button>
            </div>

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

                <input type="submit" value="Registrarse" name="inicio" class="login-btn">
                <input type="hidden" name="MM_insert" value="formreg">

            

            <div class="dont-have-account">
            ¿Tienes una Cuenta?
                <a href="index.php">Inicia Sesión</a>
            </div>

            <div class="name">
                ~ Julian Daniel Andrea ~
            </div>
        </div>

        
        </form>
    </body>
    </html>