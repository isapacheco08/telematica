<!DOCTYPE html>
<html lang="en">
<head>
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
                <a href="./equipos/Equipos.php" class="nav-link">
                  <i class="bx bx-home-alt icon"></i>
                  <span class="link">Datos del equipo</span>
                </a>
              </li>
              <li class="list">
                <a href="./arbitros/Arbitros.php" class="nav-link">
                  <i class="bx bx-bar-chart-alt-2 icon"></i>
                  <span class="link">árbitros</span>              
                </a>
              </li>
              <li class="list">
                <a href="./estadios/Estadios.php" class="nav-link">
                  <i class="bx bx-bell icon"></i>
                  <span class="link">Estadios</span>
                </a>
              </li>
              <li class="list">
                <a href="#" class="nav-link">
                  <i class="bx bx-message-rounded icon"></i>
                  <span class="link">Jugadores</span>
                </a>
              </li>
            </ul>

            <div class="bottom-cotent">
              <li class="list">
                <a href="#" class="nav-link">
                  <i class="bx bx-log-out icon"></i>
                  <span class="link">Logout</span>
                </a>
              </li>
            </div>
          </div>
        </div>
      </nav>
 
 
 
  
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