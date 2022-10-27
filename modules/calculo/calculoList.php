<?php
  $page_title = 'Lista de calculos';
  
  $modulo_name = 'calculo';
  $generic_name = 'calculo';
  $bdname = 'calculo';
  $action_phpfile = 'actionCalculo';
  $abm_phpfile = 'abmCalculo';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$armtroquelado = find_all_calculos();
//print_r($armtroquelado);
  
  $add= find_all('adicionales');
?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
        <a href="?p=<?php echo $modulo_name?>|<?php echo $abm_phpfile?>" class="btn btn-info pull-right">Agregar <?php echo $generic_name?></a>
    </div>

    <div class="panel-body">
        <?=hcTable($bdname,$armtroquelado,"bolsa_nombre:Nombre bolsa|lisa|1color|2colores|3colores|4colores")?>
        <?php if(!empty($add)): ?>
        <?= hcTable('Adicionales', $add, "adicional|detalle|precio") ?>
        <?php        endif; ?>
    </div>

</div>