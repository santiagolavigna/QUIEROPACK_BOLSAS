<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $cartulina = find_cartulina('cartulina');

  $us = [];
  if(!isset($_REQUEST['id'])){
    $page_title = 'Nueva bolsa';
    $butonLabel = 'Agregar bolsa';
    
  }else {
    $us = find_by_id('bolsas',(int)$_REQUEST['id']);
    if(!$us) redirect($thisPage);
    $page_title = 'Modificar bolsa: '.rj($us['nombre']);
    $butonLabel = 'Actualizar bolsa';
  }

?>
<div class="panel panel-default">

    <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-th"></span><span><?=$page_title?></span></strong>
        <a href="<?=$_SESSION['PAGINA_ANTERIOR']?>" class="btn btn-info pull-right">Volver</a>
    </div>

    <div class="panel-body">
        <form id="formProducts" method="post" action="?p=bolsas|actionBolsas&altaModif">

            <?php if(isset($us['id'])) echo hcSimpleInput("id",$us,"hid")?>

            <div class="col-md-6">
                <?=hcSimpleInput("nombre",$us,"fg|lab|req|ph:Nombre bolsa...")?>
                <?=hcSimpleInput("largo",$us,"fg|lab|num|req")?>
                <?=hcSimpleInput("ancho",$us,"fg|lab|num|req")?>
                <?=hcSimpleInput("fuelle",$us,"fg|lab|num|req")?>
                    <strong><span></span><span>Cartulina (Largo X ancho X gramaje)</span></strong>
                    <?= $cod = validate_index($us,"id_cartulina"); $cod1 = validate_index($us,"id_impresion"); $cod2 = validate_index($us, "cant_bolsa_pliego")?>
                      <?= hcSelectTripleEtiqueta("id_cartulina", $cartulina,"id","largo","ancho","gramajes",$cod)?> 
                       <?= hcSelect("id_impresion", find_all('impresion'), "id","nombre",$cod)?>
                    <br>
                      <?=hcSimpleInput("cant_bolsa_pliego",$us,"fg|lab:Cantidad bolsas por pliego|num|req",$cod2)?>
                 <br>
              <button type="submit" class="btn btn-primary"><?=$butonLabel?></button>
            </div>    

        </form>
    </div>
</div>

