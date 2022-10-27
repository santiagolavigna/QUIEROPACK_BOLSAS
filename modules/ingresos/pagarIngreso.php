<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $modulo_name = 'ingresos';
  $generic_name = 'Pago';
  $bdname = 'pago_contadora';
  $action_phpfile = 'actionIngresos';

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nuevo '.$generic_name;
    $butonLabel = 'Agregar '.$generic_name;
    
  }else {
    $us = find_by_id($bdname,(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar pago';
    $butonLabel = 'Actualizar '.$generic_name;
  }

?>
<div class="panel panel-default">

    <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-th"></span><span><?=$page_title?></span></strong>
        <a href="<?=$_SESSION['PAGINA_ANTERIOR']?>" class="btn btn-info pull-right">Volver</a>
    </div>

    <div class="panel-body">
        <form id="formProducts" method="post" action="?p=<?php echo $modulo_name?>|<?php echo $action_phpfile?>&pagar">

            <?php if(isset($us['id'])) echo hcSimpleInput("id",$us,"hid")?>

            <div class="col-md-6">
                 <div class="form-group">
                      <label for="user-level">Pegadora</label>
                      <?php $cod = validate_index($us,'id_pegadora') ?>
                      <?=hcSelect("id_pegadora", find_all('pegadora'),"id","nombre",$cod)?>                  
                    </div>
                
               <?=hcSimpleInput("detalle",$us,"fg|lab")?>
                
               <?=hcSimpleInput("monto",$us,"fg|lab|num|req|ph:$")?>
               
                
               <?=hcSimpleInput("fecha",$us,"fg|lab|date-now|readonly")?> 
                <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    
      
        </form>
    </div>
</div>

