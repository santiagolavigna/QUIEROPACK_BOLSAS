window.onload = function ( ) {
    bdname = 'calculo';
    moduloname = 'calculo';
    list_phpfile = 'calculoList';
    abm_phpfile = 'abmCalculo';
    action_phpfile = 'actionCalculo';
    
	//si estamos en pagina "categorie|categorieList", ejecutamos la funcion
	if(getCurrentPage()==(moduloname+"|"+list_phpfile)){

                //PONEMOS LOS BOTONES DE EDIT Y REMOVE EN LA TABLA
		$.getScript("libs/megaButtons/mb.js",function(){
			createTableButton("#table-"+bdname,moduloname+"|"+abm_phpfile,"edit");
			createTableButton("#table-"+bdname,moduloname+"|"+action_phpfile+"&baja","remove");
			
			//$("#principalPage").prepend('<div id="homeButton">');
			//createButton("#homeButton","home","home");
			
		});
                
                //COLOCAMOS EL HOT SEARCH
		$.getScript("libs/hotSearch/hs.js",function(){
			hotSearch($('#table-calculo'));
		});
                
                     
            //COLOCAMOS EL BOTON DE IMPRIMIR
		$.getScript("libs/printButton/pb.js",function(){
			insertPrintButton($("#principalPage"));
		});
                
                
                  
                    $('#table-calculo tbody tr').each(function(indice, elemento) {
                        //AGREGAMOS EL TOTAL A LA LISA
                        var nodo = $(this).find("[data-columnid='Lisa']"); 
                        var nodo_valor = parseFloat(nodo.html()).toFixed(3);
                        
               
                            nodo.empty();
                            nodo.append("<span class='label label-success'>"+nodo_valor+"</span>");    
                            
                            
                          //AGREGAMOS EL TOTAL A LA 1color
                          
                           var nodo1 = $(this).find("[data-columnid='1color']"); 
    
                            var nodo_valor1 = parseFloat(nodo1.html()).toFixed(3);
       
                            nodo1.empty();
                            nodo1.append("<span class='label label-success'>"+nodo_valor1+"</span>");  
                          
                              //AGREGAMOS EL TOTAL A LA 2color
                              
                            var nodo2 = $(this).find("[data-columnid='2colores']"); 
                            var nodo_valor2 = parseFloat(nodo2.html()).toFixed(3);

                            nodo2.empty();
                            nodo2.append("<span class='label label-success'>"+nodo_valor2+"</span>");  
                              
                                  //AGREGAMOS EL TOTAL A LA 3color
                                  
                                    var nodo3 = $(this).find("[data-columnid='3colores']"); 
                                    var nodo_valor3 = parseFloat(nodo3.html()).toFixed(3);
                      
                                    nodo3.empty();
                                    nodo3.append("<span class='label label-success'>"+nodo_valor3+"</span>"); 
                                  
                                      //AGREGAMOS EL TOTAL A LA 4color
                            
                                         var nodo4 = $(this).find("[data-columnid='4colores']"); 
                  
                                    var nodo_valor4 = parseFloat(nodo4.html()).toFixed(3);
                     
                                    nodo4.empty();
                                    nodo4.append("<span class='label label-success'>"+nodo_valor4+"</span>"); 
                              
                    });
                   
	}
        
        
              
           url = getCurrentPage();
        if(url.match(/^calculo|abmCalculo.*$/)){        
                 $("#text").css("display","none");
           		
		};
        
        
        

	console.log("modulo <categorie.js> fue cargado OK!");
    
}
