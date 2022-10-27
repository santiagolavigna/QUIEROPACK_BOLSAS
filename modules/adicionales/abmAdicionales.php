<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $modulo_name = 'adicionales';
  $generic_name = 'adicional';
  $bdname = 'adicionales';
  $action_phpfile = 'actionAdicionales';

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nuevo '.$generic_name;
    $butonLabel = 'Agregar '.$generic_name;
    
  }else {
    $us = find_by_id($bdname,(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar '.$bdname.': '.rj($us['nombre']);
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
                <?=hcSimpleInput("adicional",$us,"fg|lab|ph:Adicional...")?>
                <?=hcSimpleInput("detalle",$us,"fg|lab")?>
                 <?=hcSimpleInput("precio",$us,"fg|lab|num|ph:$")?>
                <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    
      
        </form>
    </div>
</div>

