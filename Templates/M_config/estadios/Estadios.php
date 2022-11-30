<?php
    include("cnArb.php");
    $query = "SELECT * FROM Estadios";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Equipos</title>
        <link rel="stylesheet" href="./Estadios.css">
        <link rel="shortcut icon" href="../../images/img5.png"/>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Configuración</title>
        <link rel="stylesheet" href="styleConfig.css" />
        <link
        href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
        rel="stylesheet"
    />
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
                <a href="../arbitros/Arbitros.php" class="nav-link">
                  <i class="bx bx-bar-chart-alt-2 icon"></i>
                  <span class="link">árbitros</span>              
                </a>
              </li>
              <li class="list">
                <a href="./Estadios.php" class="nav-link">
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


        <div class="container-add-es">
            <h2 class="container-tilte-es"> Agregar Equipos</h2>
            <form action="./insertarEs.php" method="post" class="container__form-es">
                <label for="" class="container_label-es">Nombre</label>
                <input name="nombre" type="text" class="container_input-es">
                <label for="" class="container_label-es">Capacidad</label>
                <input name="capacidad" type="text" class="container_input-es">
                <label for="" class="container_label-es">Ubicación</label>
                <input name="ubicacion" type="text" class="container_input-es">
                <label for="" class="container_label-es">Imagen</label>
                <input name="imagen" type="text" class="container_input-es">

                <input class="container_submit-es" type="submit" value="agregar">
            </form>

        </div>

        <div class="container-table-es">
            <div class="table-title-es">Datos de de Estadios</div>
            <div class="table-header-es">Nombre</div>
            <div class="table-header-es">Capacidad</div>
            <div class="table-header-es">Ubicación</div>
            <div class="table-header-es">Imagen</div>
            <div class="table-header-es">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <div class="table-item-es"><?php echo $row["Nombre_est"]?></div>
               <div class="table-item-es"><?php echo $row["Capacidad"]?></div>
               <div class="table-item-es"><?php echo $row["Ubicacion"]?></div>
               <div class="table-item-es"><img src="<?php echo $row["Imagen"]?>" alt="logo" width="200"></div>
               <div class="table_item-es">
                    <a href="./edicionEs.php?id=<?php echo $row["idEstadios"]?>" class="table_item_link-es">Editar</a>
                    <a href="./eliminarEs.php?idE=<?php echo $row["idEstadios"]?>" class=#table_item_link-es>Eliminar</a>
               </div>
               <?php }?>
            
        </div>
        <setion class="overlay">


      </section>


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












