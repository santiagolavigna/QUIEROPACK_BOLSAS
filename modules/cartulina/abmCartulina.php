<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $modulo_name = 'cartulina';
  $generic_name = 'cartulina';
  $bdname = 'cartulina';
  $action_phpfile = 'actionCartulina';
  
  
  $guillotinado = find_guillotinado();
  $flete = find_all('flete');
  $gramaje = find_all('gramaje');

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nueva '.$generic_name;
    $butonLabel = 'Agregar '.$generic_name;
    
  }else {
    $us = find_by_id($bdname,(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar '.$bdname.': ';
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
                <?=hcSimpleInput("largo",$us,"fg|lab|num|req")?>
                <?=hcSimpleInput("ancho",$us,"fg|lab|num|req")?>
                <?=hcSimpleInput("pliego",$us,"fg|lab|num|req")?>
                 <?= $cod = validate_index($us,"id_gramaje"); $cod2 = validate_index($us,"id_flete"); $cod3 = validate_index($us,"id_gillotinado");  ?>
                
                <strong><span></span><span>Gramaje</span></strong>
                    <?= hcSelectDobleEtiqueta("id_gramaje",$gramaje,"id","nombre","precio",$cod)?>   
                
 
                <strong><span></span><span>Flete</span></strong>
                    <?= hcSelectDobleEtiquetaPorcentaje("id_flete",$flete,"id","nombre","precio",$cod2)?>    
                <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    
      
        </form>
    </div>
</div>

