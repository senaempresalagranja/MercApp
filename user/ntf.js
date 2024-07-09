var promocion = null;
function cargar_push() {
    
  

    $.ajax({
        async: true,
        type: "POST",
        url: "ntf.php",
        data: "" ,
        datatype: "HTML",
        success: function (data) 
        {
             var json = eval("("+data+")");
              promocion = json.idPromocion;

             if (promocion==null) {
                                  
             }
             else{
                 window.open("Promocion.php?idPromocion="+promocion +"", "popup","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140");
              
               
             }
        }
    });
}