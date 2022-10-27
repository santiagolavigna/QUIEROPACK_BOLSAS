<?php
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $bdname = 'ingreso';

  if(isset($_REQUEST['altaModif'])){
  //SI ES ALTA O MODIFICACION
      if(!insertUpdateBBDD($bdname,$_POST))
        $session->msg('d','No se pudo realizar la accion correspondiente.');
      else{
          $bolsa = find_by_id('bolsa_kg',$_POST['id_bolsa_kg']);
          insert_deuda($_POST['id_pegadora'],(($_POST['cantidad'] * $bolsa['precio'])/1000));
          $session->msg('s','Operación realizada correctamente.'); 
      }

  }if(isset($_REQUEST['baja'])){
  //SI ES BAJA
          $pegadora = find_by_id($bdname,(int)$_REQUEST['id']);
          $bolsa = find_by_id('bolsa_kg',$pegadora['id_bolsa_kg']);
          
          update_deuda_pegadora($pegadora['id_pegadora'], $pegadora['cantidad'] * $bolsa['precio']/1000);
          
      
      $delete_id = delete_by_id($bdname,(int)$_REQUEST['id']);
      echo  '</br>delete_id: '.$delete_id;  
      echo  '</br>delete_id: '.(int)$_REQUEST['id'];   
      if($delete_id)  $session->msg("s","elemento eliminado, saldo actualizado");
      else $session->msg("d","Se produjo un error en la eliminación");
  }if(isset($_REQUEST['pagar'])){
  //SI ES BAJA
      insertUpdateBBDD('pago_pegadora',$_POST);
             
      $pago = pagar_pegadora($_POST['id_pegadora'],$_POST['monto']);
      if($pago) $session->msg("s","pago realizado!");
      else $session->msg("d","Se produjo un error en el pago.");
  }

  redirect($_SESSION['PAGINA_ANTERIOR_2']);

 //end actions

 
?>