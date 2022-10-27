<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nueva fondo/refuerzo';
    $butonLabel = 'Agregar fondo/refuerzo';
    
  }else {
    $us = find_by_id('fondorefuerzo',(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar fondo/refuerzo: '.rj($us['nombre']);
    $butonLabel = 'Actualizar fondo/refuerzo';
  }

?>
<div class="panel panel-default">

    <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-th"></span><span><?=$page_title?></span></strong>
        <a href="<?=$_SESSION['PAGINA_ANTERIOR']?>" class="btn btn-info pull-right">Volver</a>
    </div>

    <div class="panel-body">
        <form id="formProducts" method="post" action="?p=fondorefuerzo|actionFondorefuerzo&altaModif">

            <?php if(isset($us['id'])) echo hcSimpleInput("id",$us,"hid")?>

            <div class="col-md-6">
                <?=hcSimpleInput("nombre",$us,"fg|lab|ph:Nombre fondo/refuerzo...")?>
                <?=hcSimpleInput("precio",$us,"fg|lab|num|req")?>
             <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    
        
        </form>
    </div>
</div>

