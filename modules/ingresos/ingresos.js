window.onload = function ( ) {
    bdname = 'ingreso';
    modulo = 'ingresos';
    list_phpfile = 'ingresosList';
    abm_phpfile = 'abmIngresos';
    action_phpfile = 'actionIngresos';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==(modulo+"|"+list_phpfile)){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,modulo+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,modulo+"|"+action_phpfile+"&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
                
                
                //COLOCAMOS EL HOT SEARCH
		$.getScript("libs/hotSearch/hs.js",function(){
			hotSearch($('#table-'+bdname));
		});
		
                
                
                $('#table-'+bdname+' tbody tr').each(function(indice, elemento) {
                
                
                     var saldo = $(this).find("[data-columnid='Total_a_pagar']");
                            var saldo_valor = (saldo.html() * 1);

                               
                                    saldo.empty();
                                    saldo.append("<span class='label label-success'>"+saldo_valor.toFixed(2)+"</span>");
                                    
                                      var saldo1 = $(this).find("[data-columnid='Pago_por_cantidad']");
                            var saldo_valor1 = (saldo1.html() * 1);

                               
                                    saldo1.empty();
                                    saldo1.append("<span class='label label-success'>"+saldo_valor1.toFixed(2)+"</span>");
                                
             
                            fecha =  $(this).find("[data-columnid='Fecha']");
                            fecha_value = $(this).find("[data-columnid='Fecha']").html().toString();
                            
                            array = fecha_value.split("-");
                            
                            new_fecha = array[2]+"/"+array[1]+"/"+array[0];
                            
                            fecha.empty();
                            fecha.html(new_fecha);
                            
                        });
             
         //COLOCAMOS EL BOTON DE IMPRIMIR
		$.getScript("libs/printButton/pb.js",function(){
			insertPrintButton($("#principalPage"));
		});
	}

	console.log("modulo <categorie.js> fue cargado OK!");
    
}
