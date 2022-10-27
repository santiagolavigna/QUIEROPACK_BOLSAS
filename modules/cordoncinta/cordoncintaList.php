<?php
  $page_title = 'Lista de cordon/cinta';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$cordoncinta = find_all('cordoncinta');
?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span>cordon/cinta</span>
        </strong>
        <a href="?p=cordoncinta|abmcordoncinta" class="btn btn-info pull-right">Agregar cordon/cinta</a>
    </div>

    <div class="panel-body">
        <?=hcTable("cordoncinta",$cordoncinta)?>
    </div>

</div>