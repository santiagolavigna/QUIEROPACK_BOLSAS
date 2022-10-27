window.onload = function ( ) {
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()=="cordoncinta|cordoncintaList"){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-cordoncinta","cordoncinta|abmCordoncinta","edit");
			createTableButton("#table-cordoncinta","cordoncinta|actionCordoncinta&baja","remove");
			
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
