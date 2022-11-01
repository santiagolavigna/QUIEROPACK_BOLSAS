window.onload = function ( ) {
    bdname = 'gillotinado';
    modulo_name = 'guillotinado';
    list_phpfile = 'guillotinadoList';
    abm_phpfile = 'abmGuillotinado';
    action_phpfile = 'actionGuillotinado';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==(modulo_name+"|"+list_phpfile)){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,modulo_name+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,modulo_name+"|"+action_phpfile+"&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
                
                
                $('#table-gillotinado tbody tr').each(function(indice, elemento) {
          
                  var price = $(this).find("[data-columnid='Precio']");
                            var price_value = (price.html() * 1);                               
                            price.empty();
                            price.append("<span class='label label-success'>"+price_value.toFixed(3)+"</span>");
                 
                
                var price_cart = $(this).find("[data-columnid='Precio_cartulina']");
                            var price_cart_valor = (price_cart.html() * 1);                               
                            price_cart.empty();
                            price_cart.append("<span class='label label-success'>"+price_cart_valor.toFixed(3)+"</span>");

             
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
