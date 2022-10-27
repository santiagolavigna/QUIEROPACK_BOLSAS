<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $modulo_name = 'calculo';
  $generic_name = 'calculo';
  $bdname = 'calculo';
  $action_phpfile = 'actionCalculo';
  
  //datos
  //$bolsas = find_all('bolsas');
  $bolsas = get_join_triple();
  $bolsa = sustituirFK($bolsas,"id_impresion", find_all('impresion'), "nombre"); 
  //$bolsa_final = sustituirFK($bolsa, "id_gillotinado", find_all('gillotinado'), "nombre");
 
  
  $pegamentos = find_all('pegamentos');
  $armadotroquelado = find_all('armadotroquelado');
  $cordoncinta = find_all('cordoncinta');
  $armadobolsa = find_all('armadobolsa');
  $acarreo = find_all('acarreo');
  $barniz = find_all('barniz');
  $impresion = find_all('impresion');
  $perforado = find_all('perforado');
  $fondorefuerzo = find_all('fondorefuerzo');
  $empaquetado = find_all('empaquetado');
  $gillotinado = find_guillotinado();

  $d = find_all('dolar');
  $dolar = 0;
  //get dolar value
    foreach($d as $dat){
        $dolar = $dat['precio'];
        break;
    }
  
 $k = find_all('kg');
    $kg = 0;
  //get 1kg value
    foreach($k as $data){
        $kg = $data['precio'];
        break;
    }   
    

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nuevo '.$generic_name;
    $butonLabel = 'Agregar '.$generic_name;
    
  }else {
    $us = find_by_id_especial($bdname,(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar '.$bdname;
    $butonLabel = 'Actualizar '.$generic_name;
  }
  
 
?>
<div class="panel panel-default">

    <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-th"></span><span><?=$page_title?></span></strong>
        <a href="<?=$_SESSION['PAGINA_ANTERIOR']?>" class="btn btn-info pull-right">Volver</a>
    </div>

    <div class="panel-body">
        <form id="formProducts" method="post" action="?p=<?php echo $modulo_name?>|<?php echo $action_phpfile?>&altaModif">

            <?php if(isset($us['id'])) echo hcSimpleInput("id",$us,"hid")?>

            <div class="col-md-6">     
                    <strong><span></span><span>BOLSAS</span></strong>
                    <?php $cod = validate_index($us,"id_bolsas");?>
                    <?= hcSelectDobleEtiquetaString("id_bolsas",$bolsa,"id","nombre","","fuelle",$cod)?>  
                    
                     <strong><span></span><span>PEGAMENTOS</span></strong>
                       <?php $cod0 = validate_index($us,"id_pegamentos"); ?>
                     <select class="form-control" name="id_pegamentos" required=""> 
                    <?php  foreach ($pegamentos as $p): ?>
                         <?php if($p['id'] === $us['id_pegamentos']):?>
                         <option value="<?php echo $p['id'] ?>" selected><?php echo $p['nombre']." $ ". number_format(get_precio_pegamento($kg, $dolar, $p['cantidad'], $p['porcentaje']),3) ?></option>
                         <?php else: ?>
                         <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']." $ ". number_format(get_precio_pegamento($kg, $dolar, $p['cantidad'], $p['porcentaje']),3) ?></option>
                         <?php endif; ?>
                    <?php endforeach; ?>
                    </select>  
                    
                     <strong><span></span><span>ARMADOS/TROQUELADOS</span></strong>
                    <?php $cod1 = validate_index($us,"id_armadotroquelado"); ?>
                    <?= hcSelectDobleEtiqueta("id_armadotroquelado",$armadotroquelado,"id","nombre","precio",$cod1)?>    
                    
                     <strong><span></span><span>CORDON/CINTA</span></strong>
                      <?php $cod2 = validate_index($us,"id_cordoncinta"); ?>
                    <?= hcSelectDobleEtiqueta("id_cordoncinta",$cordoncinta,"id","nombre","precio",$cod2)?>       
                    
                     <strong><span></span><span>ARMADOS DE BOLSA</span></strong>
                      <?php $cod3 = validate_index($us,"id_armadobolsa"); ?>
                    <?= hcSelectDobleEtiqueta("id_armadobolsa",$armadobolsa,"id","nombre","precio",$cod3)?>       
                    
                     <strong><span></span><span>ACARREOS</span></strong>
                      <?php $cod4 = validate_index($us,"id_acarreo"); ?>
                    <?= hcSelectDobleEtiqueta("id_acarreo",$acarreo,"id","nombre","precio",$cod4)?>       
                    
                     <strong><span></span><span>BARNIZ PARA COLORES</span></strong>
                       <?php $cod5 = validate_index($us,"id_barniz"); ?>
                      <?= hcSelectDobleEtiqueta("id_barniz",$barniz,"id","nombre","precio",$cod5)?>  
                     
                         <strong><span></span><span>IMPRESION PARA COLORES</span></strong>
                       <?= $code0 = validate_index($us,"id_impresion"); ?>
                      <?= hcSelectDobleEtiqueta("id_impresion",$impresion,"id","nombre","precio",$code0)?>  
                    
                     <strong><span></span><span>PERFORADOS</span></strong>
                        <?php $cod6 = validate_index($us,"id_perforado"); ?>
                    <?= hcSelectDobleEtiqueta("id_perforado",$perforado,"id","nombre","precio",$cod6)?>  
                     
                      <strong><span></span><span>FONDO/REFUERZOS</span></strong>
                        <?php $cod7 = validate_index($us,"id_fondorefuerzo"); ?>
                    <?= hcSelectDobleEtiqueta("id_fondorefuerzo",$fondorefuerzo,"id","nombre","precio",$cod7)?>  
                      
                         <strong><span></span><span>EMPAQUETADO</span></strong>
                           <?php $cod8 = validate_index($us,"id_empaquetado"); ?>
                    <?= hcSelectDobleEtiqueta("id_empaquetado",$empaquetado,"id","nombre","precio",$cod8)?> 
                    
                    <strong><span></span><span>GUILLOTINADO</span></strong>
                           <?php $cod9 = validate_index($us,"id_gillotinado"); ?>
                    <?= hcSelectDobleEtiqueta("id_gillotinado",$gillotinado,"id","nombre","precio",$cod9)?> 
                             
                    <?=hcSimpleInput("fecha",$us,"fg|lab|date-now|readonly")?>
                    
                <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    

        </form>
    </div>
</div>

