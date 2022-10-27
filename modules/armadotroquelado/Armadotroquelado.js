window.onload = function ( ) {
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()=="armadotroquelado|armadotroqueladoList"){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-armadotroquelado","armadotroquelado|abmarmadotroquelado","edit");
			createTableButton("#table-armadotroquelado","armadotroquelado|actionarmadotroquelado&baja","remove");
			
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
