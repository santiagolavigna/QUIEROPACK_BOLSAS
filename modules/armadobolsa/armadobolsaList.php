<?php
  $page_title = 'Lista de armado/troquelado';
  
  $modulo_name = 'armadobolsa';
  $generic_name = 'armado de bolsa';
  $bdname = 'armadobolsa';
  $action_phpfile = 'actionArmadobolsa';
  $abm_phpfile = 'abmArmadobolsa';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$armadoBolsa = find_armadoBolsaList($bdname);
?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
        <a href="?p=<?php echo $modulo_name?>|<?php echo $abm_phpfile?>" class="btn btn-info pull-right">Agregar <?php echo $generic_name?></a>
    </div>

    <div class="panel-body">
        <?=hcTable($bdname,$armadoBolsa)?>
    </div>

</div>