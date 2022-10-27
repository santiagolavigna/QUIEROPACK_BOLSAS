<?php
  $page_title = 'Lista de fondo/refuerzo';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$cordoncinta = find_all('fondorefuerzo');
?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span>fondo/refuerzo</span>
        </strong>
        <a href="?p=fondorefuerzo|abmfondorefuerzo" class="btn btn-info pull-right">Agregar fondo/refuerzo</a>
    </div>

    <div class="panel-body">
        <?=hcTable("fondorefuerzo",$cordoncinta)?>
    </div>

</div>