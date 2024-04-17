<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interfaz administrador</title>
    <link rel="stylesheet" href="../../css/forms.css">
</head>
<body>
<form action="" method="POST">

<td>
<div class="btn-container">
            
            <input type="submit" value="Regresar" name="regresar" id="regresar">
</div>
</tr>
</form>
<?php 
if (isset($_POST['regresar'])){
    header('Location: ../admin.php');

}
?>

    <footer>
   
        <h1 class="center">ingreso de datos</h1>
        
        <nav >
          <ul class="menu">
            <li>
                <a href="regist_juga.php">jugadores</a>
                <ul class="menu_ver">
                <li><a href="regist_juga.php">ingreso de jugadores</a></li>
                </ul>
            </li>
            <li>
                <a href="regist_armas.php">armamento</a>
                <ul class="menu_ver">
                <li><a href="regist_armas.php">ingreso armamento</a></li>
                </ul>
        </li>
      
       
      
          </ul>
        </nav>

        
    </footer>
<br>
<br>
<br>



</body>
</html>