window.onload = function ( ) {
    bdname = 'bolsa_kg';
    modulo = 'bolsa';
    list_phpfile = 'bolsaList';
    abm_phpfile = 'abmBolsa';
    action_phpfile = 'actionBolsa';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==("bolsa|"+list_phpfile)){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,modulo+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,modulo+"|"+action_phpfile+"&baja","remove");
			
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
