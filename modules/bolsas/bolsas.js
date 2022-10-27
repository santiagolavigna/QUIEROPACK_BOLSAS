window.onload = function ( ) {
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()=="bolsas|bolsasList"){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-bolsas","bolsas|abmBolsas","edit");
			createTableButton("#table-bolsas","bolsas|actionBolsas&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
                
                
             
                $('#table-bolsas tbody tr').each(function(indice, elemento) {
          
                     var nodo = $(this).find("[data-columnid='precio']");   
      
                    var nodo_valor = parseFloat(nodo.text()).toFixed(3);
          
                               nodo.empty();
                               nodo.append("<span class='label label-success'>"+nodo_valor+"</span>");   
                });
        
                
                
                 //COLOCAMOS EL HOT SEARCH
		$.getScript("libs/hotSearch/hs.js",function(){
			hotSearch($('#table-bolsas'));
		});
                
                 //COLOCAMOS EL BOTON DE IMPRIMIR
		$.getScript("libs/printButton/pb.js",function(){
			insertPrintButton($("#principalPage"));
		});
         		
	}
        
        
        
           url = getCurrentPage();
        if(url.match(/^bolsas|abmBolsas.*$/)){
            

             $("select[name='id_impresion']").css("display", "none");
           
			
		};
		
	

	console.log("modulo <categorie.js> fue cargado OK!");
    
}
