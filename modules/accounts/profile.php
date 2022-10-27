<?php
  $page_title = 'Mi perfil';
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
  <?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    redirect('?p=home',false);
  else:
    $user_p = find_by_id('users',$user_id);
  endif;
?>
<div class="row">
   <div class="col-md-4">
       <div class="panel profile">
         <div class="jumbotron text-center bg-red">
            <img class="img-circle img-size-2" src="uploads/users/<?=$user_p['image']?>" alt="">
           <h3><?php echo first_character($user_p['name']); ?></h3>
         </div>
        <?php if( $user_p['id'] === $user['id']):?>
         <ul class="nav nav-pills nav-stacked">
          <li><a href="?p=accounts|edit_account"> <i class="glyphicon glyphicon-edit"></i> Editar perfil</a></li>
         </ul>
       <?php endif;?>
       </div>
   </div>
</div>
