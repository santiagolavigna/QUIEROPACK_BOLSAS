window.onload = function ( ) {
    bdname = 'pegamentos';
    moduloname = 'pegamento';
    list_phpfile = 'pegamentoList';
    abm_phpfile = 'abmPegamento';
    action_phpfile = 'actionPegamento';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==(moduloname+"|"+list_phpfile)){
            
            
                $("#table-"+bdname+' tbody tr').each(function(i) {
                     Precio_kilo =   parseFloat($(this).find("[data-columnid='precio']").text()).toFixed(3)    ;
                     Precio_dolar = ($(this).find("[data-columnid='Precio_dolar']").text()*1)     ;
                     Cantidad = ($(this).find("[data-columnid='Cantidad']").text()*1)     ;
                     Porcentaje = (($(this).find("[data-columnid='%']").text()/100)+1)     ;
                     total = parseFloat((Precio_kilo * Precio_dolar * Cantidad * Porcentaje ) /1000).toFixed(3) ;
                    $(this).append('<td>$ '+total+'</td>');
                
                });
                /*$p = number_format($porcentaje * '0.1',2);
                $precio = ($precio_kilo * 
                        $precio_dolar * 
                        $cantidad 
                        * $p) / 1000 ;
                        */
            

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,moduloname+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,moduloname+"|"+action_phpfile+"&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
		 //COLOCAMOS EL BOTON DE IMPRIMIR
		$.getScript("libs/printButton/pb.js",function(){
			insertPrintButton($("#principalPage"));
		});
	}

	console.log("modulo <categorie.js> fue cargado OK!");
        
        
        
   if(getCurrentPage()==(moduloname+"|"+abm_phpfile)){     
         $('button[name=update_dolar]').click(function(e) {
      
             dolar = $('input[name=value_dolar]').val();
       
         
         if(dolar.length >= 1){
           // process the form
           getAjax_POST('_ajax.php?p=pegamento|ajaxPegamento&update_dolar',{precio_dolar:dolar},function(data){                                   
                  if(data['RESULT']){
                      alert("Dolar actualizado correctamente");
                      location.reload();
                  }else{
                      alert("Error al actualizar el dolar");
                  }                    
                });
    
               
        }
           
       
       
    });
    
    
    
    //ACTUALIZAR PRECIO 1 KG
    
     $('button[name=update_kg]').click(function(e) {
      
             kg = $('input[name=value_kg]').val();
       
         
         if(kg.length >= 1){
           // process the form
           getAjax_POST('_ajax.php?p=pegamento|ajaxPegamento&update_kg',{precio_kg:kg},function(data){                                   
                  if(data['RESULT']){
                      alert("Kg actualizado correctamente");
                      location.reload();
                  }else{
                      alert("Error al actualizar el precio 1kg");
                  }                    
                });
    
               
        }
           
       
       
    });
    
    
    
    
   }
}
