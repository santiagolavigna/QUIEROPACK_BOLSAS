window.onload = function ( ) {
    bdname = 'cartulina';
    list_phpfile = 'cartulinaList';
    abm_phpfile = 'abmCartulina';
    action_phpfile = 'actionCartulina';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion

	if(getCurrentPage()==(bdname+"|"+list_phpfile)){

            
              $("#table-"+bdname+' tbody tr').each(function(i) {
    
                    total = parseFloat(((($(this).find("[data-columnid='Gramaje_precio']").text()*1))  * ( $(this).find("[data-columnid='Flete']").text() * 1 * 0.01 )) +  (($(this).find("[data-columnid='Gramaje_precio']").text()*1)),2);
                    
                    console.log("gramaje "+(($(this).find("[data-columnid='Gramaje_precio']").text()*1)))
                    console.log("*")
                    console.log("flete: "+( $(this).find("[data-columnid='Flete']").text() * 1 * 0.01 ))
                    console.log("+")
                    console.log("Gramaje otra vez")

                    console.log("total: " + total)

                    //TODO LUNES
                    //SACAR ESTOS CALCULOS PARA METERLOS EN LA QUERY DEL GUILLOTINADO Y OBTENER EL PRECIO DE LA CARTULINA DE LA BOLSA
                    
                    //obtenemos el porcentaje
                    sum_porcentaje = parseFloat(total * 0.10 ,2);

                    console.log("sum porcentaje: "+sum_porcentaje) 

                    console.log((total+sum_porcentaje).toFixed(2))

                    $(this).append('<td>$ '+(total+sum_porcentaje).toFixed(2)+'</td>');
               
                   /*    var nodo3 = $(this).find("[data-columnid='Precio_final']"); 
                                    var nodo_valor3 = parseFloat(nodo3.html()).toFixed(3);
                      
                                    nodo3.empty();
                                    nodo3.append("<span class='label label-success'>"+nodo_valor3+"</span>"); 
                       */              
                                    
                                    
                       var nodo5 = $(this).find("[data-columnid='Kilo']"); 
                                    var nodo_valor5 = parseFloat(nodo5.html()).toFixed(3);
                      
                                    nodo5.empty();
                                    nodo5.append("<span class='label label-success'>"+nodo_valor5+"</span>");               
                                   
                       var nodo6 = $(this).find("[data-columnid='Costo_pliego']"); 
                                    var nodo_valor6 = parseFloat(nodo6.html()).toFixed(3);
                      
                                    nodo6.empty();
                                    nodo6.append("<span class='label label-success'>"+nodo_valor6+"</span>");               
                                   
                });

		
            
            
            
            

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,bdname+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,bdname+"|"+action_phpfile+"&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
                
                 //COLOCAMOS EL BOTON DE IMPRIMIR
		$.getScript("libs/printButton/pb.js",function(){
			insertPrintButton($("#principalPage"));
		});
                
	}

	console.log("modulo fue cargado OK!");
    
}
