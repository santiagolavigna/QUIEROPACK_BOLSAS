<?php
  $page_title = 'Lista de armado/troquelado';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$armtroquelado = find_all('armadotroquelado');
?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span>armado/troquelado</span>
        </strong>
        <a href="?p=armadotroquelado|abmarmadotroquelado" class="btn btn-info pull-right">Agregar armado/troquelado</a>
    </div>

    <div class="panel-body">
        <?=hcTable("armadotroquelado",$armtroquelado)?>
    </div>

</div>