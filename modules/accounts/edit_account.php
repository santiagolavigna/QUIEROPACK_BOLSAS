<?php
  $page_title = 'Editar Cuenta';
   page_require_level(3);
?>
<?php
//update user image
  if(isset($_POST['submit'])) {
    $photo = new Media();
    $user_id = (int)$_POST['user_id'];
    $photo->upload($_FILES['file_upload']);
    if($photo->process_user($user_id)){
      $session->msg('s','La foto fue subida al servidor.');
    } else{
      $session->msg('d',join($photo->errors));
    }
    redirect($thisPage);
  }
?>
<?php
 //update user other info
  if(isset($_POST['update'])){
    $req_fields = array('name','username' );
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$_SESSION['user_id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
       $porcentaje = remove_junk($db->escape($_POST['porcentaje']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}', porcentaje='{$porcentaje}' WHERE id='{$id}'";
    $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cuenta actualizada. ");
          } else {
            $session->msg('d',' Lo siento, actualización falló.');
          }
    } else {
      $session->msg("d", $errors);      
    }
    redirect($thisPage);
  }
?>
<div class="row">
  <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading clearfix">
            <span class="glyphicon glyphicon-camera"></span>
            <span>Cambiar mi foto</span>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img class="img-circle img-size-2" src="uploads/users/<?php echo $user['image'];?>" alt="">
            </div>
            <div class="col-md-8">
              <form class="form" action="<?=$thisPage?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="file_upload" multiple="multiple" class="btn btn-default btn-file"/>
              </div>
              <div class="form-group">
                <input type="hidden" name="user_id" value="<?=$user['id']?>">
                 <button type="submit" name="submit" class="btn btn-warning">Cambiar</button>
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <span class="glyphicon glyphicon-edit"></span>
        <span>Editar mi cuenta</span>
      </div>
      <div class="panel-body">
          <form method="post" action="<?=$thisPage?>&id=<?=(int)$user['id']?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Nombres</label>
                  <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($user['name'])); ?>">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">Usuario</label>
                  <input type="text" class="form-control" name="username" value="<?=remove_junk(ucwords($user['username']))?>">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">Porcentaje</label>
                  <input type="text" class="form-control" name="porcentaje" value="<?=remove_junk(ucwords($user['porcentaje']))?>">
            </div>
            <div class="form-group clearfix">
                    <a href="?p=accounts|change_password" title="change password" class="btn btn-danger pull-right">Cambiar contraseña</a>
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
