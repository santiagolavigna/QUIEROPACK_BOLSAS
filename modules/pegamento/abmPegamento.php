<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $modulo_name = 'pegamento';
  $generic_name = 'pegamento';
  $bdname = 'pegamentos';
  $action_phpfile = 'actionPegamento';
  
  
$d = find_all('dolar');
  
  //get dolar value
    foreach($d as $dat){
        $dolar = $dat['precio'];
        break;
    }
    
 $k = find_all('kg');
  
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
    $us = find_by_id($bdname,(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar '.$bdname;
    $butonLabel = 'Actualizar '.$generic_name;
  }

?>
<div class="panel panel-default">
    
            <div class="panel-heading clearfix">
                <strong>
                 <span class="glyphicon glyphicon-usd pull-left"></span>   
                   <span class="pull-left">Precio Dolar Actual :   &nbsp;&nbsp;</span>
                     <button name="update_dolar" class="btn btn-success pull-right">Actualizar precio dolar</button>
                      &nbsp;&nbsp;
                  <input type="number" step=".01" class="pull-left" name="value_dolar" value="<?php echo $dolar ?>">
               </strong>
          </div>
    
          <div class="panel-heading clearfix">
                <strong>
                 <span class="glyphicon glyphicon-usd pull-left"></span>   
                   <span class="pull-left">Precio 1kg pegamento Actual :   &nbsp;&nbsp;</span>
                     <button name="update_kg" class="btn btn-success pull-right">Actualizar precio 1kg</button>
                      &nbsp;&nbsp;
                  <input type="number" step=".01" class="pull-left" name="value_kg" value="<?php echo $kg ?>">
               </strong>
          </div>

    <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-th"></span><span><?=$page_title?></span></strong>
        <a href="<?=$_SESSION['PAGINA_ANTERIOR']?>" class="btn btn-info pull-right">Volver</a>
    </div>

    <div class="panel-body">
        <form id="formProducts" method="post" action="?p=<?php echo $modulo_name?>|<?php echo $action_phpfile?>&altaModif">

            <?php if(isset($us['id'])) echo hcSimpleInput("id",$us,"hid")?>

            
                 <?=hcSimpleInput("nombre",$us,"fg|lab|req|ph:Nombre del pegamento")?>
        
                <input type="number" step="0.01" class="form-control" autocomplete="off" name="precio_kilo" value="<?php echo 99 ?>"  placeholder="1KG" readonly="true"  style="display:none">
                                        
                <?=hcSimpleInput("cantidad",$us,"fg|lab|num|ph:cantidad en kg")?>
                <?=hcSimpleInput("porcentaje",$us,"fg|lab|num|req|ph:porcentaje")?>
                <div class="form-group">
                    <input type="number" step="0.01" class="form-control" autocomplete="off" name="precio_dolar" value="<?php echo 99 ?>"  placeholder="USD" readonly="true"  style="display:none">
                </div>
                <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    
      
        </form>
    </div>
</div>

