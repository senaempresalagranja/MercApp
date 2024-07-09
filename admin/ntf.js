var timestrap = null;
function cargar_push() {
    
    $.ajax({
        async: true,
        type: "POST",
        url: "notificacion.php",
        data: "" ,
        datatype: "HTML",
        success: function (datos) {
            var datos = eval("("+datos+")");
            var header = new Array();

            
               
                    Push.create("",{
                        body: datos.mensaje,
                        icon: 'img/logomercapp.png',
                        timeout: 5000
        
                    });
                   
                
            
            
        }
    
    });

    // $.ajax({
    //     async: true,
    //     type: "POST",
    //     url: "ntf.php",
    //     data: "&timestrap=" + timestrap ,
    //     datatype: "HTML",
    //     success: function (data) 
    //     {
    //          var json = eval("("+data+")");
    //          timestrap = json.timestrap;
    //          mensaje= json.mensaje;
    //          id= json.id;

    //          if (timestrap==null) {
                                  
    //          }
    //          else{
    //             $.ajax({
    //                 async: true,
    //                 type: "POST",
    //                 url: "notificacion.php",
    //                 data: "" ,
    //                 datatype: "HTML",
    //                 success: function () {
                        
    //                 }
                
    //             });
    //          }
    //     }
    // });
}