<?php
  $page_title = 'Lista de bolsas';
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$bolsas = get_join_triple_bolsa();
/*foreach ($bolsas as $value) {
    print_r(" PRECIO: ");
    print_r($value['precio_cartulina']);
    print_r(" ****** ");
}*/
$bolsa = sustituirFK($bolsas,"id_impresion", find_all('impresion'), "nombre");

?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span>Bolsas</span>
        </strong>
        <a href="?p=bolsas|abmBolsas" class="btn btn-info pull-right">Agregar bolsa</a>
    </div>

    <div class="panel-body">
        <?=hcTable("bolsas",$bolsa,"id|1:Nombre|largo|ancho|fuelle|cartulina_largo:c_largo|cartulina_ancho:c_ancho|cant_pliegos|gr:cartulina gramaje|precio_cartulina:precio")?>
    </div>

</div>