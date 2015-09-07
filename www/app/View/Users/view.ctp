<!-- File: /app/View/Users/view.ctp -->
<?php echo $this->Session->flash();
$imageAv = 'profiles/' . $user['User']['img'];
?>  

<!--
 if ($user['User']['id'] === $userLogged['id']){ 
      
        
    echo $this->Form->create('User', array(
    'url' => array('controller' => 'users', 'action' => 'edit',$userLogged['id'] )
));
    
    
    echo $this->Form->input('newpassword', array('type' => 'password'));
    echo $this->Form->end('Editar');
    }else{
        echo $this->Form->postLink(__('Añadir a amigos'),array('controller' => 'friendships','action' => 'add',$user['User']['id'])); //Solicitud de amistad;
    } 
    ?>
    -->

<div class="bb-friend">
    <div class="friend-image">
        <?php echo $this->Html->image($imageAv, array('alt' => $user['User']['username'])); ?>
    </div>
    <div class="friend-body">
        <div class="name">
            <?php   echo $this->Html->para(null, "Usuario: " . $user['User']['username']);
                    echo $this->Html->para(null, "Fecha de registro: " . $user['User']['registered']);
                    echo $this->Html->para(null, "Email: " . $user['User']['email']); 
            ?>
        </div>
        <div class="social">
            <?php if ($user['User']['id'] === $userLogged['id']){ ?>
                    <button onclick="window.location.href='<?php echo Router::url(array('controller' => 'users','action' => 'delete',$user['User']['id']))?>'"><?php echo __('Borrar usuario') ?></button></span>  
            <?php }else{  ?> 
            
            <span class="friend-button">
                <?php echo $this->Form->postLink('Enviar solicitud de amistad',array('controller' => 'friendships','action' => 'add',$user['User']['id']))?></span>              
            <?php } ?> 
        </div>
  </div>
  <div style="clear: both;"></div>
  
</div>
 <?php if ($user['User']['id'] === $userLogged['id']){ ?>
<div class="form-registry">
    <div class="title">
        <?php echo  __('Puedes editar tus datos personales'); ?>
    </div>
    
    <div class="form">
        <?php 
            echo $this->Form->create('User', array(
            'url' => array('controller' => 'users', 'action' => 'edit',$userLogged['id'] ),
            'name' => 'form-registry',
            'inputDefaults' => array(
                'label' => false, // El label lo proporcionamos en un span diferente
                'div' => false // Corta la creacion de divs especificos para cada input
            )
            ));
            ?>
        <div class="form-line">
            <span class="form-line-title"><?php echo __("Nombre de usuario"); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('username', array('disabled' => 'disabled', 'value' => $user['User']['username']));?></span>
        </div>
         <div class="form-line">
            <span class="form-line-title"><?php echo __("Nueva Contraseña"); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('newpassword');?></span>
        </div>
        
        <div class="form-line">
            <span class="form-line-title"><?php echo __("Correo electrónico"); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('email');?></span>
        </div>
        <div class="form-line">
              <span class="form-line-space"></span>
        </div>
        <div class="form-line"><span class="form-line-title">
            <?php echo $this->Form->end(__('Editar')); ?>
            </span> 
        </div></div>
    </div>
</div>
<?php } ?>
