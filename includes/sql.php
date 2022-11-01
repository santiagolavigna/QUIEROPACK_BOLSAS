<?php
  require_once('includes/load.php');
  
  /*--------------------------------------------------------------*/
  /****************** FUNCIONES DEL SISTEMA************************/
  /*--------------------------------------------------------------*/
  
  
  
  function update_dolar($dolar){
    
    global $db;
          $query  = "UPDATE `dolar` SET `precio`='{$dolar}' WHERE id = '99'";
          if($db->query($query)){
              return "true";
          }else{
              return "false";
          }
    
    
}

function update_kg($kg){
    
     global $db;
          $query  = "UPDATE `kg` SET `precio`='{$kg}' WHERE id = '99'";
          if($db->query($query)){
              return "true";
          }else{
              return "false";
          }
    
    
}



  
  //get join entre dos tablas
  //requiere que en la bd, el campo foraneo se llame id_(nombre de la tabla padre)
  //ejemplo: get_join(productos,categorias)
  //producto contiene el campo id_categorias
  
  function get_join($table,$table2) {
   global $db;
   if(tableExists($table))
   {
     if(tableExists($table2)){
         
     return find_by_sql("SELECT * FROM ".$db->escape($table)." "
             . "INNER JOIN ".$db->escape($table2).""
             . " ON ".$db->escape($table).".id_".$db->escape($table2).""
             . " = ".$db->escape($table2).".id" );
     }
     
   }
}


//join bolsa, cartulina, gramaje
function get_join_triple() {
   global $db;
    
     return find_by_sql("SELECT bolsas.id as id,bolsas.nombre, bolsas.largo as largo,bolsas.ancho as ancho,bolsas.fuelle as fuelle,bolsas.id_impresion as id_impresion,bolsas.id_cartulina as id_cartulina,"
             . " cartulina.id as id_c, cartulina.largo as cartulina_largo,cartulina.ancho as cartulina_ancho, cartulina.id_gramaje as cartulina_id_gramaje, cartulina.pliego as cartulina_pliego, cartulina.id_flete as cartulina_id_flete, "
             . "gramaje.id as id_gramaje, gramaje.nombre as gramaje_nombre,gramaje.gr as gr,gramaje.precio as gramaje_precio FROM bolsas "
             . "inner join cartulina on bolsas.id_cartulina = cartulina.id "
             . "inner join gramaje on cartulina.id_gramaje = gramaje.id" );

}




