<?php
  $page_title = 'Lista de ingresos';
  
  $modulo_name = 'ingresos';
  $generic_name = 'ingresos';
  $bdname = 'ingreso';
  $action_phpfile = 'actionIngresos';
  $abm_phpfile = 'abmIngresos';
  $modulo_pago = 'pagarIngreso';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$armtroquelado = find_ingreso();

?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
        <div class="panel-heading clearfix">
                <a href="?p=<?php echo $modulo_name?>|<?php echo $modulo_pago?>" class="btn btn-success pull-left">PAGAR</a>

        <a href="?p=<?php echo $modulo_name?>|<?php echo $abm_phpfile?>" class="btn btn-info pull-right">Agregar <?php echo $generic_name?></a>
    </div>
</div>

    <div class="panel-body">
        <?=hcTable($bdname,$armtroquelado)?>
    </div>

</div>