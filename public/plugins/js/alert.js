function deletes(slug,url){
    swal({
      title: "¿Desea eliminar este item "+slug+"?",
      text: "El item se eliminara en caso de que precione OK!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: APP_URL+url+slug,
          method: 'GET',
          success: function (respuesta) {
            swal({
              icon: "success",
              title: "Exito",
              text: "Sea eliminado el item con exito!",
            });
            location.reload();

          },error(e){
            swal('Error en url',{
              icon: "error",
            });
          }
        });
      }else{
        swal("Se cancelo la acción!",{
          title:'Acción Cancelada',
          icon:"info",
        });
      }
    });
  }

function verify_user(slug,url,string){
    swal({
      title: "¿Desea "+ string +" al usuario "+slug+"?",
      text: "El usuario se le "+ string +" en caso de que precione OK!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: APP_URL+url+slug,
          method: 'GET',
          success: function (respuesta) {
            swal({
              icon: "success",
              title: "Exito",
              text: "Sea le "+ string +" con exito!",
            });
            location.reload();

          },error(e){
            swal('Error en url',{
              icon: "error",
            });
          }
        });
      }else{
        swal("Se cancelo la acción!",{
          title:'Acción Cancelada',
          icon:"info",
        });
      }
    });
  }
function remove_cargo(slug,url,string){
 swal({
  title: "¿Desea "+ string +" al usuario "+slug+"?",
  text: "El usuario se le "+ string +" el cargo de coordinador en caso de que precione OK!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url: APP_URL+url+slug,
      method: 'GET',
      success: function (respuesta) {
        swal({
          icon: "success",
          title: "Exito",
          text: "Sea le "+ string +"el cargo con exito!",
        });
        location.reload();

      },error(e){
        swal('Error en url',{
          icon: "error",
        });
      }
    });
  }else{
    swal("Se cancelo la acción!",{
      title:'Acción Cancelada',
      icon:"info",
    });
  }
}); 
}




