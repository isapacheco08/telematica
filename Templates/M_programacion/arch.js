$(document).ready(function () {
    /* --variables para llamar a los select por el id */
    let $Grupo = document.getElementById("Grupo");
    let $Local= document.getElementById("equipo1");
    let $Visitante = document.getElementById("equipo2");
    let $Arbitro = document.getElementById("Arbitro");
    
    //Configuracion de los desplegables
    
    function cargarGrupo() {
      $.ajax({
        type: "GET",
        url: "select.php",
        success: function (response) {
          const Grupos = JSON.parse(response);
  
          let template =
            '<option class="container_input-pa"" selected disabled>-- Seleccione --</option>';
  
          Grupos.forEach((Group) => {
            template += `<option class="container_input-pa"" value="${Group.id_grupo}">${Group.grupo}</option>`;
          });
  
          $Grupo.innerHTML = template;
        },
      });
    }
  
    cargarGrupo();
  
  
  
  });