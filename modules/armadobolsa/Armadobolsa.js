window.onload = function ( ) {
    bdname = 'armadobolsa';
    list_phpfile = 'armadobolsaList';
    abm_phpfile = 'abmArmadoBolsa';
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

	console.log("modulo <categorie.js> fue cargado OK!");
    
}
