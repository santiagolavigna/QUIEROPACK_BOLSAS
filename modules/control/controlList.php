<?php
  $page_title = 'Lista de control';
  
  $modulo_name = 'control';
  $generic_name = 'control';
  $abm_phpfile = 'abmControl';

?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
$egresos = find_control_egresos();
$ingresos = find_control_ingresos();

$egr = find_control_egresohuerfano();


?>

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <strong>
            <span class="glyphicon glyphicon-th"></span> <span><?php echo $generic_name ?></span>
        </strong>
      <a href="?p=<?php echo $modulo_name?>|<?php echo $abm_phpfile?>" class="btn btn-info pull-right">Realizar pago</a> 
       
    </div>

    <div class="panel-body">
        <table id="table-control" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 15%;"> Pegadora</th>
                <th class="text-center" style="width: 15%;"> Cliente</th>
                    <th class="text-center" style="width: 35%;">Bolsa</th>
                <th class="text-center" style="width: 15%;"> pegadora </th>
                <th class="text-center" style="width: 15%;"> fabrica(ingresados)</th>
              <!--  <th class="text-center" style="width: 15%;"> Deuda </th>
             --> </tr>
            </thead>
        
     <?php   
        foreach ($egresos as $e) :?>

         <?php   foreach ($ingresos as $i) :?>

               <?php if($e['pegadora'] === $i['pegadora'] && $e['cliente'] === $i['cliente'] && $e['nombre'] === $i['nombre'] ):?>
                <tr>
                    <th class="text-center" style="width: 15%;"><?php echo rj($e['pegadora']); ?></th>
                    <th class="text-center" style="width: 15%;"><?php echo rj($e['cliente']); ?></th>
                    <th class="text-center" style="width: 15%;"><?php echo rj($e['nombre']); ?></th>
                    <th class="text-center" style="width: 15%;"><?php echo rj($e['cantidad'] - $i['cantidad']); ?></th>
                    <th class="text-center" style="width: 15%;"><?php echo rj($i['cantidad']); ?></th>
                    <!--<th class="text-center" data-columnid="Deuda" style="width: 15%;"><?php echo rj($e['total'] - $i['total']); ?></th>
                 --></tr>  
                <?php endif; ?>        
             <?php endforeach;?>   
        
     <?php endforeach;?>   
              <?php foreach ($egr as $eg) :?>  
              <?php if($eg['id_pegadora'] === null ):?>
              <tr>
                    <th class="text-center" style="width: 15%;"><?php echo rj($eg['pegadora']); ?></th>
                    <th class="text-center" style="width: 15%;"><?php echo rj($eg['cliente']); ?></th>
                    <th class="text-center" style="width: 15%;"><?php echo rj($eg['nombre']); ?></th>
                    <th class="text-center" style="width: 15%;"><?php echo rj($eg['cantidad']); ?></th>
                    <th class="text-center" style="width: 15%;">0</th>
                    <!-- <th class="text-center" data-columnid="Deuda" style="width: 15%;"><?php echo rj($eg['total']); ?></th>
                --></tr> 
              <?php endif; ?>
              <?php endforeach;?>   
        </table>   
    </div>

</div>