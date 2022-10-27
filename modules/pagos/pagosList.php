<?php
  $page_title = 'Lista de pagos';
  
  $modulo_name = 'pago';
  $generic_name = 'pagos';
  $bdname = 'pago_pegadora';
  $action_phpfile = 'actionPago';
  $abm_phpfile = 'abmPago';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$armtroquelado = find_pagos();
?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
        <div class="panel-heading clearfix">
    </div>
</div>

    <div class="panel-body">
        <?=hcTable($bdname,$armtroquelado)?>
    </div>

</div>