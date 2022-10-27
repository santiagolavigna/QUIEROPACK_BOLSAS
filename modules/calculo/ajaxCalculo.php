<?php
  $RESULT=array();

  $RESULT['isOK']=true;
  $RESULT['msg']='Algun mensaje para notificar';
  $RESULT['sendData']=$_POST;

  if(isset($_REQUEST["get_impresiones"])){
  
  	$RESULT['RESULT']= find_all('impresion');
  }

  echo json_encode($RESULT);
?>