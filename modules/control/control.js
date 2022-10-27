window.onload = function ( ) {

    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==("control|controlList")){

                
                
                //COLOCAMOS EL HOT SEARCH
		$.getScript("libs/hotSearch/hs.js",function(){
			hotSearch($('#table-control'));
		});
		
                
                
                $('#table-control tbody tr').each(function(indice, elemento) {
          
                  var saldo = $(this).find("[data-columnid='Deuda']");
                            var saldo_valor = (saldo.html() * 1);

                               
                                    saldo.empty();
                                    saldo.append("<span class='label label-success'>"+saldo_valor.toFixed(2)+"</span>");
                                    

             
                        /*    fecha =  $(this).find("[data-columnid='Fecha_enviada']");
                            fecha_value = $(this).find("[data-columnid='Fecha_enviada']").html().toString();
                            
                            array = fecha_value.split("-");
                            
                            new_fecha = array[2]+"/"+array[1]+"/"+array[0];
                            
                            fecha.empty();
                            fecha.html(new_fecha);
                         */
                        });
                        
                         //COLOCAMOS EL BOTON DE IMPRIMIR
		$.getScript("libs/printButton/pb.js",function(){
			insertPrintButton($("#principalPage"));
		});
                
	}

	console.log("modulo <categorie.js> fue cargado OK!");
    
}
