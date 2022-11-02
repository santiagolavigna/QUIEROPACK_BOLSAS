window.onload = function ( ) {
    bdname = 'armadobolsa';
    list_phpfile = 'armadobolsaList';
    abm_phpfile = 'abmArmadobolsa';
    action_phpfile = 'actionArmadobolsa';

	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==(bdname+"|"+list_phpfile)){

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

	if(getCurrentPage()==(bdname+"|"+abm_phpfile)){
	
		$('button[name=update_dolar_bolsa]').click(function(e) {
	
			dolar = $('input[name=value_dolar_bolsa]').val();
		
		
		if(dolar.length >= 1){
		  // process the form
		  getAjax_POST('_ajax.php?p=armadobolsa|ajaxArmadoBolsa&update_dolar_bolsa',{precio_dolar:dolar},function(data){                                 
				 if(data['RESULT']){
					 alert("Dolar armado bolsa actualizado correctamente");
					 location.reload();
				 }else{
					 alert("Error al actualizar el dolar");
				 }                    
			   });
		} 
		});
	}

	console.log("modulo <Armadobolsa.js> fue cargado OK!");
    
}



