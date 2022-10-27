<?php
  $page_title = 'Lista de cartulinas';
  
  $modulo_name = 'cartulina';
  $generic_name = 'cartulina';
  $bdname = 'cartulina';
  $action_phpfile = 'actionCartulina';
  $abm_phpfile = 'abmCartulina';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $myTable= find_cartulina();

    ?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
        <a href="?p=<?php echo $modulo_name?>|<?php echo $abm_phpfile?>" class="btn btn-info pull-right">Agregar <?php echo $generic_name?></a>
    </div>

    <div class="panel-body">
        <?=hcTable($bdname,$myTable,"id|largo|ancho|pliego|gramaje|kilo|gramaje_precio|flete|costo_pliego")?>
    </div>

</div>