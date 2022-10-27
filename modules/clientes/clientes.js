window.onload = function ( ) {
    bdname = 'cliente';
    modulo = 'clientes';
    list_phpfile = 'clientesList';
    abm_phpfile = 'abmClientes';
    action_phpfile = 'actionClientes';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==(modulo+"|"+list_phpfile)){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,modulo+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,modulo+"|"+action_phpfile+"&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
		
	}

	console.log("modulo <categorie.js> fue cargado OK!");
    
}
