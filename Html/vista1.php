
<?php
    $conexion=mysqli_connect("joseestrada.cdjd4hqg2ef1.us-east-1.rds.amazonaws.com","Joseestrada","Revolucion12.","Mundial");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Equipos</title>
    <link rel="stylesheet" href="../css/vista1.css">
    <link rel="shortcut icon" href="imagenes/FIFA.png">
    
</head>
<body>
    <header>

        <div class="container">
            <a href="/Html/index.php">
                
                <img class="logo" height="70" src="https://digitalhub.fifa.com/transform/3a170b69-b0b5-4d0c-bca0-85880a60ea1a/World-Cup-logo-landscape-on-dark?io=transform:fill&amp" alt="FIFA">
            
            
            </a>
            
            <nav>

                <a href="/Html/vista1.php">Equipos</a>
                <a href="#">Partidos</a>
                <a href="#">Tabla</a>
                <a href="#">En vivo</a>


            </nav>

        </div>

    </header>
    <div class="container">
        <div class="equipo">
       
        <h1>Equipos </h1>

       
        
        <?php
        
        $sql="SELECT Equipo FROM Equipos";
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result)){
        ?>
        
        <tr>
           <a href="vista2"><?php echo  $mostrar['Equipo']?></a>
        </tr>
        <?php
        }
        ?>
        
            

    </div>
    </div>

           










</body>
</html>
