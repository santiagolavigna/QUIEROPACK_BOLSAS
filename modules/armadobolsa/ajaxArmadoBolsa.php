<?php
  $RESULT=array();

  $RESULT['isOK']=true;
  $RESULT['msg']='Algun mensaje para notificar';
  $RESULT['sendData']=$_POST;
 
  if(isset($_REQUEST["update_dolar_bolsa"])){
  
  	$RESULT['RESULT']= update_dolar_bolsa($RESULT['sendData']['precio_dolar']);
  }
  
  echo json_encode($RESULT);
?>