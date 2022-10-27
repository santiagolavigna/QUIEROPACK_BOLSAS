<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $modulo_name = 'egresos';
  $generic_name = 'egresos';
  $bdname = 'egreso';
  $action_phpfile = 'actionEgresos';

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nuevo '.$generic_name;
    $butonLabel = 'Agregar '.$generic_name;
    
  }else {
    $us = find_by_id($bdname,(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar bolsa';
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
                 <div class="form-group">
                      <label for="user-level">Pegadora</label>
                      <?php $cod = validate_index($us,'id_pegadora') ?>
                      <?=hcSelect("id_pegadora", find_all('pegadora'),"id","nombre",$cod)?>                  
                    </div>
                
                 <div class="form-group">
                      <label for="user-level">Cliente</label>
                      <?php $cod1 = validate_index($us,'id_cliente')?>
                      <?=hcSelect("id_cliente", find_all('cliente'),"id","nombre",$cod1)?>                  
                    </div>
                
                 <div class="form-group">
                      <label for="user-level">Bolsa</label>
                      <?php $cod2 = validate_index($us,'id_bolsa_kg') ?>
                      <?= hcSelectDobleEtiqueta("id_bolsa_kg", find_all('bolsa_kg'),"id","nombre","precio",$cod2)?>                  
                    </div>
                
                
               <?=hcSimpleInput("cantidad",$us,"fg|lab|num|req")?>
               
                
               <?=hcSimpleInput("fecha",$us,"fg|lab|date")?> 
                <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    
      
        </form>
    </div>
</div>

