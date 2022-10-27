window.onload = function ( ) {
    bdname = 'adicionales';
    list_phpfile = 'adicionalesList';
    abm_phpfile = 'abmAdicionales';
    action_phpfile = 'actionAdicionales';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==(bdname+"|"+list_phpfile)){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,bdname+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,bdname+"|"+action_phpfile+"&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
		
	}

	console.log("modulo <categorie.js> fue cargado OK!");
    
}
