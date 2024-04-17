<?php
    session_start();
    require_once("../../conexion/conexion.php");
    $db = new Database();
    $con = $db -> conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta</title>
    <link rel="stylesheet" href="../../css/tabla.css">
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
    <div class="formulario">

    <h1 class="title">registro de partidas</h1>
        <form method="POST" action="">
        <table>
            <tr class="gris">
                
                <td>Mundo jugado</td>
                <td>Tiempo de partida inicial</td>
                <td>Partida finalizada</td>
                <td>Modificar</td>
            
           
              

            </tr>
            
            <?php
             
                  $query = $con -> prepare("SELECT * FROM duracion");
                  $query -> execute ();
                  $resultados = $query -> fetchAll(PDO::FETCH_ASSOC);

                  foreach ($resultados as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_mundo']?></td>
                <td><?php echo $fila['fecha_ini']?></td>
                <td><?php echo $fila['fecha_fin']?></td>
                <td><a class="hiper" href="" onclick="window.open
                ('../../admin/part.php?id=<?php echo $fila['id_partida'] ?>','','width=500, height=400, toolbar=NO'); void(null);">  editar</a>
               </td>
                
                
                
                
            </tr>
            <?php
                  }
                 
            ?>

            

            
         
        </table>
 
        </form>               

    </div>

</body>
</html>