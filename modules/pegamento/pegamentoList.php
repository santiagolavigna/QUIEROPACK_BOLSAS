<?php
  $page_title = 'Lista de pegamentos';
  
  $modulo_name = 'pegamento';
  $generic_name = 'pegamento';
  $bdname = 'pegamentos';
  $action_phpfile = 'actionPegamento';
  $abm_phpfile = 'abmPegamento';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$armtroquelado = find_all($bdname);
$dolar = find_all('dolar');
$kg = find_all('kg');
$arm = sustituirFK($armtroquelado, 'precio_dolar', $dolar, 'precio');
$arm1 = sustituirFK($arm,'precio_kilo' , $kg, 'precio');
?>

<div class="panel panel-default">
    

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
        <a href="?p=<?php echo $modulo_name?>|<?php echo $abm_phpfile?>" class="btn btn-info pull-right">Agregar <?php echo $generic_name?></a>
    </div>

    <div class="panel-body">
        <?=hcTable($bdname,$arm1,"id|nombre|precio_kilo:precio kg(USD)|cantidad|porcentaje: %:30px|precio_dolar")?>
    </div>

</div>