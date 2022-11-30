<?php
    include("cnArb.php");
    $query = "SELECT IdArbitro, NombreArb, Pais as Nacionalidad FROM Arbitros, Paises WHERE Nacionalidad=Idpais";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../../images/img5.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleConfig.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"/>
        <title>Arbitros</title>
        <link rel="stylesheet" href="./arbitros.css">
    </head>
    <body>
    <nav>
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Configuration module </span>
        </div>
        <div class="sidebar">
          <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Configuration</span>
          </div>
          <div class="sidebar-content">
            <ul class="lists">
              <li class="list">
                <a href="../equipos/Equipos.php" class="nav-link">
                  <i class="bx bx-home-alt icon"></i>
                  <span class="link">Datos del equipo</span>
                </a>
              </li>
              <li class="list">
                <a href="./Arbitros.php" class="nav-link">
                  <i class="bx bx-bar-chart-alt-2 icon"></i>
                  <span class="link">árbitros</span>              
                </a>
              </li>
              <li class="list">
                <a href="../estadios/Estadios.php" class="nav-link">
                  <i class="bx bx-bell icon"></i>
                  <span class="link">Estadios</span>
                </a>
              </li>
              
            </ul>

            <div class="bottom-cotent">
              <li class="list">
                <a href="../../../index.html" class="nav-link">
                  <i class="bx bx-log-out icon"></i>
                  <span class="link">Logout</span>
                </a>
              </li>
            </div>
          </div>
        </div>
      </nav>
      </div>
        <div class="container-add-ar">
            <h2 class="container-tilte-ar"> Agregar Arbitro</h2>
            <form action="./insertarAr.php" method="post" class="container__form-ar">
                <label for="" class="container_label-ar">Nombre</label>
                <input name="nombre" type="text" class="container_input-ar">
                <label for="" class="container_label-ar">Nacionalidad</label>
                <select name="nacionalidad" id="nacionalidad" class="container_input-ar" >
                <option class="container_input-ar" selected disabled>-- Seleccione --</option>
                    <?php 
                        $query1 = "SELECT * From  Paises";
                        $result1 =mysqli_query($conexion, $query1);
                         while($row=mysqli_fetch_assoc($result1)){
                             $idi= $row['Idpais'];
                             $pais=$row['Pais'];
                             echo "<option value=$idi>$pais</option>";
                             }
                    ?>

                </select>



                <input class="container_submit-ar" type="submit" value="agregar">
            </form>

        </div>

        <div class="container-table-ar">
            <div class="table-title-ar">Datos de Arbitros </div>
            <div class="table-header-ar">ID</div>
            <div class="table-header-ar">Nombre</div>
            <div class="table-header-ar">Nacionalidad</div>
            <div class="table-header-ar">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <div class="table-item-ar"><?php echo $row["IdArbitro"]?></div>
               <div class="table-item-ar"><?php echo $row["NombreArb"]?></div>
               <div class="table-item-ar"><?php echo $row["Nacionalidad"]?></div>
               <div class="table_item-ar">
                    <a href="./edicionAr.php?id=<?php echo $row["IdArbitro"]?>" class="table_item_link">Editar</a>
                    <a href="./eliminarAr.php?idE=<?php echo $row["IdArbitro"]?>" class=#table_item_link>Eliminar</a>
               </div>
               <?php }?>
            
        </div>
        <setion class="overlay"> </section> 

        <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
            navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
        </script>
    </body>





</html>