//join bolsa, cartulina, gramaje
function get_join_triple_bolsa() {
   global $db;
    //((cartulina.largo/100)* (cartulina.ancho/100)* gramaje.gr * cartulina.pliego * ((gramaje.precio + ((gi.precio*1)))* (flete.precio*0.01) +gramaje.precio+gi.precio) /1000/bolsas.cant_bolsa_pliego) as precio_cartulina
     return find_by_sql("SELECT bolsas.id as id,bolsas.nombre, bolsas.largo as largo,bolsas.ancho as ancho,bolsas.fuelle as fuelle,bolsas.id_impresion as id_impresion,bolsas.id_cartulina as id_cartulina,"
             . " cartulina.id as id_c, cartulina.largo as cartulina_largo,cartulina.ancho as cartulina_ancho, cartulina.id_gramaje as cartulina_id_gramaje, cartulina.pliego as cartulina_pliego, cartulina.id_flete as cartulina_id_flete, "
             . "gramaje.id as id_gramaje, gramaje.nombre as gramaje_nombre,gramaje.gr as gr,gramaje.precio as gramaje_precio,"
             . "bolsas.cant_bolsa_pliego as cant_pliegos, "
             . "(  (((cartulina.largo/100)* (cartulina.ancho/100)* cartulina.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio* ((flete.precio /100)+1) /1000)   /bolsas.cant_bolsa_pliego) as precio_cartulina FROM bolsas "
             . "inner join cartulina on bolsas.id_cartulina = cartulina.id "
             . "inner join gramaje on cartulina.id_gramaje = gramaje.id "
             . "inner join flete on cartulina.id_flete = flete.id "
             . " ORDER BY bolsas.ancho" );

}

 /*--------------------------------------------------------------*/
  /* Funcion para actualizar un campo en la bd (requiere como primer parametro
   * nombre de la tabla, segundo ID, tercero el nombre del campo en la BD que
   * sera actualizado y por ultimo el valor a actualizar.
   */
  /*--------------------------------------------------------------*/
  function update_campo($tabla,$id,$campo,$valor){
    global $db;
        $sql = "UPDATE `{$tabla}` SET `{$campo}` = '{$valor}' WHERE `{$tabla}`.`id` = {$id}";
        $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }


  
  /*obtenemos sugerencia de productos en sales|salesList
   * from ajaxSales
   *
   */
  
   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT nombre FROM productos WHERE nombre like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }
  
   /*obtenemos el producto indicado sea por codigo o nombre
    * from ajaxSales
    * 
    */

  function find_all_product_info_by_title($name){
    global $db;
    $sql  = "SELECT * FROM productos ";
    $sql .= " WHERE nombre ='{$name}' or codigo ='{$name}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }
  
  
  
  /*insertamos factura y retornamos el id si todo salio bien, sino retorna vacio*/
  function insert_factura($cliente,$modo_pago,$tipo_factura){
    Utils::log("COMIENZA EL ALTA DE LA FACTURA PARA EL CLIENTE ".print_r($cliente,true).'/n');      
    $id_factura_insertada = "";  
    $fecha = make_date();  
      
    global $db;

    //SI NO ES CONSUMIDOR FINAL
    if($cliente!=-1){
      $sql = "INSERT INTO `facturas`(`id_cliente`, `fecha`, `id_modo_pago`, `cae`, `tipo`) VALUES ('{$cliente}','{$fecha}','{$modo_pago}','-1','{$tipo_factura}')";
    }else{
      $sql = "INSERT INTO `facturas`(`fecha`, `id_modo_pago`, `cae`, `tipo`) VALUES ('{$fecha}','{$modo_pago}','-1','{$tipo_factura}')";
    }
     $db->query($sql);
     if($db->affected_rows() === 1){
            //si se dio de alta la factura, obtenemos el ultimo id del registro
            $query = "SELECT MAX(id) AS id FROM `facturas` LIMIT 1";
            $last_id = $db->query($query)->fetch_object()->id; 
            $id_factura_insertada = $last_id;         
            }
      Utils::log_facturacion("INSERTANDO UNA NUEVA FACTURA",true.'/n'); 
      Utils::log_facturacion("CONSULTA: ".$sql,true.'/n');
      Utils::log_facturacion("ID factura: ".print_r($id_factura_insertada,true).'/n'); 
      Utils::log_facturacion("***************************************************".'/n');
     return $id_factura_insertada;       
  }
  
  
  
   /*insertamos detalle y retornamos true si todo sale bien, sino false*/
  function insert_detalles($id_factura,$array_productos){
        
     $b = FALSE;  
     global $db;
     $array = json_decode($array_productos);
     
           //insertamos los detalles detalle
           $query = "INSERT INTO `detalles`"
                   . "(`id_facturas`, `id_productos`, `cantidad`, `precio_compra`, `precio_venta`, `total`) "
                   . "VALUES ";
            
            $values = "";
            foreach ($array as $obj) {
                $TOTAL=$obj->precio_venta*$obj->cantidad;
                $values .= "('{$id_factura}','{$obj->id}','{$obj->cantidad}','{$obj->precio_compra}','{$obj->precio_venta}','{$TOTAL}')";
                $values .= ",";
            }
            
            $values = trim($values, ',');
            
            $query .= $values;
              Utils::log_facturacion("INSERTANDO UN NUEVO DETALLE",true.'/n');
              Utils::log_facturacion("CONSULTA: ".$query,true.'/n');
              
             $db->query($query);  
             
            //si el detalle fue insertado
            if($db->affected_rows() >= 1){  
                
                
                    //si se dio de alta el detalle, obtenemos el ultimo id del registro
                      $query = "SELECT MAX(id) AS id FROM `detalles` LIMIT 1";
                     $id_detalle = $db->query($query)->fetch_object()->id;
                     Utils::log_facturacion("ID detalle: ".print_r($id_detalle,true).'/n');               
                     Utils::log_facturacion("***************************************************".'/n');
                
                        //descontamos stock                    
                        if(update_product_qty($array)){
                            $b = true;
                            return $b;
                        }else{
                            /*borrar insert y factura*/
                            delete_by_id('detalles', $id_detalle);
                            delete_by_id('facturas', $id_factura);
                        }     
                        
                        
                }else{
                    //si el detalle no fue insertado, borramos la factura asociada
                    delete_by_id('facturas', $id_factura);
                }     
        
        
    return $b;
  }
 
  
  
  //*************************************************************
  //INICIO FUNCIONES PANEL DE CONTROL ***************************
  //*************************************************************
  
  
  /*--------------------------------------------------------------*/
 /* get caja diaria
/*--------------------------------------------------------------*/

  //obtenemos la caja
function get_caja_today($year,$month,$today){
  global $db;

    $sql     ="SELECT SUM(detalles.total) AS total FROM detalles "
            . "INNER JOIN facturas on detalles.id_facturas = facturas.id "
            . "INNER JOIN modo_pago on facturas.id_modo_pago = modo_pago.id " 
            . "WHERE DATE_FORMAT(facturas.fecha, '%Y-%m-%d' ) = '{$year}-{$month}-{$today}' AND modo_pago.id = '1'";
    $result = $db->query($sql);
    return($db->fetch_assoc($result));
  
}
//sumamos a la caja movimientos en efectivo si los hay
function get_movimientos_today($year,$month,$today){
  global $db;

    $sql     ="SELECT SUM(mc.monto) AS total "
            . "FROM movimiento_cliente mc "
            . "WHERE DATE_FORMAT(mc.fecha, '%Y-%m-%d' ) = '{$year}-{$month}-{$today}' AND mc.id_modo_pago = '1'";
    $result = $db->query($sql);
    return($db->fetch_assoc($result));
}


/*--------------------------------------------------------------*/
  /* ultimos productos añadidos
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.nombre,p.precio_compra,p.precio_venta,c.nombre AS categorie";
   $sql  .= " FROM productos p";
   $sql  .= " LEFT JOIN categorias c ON c.id = p.id_categorias";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
    Utils::log(print_r("find recent: ".$sql,true).'/n');
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* productos con mayor venta en el ultimo mes
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit,$year,$month){
   global $db;
   $sql  = "SELECT p.nombre, SUM(s.cantidad) AS totalSold, s.precio_venta - s.precio_compra AS totalQty";
   $sql .= " FROM detalles s";
   $sql .= " LEFT JOIN productos p ON p.id = s.id_productos ";
   $sql .= " LEFT JOIN facturas f ON s.id_facturas = f.id ";
   $sql  .= "WHERE DATE_FORMAT(f.fecha, '%Y-%m' ) = '{$year}-{$month}'";
   $sql .= " GROUP BY s.id_productos";
   $sql .= " ORDER BY SUM(s.cantidad) DESC LIMIT ".$db->escape((int)$limit);
    Utils::log(print_r("find high: ".$sql,true).'/n');
   return $db->query($sql);
 }
  
/*--------------------------------------------------------------*/
 /* ultimos 5 clientes con mayor deuda
 /*--------------------------------------------------------------*/
 
 function get_deudores(){
   global $db;

    $sql  ="SELECT * FROM clientes ";
    $sql .= " GROUP BY clientes.id";
    $sql .= " ORDER BY SUM(clientes.saldo) ASC LIMIT 5";
    $result = $db->query($sql);
     return($result);
 }
 
  
   //*********************************************************** 
  //FIN FUNCIONES PANEL DE CONTROL ***************************
  //************************************************************
 
 
 /************************
  * FUNCIONES FACTURAS
  */
 function get_facturas_by_idcliente($id){
     global $db;
     $sql = "SELECT "
             . "detalles.id_facturas as id, f.fecha, mp.nombre as modopago, sum(detalles.total) as subtotal "
             . "FROM `detalles` "
             . "INNER JOIN productos p ON p.id = detalles.id_productos "
             . "INNER JOIN facturas f on detalles.id_facturas = f.id "
             . "INNER JOIN clientes c on c.id = f.id_cliente "
             . "INNER JOIN modo_pago mp on f.id_modo_pago = mp.id "
             . "WHERE c.id = '{$id}'"
             . "GROUP BY detalles.id_facturas";
     return(find_by_sql($sql));
 }
 
 
 function get_movimientos_by_idcliente($id){
     global $db;
     $sql = "SELECT "
             . "mc.id, mc.fecha, mp.nombre as modopago, mc.monto, mc.concepto, mc.detalles "
             . "FROM `movimiento_cliente` mc "
             . "INNER JOIN modo_pago mp on mc.id_modo_pago = mp.id "
             . "WHERE mc.id_cliente = '{$id}'";
     return(find_by_sql($sql));
 }
 
 
 function get_facturas_by_idfactura($id){
     global $db;
     $sql = "SELECT "
             . "detalles.id_facturas as id, c.id as cliente, f.fecha, mp.nombre as modopago, p.nombre as producto, detalles.cantidad, detalles.precio_venta, detalles.total "
             . "FROM `detalles` "
             . "INNER JOIN productos p ON p.id = detalles.id_productos "
             . "INNER JOIN facturas f on detalles.id_facturas = f.id "
             . "INNER JOIN clientes c on c.id = f.id_cliente "
             . "INNER JOIN modo_pago mp on f.id_modo_pago = mp.id "
             . "WHERE f.id = '{$id}'";
     return(find_by_sql($sql));
 }
 
 
 
 
 
  /*--------------------------------------------------------------*/
  /****************** FUNCIONES BASE  *****************************/
  /*--------------------------------------------------------------*/
  
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}

