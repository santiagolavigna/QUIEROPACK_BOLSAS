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
          
                  var saldo = $(this).find("[data-columnid='Precio']");
                            var saldo_valor = (saldo.html() * 1);

                               
                                    saldo.empty();
                                    saldo.append("<span class='label label-success'>"+saldo_valor.toFixed(3)+"</span>");
                                    

             
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
