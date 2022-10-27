<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $modulo_name = 'bolsa';
  $generic_name = 'bolsa';
  $bdname = 'bolsa_kg';
  $action_phpfile = 'actionBolsa';

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nueva '.$generic_name;
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
                <?=hcSimpleInput("nombre",$us,"fg|lab|req|ph:Nombre...")?>
                <?=hcSimpleInput("precio",$us,"fg|lab|num|req|ph:precio por kg...")?>
                <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    
      
        </form>
    </div>
</div>