function find_guillotinado() {
   global $db;

     return find_by_sql("SELECT g.id,g.nombre,g.kilo,g.corte,g.costo, (((gr.precio * (f.precio*0.01) + gr.precio ) + (gr.precio * (f.precio*0.01) + gr.precio ) * 0.10) ) precio_cartulina
     FROM `gillotinado` g
     inner join `bolsas` b on 
     g.nombre = b.nombre 
     inner join  `cartulina` c on
     c.id = b.id_cartulina 
     inner join  `gramaje` gr on
     gr.id = c.id_gramaje 
     inner join  `flete` f on
     f.id  = c.id_flete 
     WHERE 1");
   
}


function find_pagos() {
   global $db;

   
     return find_by_sql("SELECT pago_pegadora.id,nombre,detalle,monto as monto_pagado,fecha,deuda FROM `pago_pegadora` INNER JOIN pegadora p on p.id = pago_pegadora.id_pegadora");
   
}


function find_impresiones()
{
  global $db;


          $sql = $db->query("SELECT * FROM impresion");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;

}



  
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all_calculos() {
   global $db;
   $user = current_user();

return find_by_sql("SELECT 
cl.id, 
b.nombre as bolsa_nombre, b.largo as bolsa_largo, b.ancho as bolsa_ancho, b.fuelle as bolsa_fuelle, 
im.nombre as bolsa_tipo, im.precio as impresion_precio,
ba.precio as barniz_precio,
atr.precio as armadotroquelado_precio,
cc.precio as cordoncinta_precio,
fr.precio as fondorefuerzo_precio,
ab.precio as armadobolsa_precio,
pf.precio as perforado_precio,
ac.precio as acarreo_precio,
car.largo as largo1,
car.ancho as ancho1,
gramaje.precio as gramaje1,
car.pliego as pliego1,
k.precio as precio_kg,
                                                                                   
((  (((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio*  ((flete.precio /100)+1) /1000)   /b.cant_bolsa_pliego)                                + atr.precio + cc.precio + fr.precio + ab.precio + ((k.precio * d.precio * p.cantidad * ( (p.porcentaje / 100)+1   )) / 1000) + pf.precio + e.precio + ac.precio + cast(    ( ( ( (((gramaje.precio * (flete.precio*0.01) + gramaje.precio ) + (gramaje.precio * (flete.precio*0.01) + gramaje.precio ) * 0.10) ) * gi.kilo) * {$user['porcentaje']} ) / 100 ) / 1000   as decimal(10,3)) ) as lisa,
((  (((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio*  ((flete.precio /100)+1) /1000)   /b.cant_bolsa_pliego)+  ba.precio + (im.precio * 1)  + atr.precio + cc.precio + fr.precio + ab.precio + ((k.precio * d.precio * p.cantidad * ( (p.porcentaje / 100)+1   )) / 1000) + pf.precio + e.precio + ac.precio + cast(    ( ( ( (((gramaje.precio * (flete.precio*0.01) + gramaje.precio ) + (gramaje.precio * (flete.precio*0.01) + gramaje.precio ) * 0.10) ) * gi.kilo) * {$user['porcentaje']} ) / 100 ) / 1000   as decimal(10,3)) ) as 1color,
((  (((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio*  ((flete.precio /100)+1) /1000)   /b.cant_bolsa_pliego)+  ba.precio + (im.precio * 2)  + atr.precio + cc.precio + fr.precio + ab.precio + ((k.precio * d.precio * p.cantidad * ( (p.porcentaje / 100)+1   )) / 1000) + pf.precio + e.precio + ac.precio + cast(    ( ( ( (((gramaje.precio * (flete.precio*0.01) + gramaje.precio ) + (gramaje.precio * (flete.precio*0.01) + gramaje.precio ) * 0.10) ) * gi.kilo) * {$user['porcentaje']} ) / 100 ) / 1000   as decimal(10,3)) ) as 2colores,
((  (((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio*  ((flete.precio /100)+1) /1000)   /b.cant_bolsa_pliego)+  ba.precio + (im.precio * 3)  + atr.precio + cc.precio + fr.precio + ab.precio + ((k.precio * d.precio * p.cantidad * ( (p.porcentaje / 100)+1   )) / 1000) + pf.precio + e.precio + ac.precio + cast(    ( ( ( (((gramaje.precio * (flete.precio*0.01) + gramaje.precio ) + (gramaje.precio * (flete.precio*0.01) + gramaje.precio ) * 0.10) ) * gi.kilo) * {$user['porcentaje']} ) / 100 ) / 1000   as decimal(10,3)) ) as 3colores,
((  (((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio*  ((flete.precio /100)+1) /1000)   /b.cant_bolsa_pliego)+  ba.precio + (im.precio * 4)  + atr.precio + cc.precio + fr.precio + ab.precio + ((k.precio * d.precio * p.cantidad * ( (p.porcentaje / 100)+1   )) / 1000) + pf.precio + e.precio + ac.precio + cast(    ( ( ( (((gramaje.precio * (flete.precio*0.01) + gramaje.precio ) + (gramaje.precio * (flete.precio*0.01) + gramaje.precio ) * 0.10) ) * gi.kilo) * {$user['porcentaje']} ) / 100 ) / 1000   as decimal(10,3)) ) as 4colores,
(  (((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio* ((flete.precio /100)+1) /1000)   /b.cant_bolsa_pliego) as precio_final_cartulina
                                                                                        

FROM `calculo` cl 
INNER JOIN bolsas b ON b.id = cl.id_bolsas
INNER JOIN pegamentos p ON p.id = cl.id_pegamentos
INNER JOIN dolar d ON p.precio_dolar = d.id
INNER JOIN kg k ON p.precio_kilo = k.id
INNER JOIN armadotroquelado atr ON atr.id = cl.id_armadotroquelado
INNER JOIN cordoncinta cc ON cc.id = cl.id_cordoncinta
INNER JOIN armadobolsa ab ON ab.id = cl.id_armadobolsa
INNER JOIN acarreo ac ON ac.id = cl.id_acarreo
INNER JOIN barniz ba ON ba.id = cl.id_barniz
INNER JOIN impresion im ON im.id = cl.id_impresion
INNER JOIN perforado pf ON pf.id = cl.id_perforado
INNER JOIN fondorefuerzo fr ON fr.id = cl.id_fondorefuerzo
INNER JOIN cartulina car ON car.id = b.id_cartulina
INNER JOIN gramaje ON gramaje.id = car.id_gramaje
INNER JOIN flete ON flete.id = car.id_flete
INNER JOIN gillotinado gi ON gi.id = cl.id_gillotinado
INNER JOIN empaquetado e ON e.id = cl.id_empaquetado
ORDER BY cl.id");

}

function find_egreso(){
   global $db;

return find_by_sql("SELECT e.id, p.nombre as pegadora, c.nombre as cliente, bk.nombre as nombre_bolsa,bk.precio as precio_bolsa, `cantidad`, ((bk.precio * cantidad) / 1000) as total, `fecha` FROM `egreso` e INNER JOIN pegadora p on p.id = e.id_pegadora
INNER JOIN cliente c on c.id = e.id_cliente INNER JOIN bolsa_kg bk on bk.id = e.id_bolsa_kg ORDER BY c.nombre,bk.nombre");

}

function find_ingreso(){
   global $db;

return find_by_sql("SELECT e.id, p.nombre as pegadora, c.nombre as cliente,bk.nombre as nombre_bolsa, bk.precio as precio_bolsa, `cantidad`, ((bk.precio * cantidad) / 1000) as pago_por_cantidad , `fecha` FROM `ingreso` e INNER JOIN pegadora p on p.id = e.id_pegadora
INNER JOIN cliente c on c.id = e.id_cliente INNER JOIN bolsa_kg bk on bk.id = e.id_bolsa_kg ORDER BY c.nombre,bk.nombre");

}

function find_control_egresos(){
   global $db;

return find_by_sql("select p.nombre as pegadora,
    c.nombre as cliente, bk.nombre as nombre, sum(e.cantidad) as cantidad, 
    (sum(e.cantidad) * bk.precio / 1000) as total 
    from egreso e INNER JOIN pegadora p on p.id = e.id_pegadora 
    INNER JOIN cliente c on c.id = e.id_cliente 
    INNER JOIN bolsa_kg bk on bk.id = e.id_bolsa_kg 
    GROUP BY e.id_pegadora, e.id_cliente,bk.nombre
");

}

function find_control_egresohuerfano(){
    
    global $db;
    
    return find_by_sql("select p.nombre as pegadora,
    c.nombre as cliente, bk.nombre as nombre,sum(e.cantidad) as cantidad, 
    (sum(e.cantidad) * bk.precio / 1000) as total, i.id_pegadora as id_pegadora from egreso e 
    INNER JOIN pegadora p on p.id = e.id_pegadora 
    INNER JOIN cliente c on c.id = e.id_cliente 
    INNER JOIN bolsa_kg bk on bk.id = e.id_bolsa_kg 
    LEFT JOIN ingreso i on i.id_pegadora = e.id_pegadora and 
    i.id_cliente = e.id_cliente and i.id_bolsa_kg = e.id_bolsa_kg GROUP BY e.id_cliente,bk.nombre");
    
}

function find_control_ingresos(){
   global $db;

return find_by_sql("select p.nombre as pegadora,
    c.nombre as cliente, bk.nombre as nombre,sum(e.cantidad) as cantidad, 
    (sum(e.cantidad) * bk.precio / 1000) as total 
    from ingreso e INNER JOIN pegadora p on p.id = e.id_pegadora 
    INNER JOIN cliente c on c.id = e.id_cliente 
    INNER JOIN bolsa_kg bk on bk.id = e.id_bolsa_kg 
    GROUP BY e.id_pegadora, e.id_cliente,bk.nombre
");

}

//cast((gi.kilo*gi.corte*gi.costo )/gi.division as decimal(10,3)) as guillotinado,
function find_cartulina() {
   global $db;

return find_by_sql("SELECT 
car.id,
car.largo, car.ancho, car.pliego,
gramaje.nombre as gramaje, gramaje.gr as gramajes, gramaje.precio as gramaje_precio,
f.precio as flete,

cast(((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000  as decimal(10,3)) as kilo,
cast(((car.largo/100)* (car.ancho/100)* car.pliego * (gramaje.gr * 0.001)  * 1.10 )*1000* gramaje.precio* ((f.precio /100)+1) /1000  as decimal(10,3)) as costo_pliego
FROM `cartulina` car 
INNER JOIN flete f ON f.id = car.id_flete
INNER JOIN gramaje ON gramaje.id = car.id_gramaje
ORDER BY car.id");

}


function update_deuda_pegadora($pegadora,$cantidad) {
   global $db;

return find_by_sql("UPDATE `pegadora` SET `deuda`= deuda - '{$cantidad}' where id = '{$pegadora}'");

}

/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{

  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}


/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

/*especial para calculs*/
function find_by_id_especial($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT calculo.id, id_bolsas,id_pegamentos,id_armadotroquelado,id_cordoncinta,id_armadobolsa,id_acarreo,id_barniz,id_perforado,id_fondorefuerzo,id_empaquetado,fecha,calculo.id_impresion, calculo.id_gillotinado as id_gillotinado "
                  . "FROM `calculo` "
                  . "INNER JOIN bolsas on calculo.id_bolsas = bolsas.id "
                  . "INNER JOIN cartulina on bolsas.id_cartulina = cartulina.id WHERE calculo.id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}


/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  
        $registro = "";
        //backup in log_deleteds
           if(tableExists($table)){  
              $sql = "SELECT * FROM ".$db->escape($table);
              $sql .= " WHERE id=". $db->escape($id);
              $sql .= " LIMIT 1";
              $registro = find_by_sql($sql);
           }
          
    if(tableExists($table)){
          $sql = "DELETE FROM ".$db->escape($table);
          $sql .= " WHERE id=". $db->escape($id);
          $sql .= " LIMIT 1";
          $db->query($sql);
             Utils::log_deleteds("ELIMINANDO ".$table,true.'/n'); 
             Utils::log_deleteds("CONSULTA: ".$sql,true.'/n');
             Utils::log_deleteds("ID: ".print_r($id,true).'/n'); 
          
          
          if($db->affected_rows() === 1){
              Utils::log_deleteds("//////////////////REGISTRO ELIMINADO///////////////////////////////// ",true.'/n'); 
              Utils::log_deleteds(print_r($registro,true).'/n');
               Utils::log_deleteds("/////////////////////////////////////////////////////////////////// ",true.'/n'); 
              Utils::log_deleteds("***************************************************".'/n');    
              return true;
          }else{return false;}
    }else return false;
}




function pagar_pegadora($id,$total)
{
  global $db;
  
        $sql = "UPDATE `pegadora` SET `deuda`= deuda - '{$total}' WHERE id = '{$id}'";
          $db->query($sql);
                    
          
          if($db->affected_rows() === 1){  
              return true;
          }else{return false;}
 
}


/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }

  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     error_reporting(E_ERROR | E_PARSE);
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('?p=home',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('?p=home', false);
        endif;

     }     
     
     
     
function insert_deuda($pegadora,$total){
     global $db;
      $F = make_date();
      $sql = "UPDATE `pegadora` SET `deuda`= deuda + '{$total}' WHERE id = '{$pegadora}'";
      $result = $db->query($sql);
      Utils::log($sql);
  }
     
     
     
function insertUpdateBBDD($TABLE,$DATA){
    //RECIBE EN DATA UN ARRAY ASOCIATIVO CON LOS CAMPOS A CARGAR EN BBDD
    //SI EXISTE EL CAMPO ID HACE UN UPDATE, SINO UN INSERT INTO..
       global $db;
       global $session;
       
       $action = "";
       if(!isset($DATA['id'])){
              $action = "agregado";
              $q = "INSERT INTO ".$TABLE." (";
              foreach ($DATA as $k=>$v){
                $q.=$k.',';
              }
              $q=substr($q,0,-1);
              $q .=") VALUES (";
              foreach ($DATA as $k=>$v){
                $q.='"'.rj($v).'",';
              }
              $q=substr($q,0,-1);
              $q .=");";
        }else{
              $action = "actualizado";
              $q = "UPDATE ".$TABLE." SET ";
              foreach ($DATA as $k=>$v){
                $q.=$k.'="'.$v.'", ';
              }
              $q=substr($q,0,-2);
              $q.=' WHERE id="'.rj($DATA['id']).'";';
              Utils::actualizaciones(print_r($q,true).'/n');
        }
           Utils::log(print_r($q,true).'/n');
        $isOK=$db->query($q);
        Utils::log(print_r($q,true).'/n');
        
        if($isOK){
            $session->msg("s","Regristro "+ $action +" con exito");
        }
        
        return $isOK;
 }

?>
