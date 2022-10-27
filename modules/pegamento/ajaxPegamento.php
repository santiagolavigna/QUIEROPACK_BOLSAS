<?php
  $RESULT=array();

  $RESULT['isOK']=true;
  $RESULT['msg']='Algun mensaje para notificar';
  $RESULT['sendData']=$_POST;

  if(isset($_REQUEST["update_dolar"])){
  
  	$RESULT['RESULT']= update_dolar($RESULT['sendData']['precio_dolar']);
  }
  
  if(isset($_REQUEST["update_kg"])){
  
  	$RESULT['RESULT']= update_kg($RESULT['sendData']['precio_kg']);
  }

  echo json_encode($RESULT);
?>