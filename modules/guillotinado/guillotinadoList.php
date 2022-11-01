<?php
  $page_title = 'Lista de guillotinados';
  
  $modulo_name = 'guillotinado';
  $generic_name = 'guillotinado';
  $bdname = 'gillotinado';
  $action_phpfile = 'actionGuillotinado';
  $abm_phpfile = 'abmGuillotinado';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$guillotinado = find_guillotinado();

foreach($guillotinado as &$g){
   $calculo_precio = (($g['precio_cartulina'] * $g['kilo']) * (int)$user['porcentaje'] ) / 100;
   $g['precio'] = $calculo_precio/1000;
}

unset($g);
?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
        <a href="?p=<?php echo $modulo_name?>|<?php echo $abm_phpfile?>" class="btn btn-info pull-right">Agregar <?php echo $generic_name?></a>
    </div>

    <div class="panel-body">
        <?=hcTable($bdname,$guillotinado,"id|nombre|precio_cartulina|kilo|precio")?>
    </div>

</div>