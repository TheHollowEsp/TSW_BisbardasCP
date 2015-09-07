<div id="bb-head-container">
      <div id="container-title">&nbsp;
        <div id="head-title">
          <?php  echo $this->Html->image("res/title.png", array("alt" => "Bisbardas",'url' => array('controller' => 'posts', 'action' => 'index'))); ?>
        </div>
        
        <div id="head-profile">                          
          <div id="profile-logout">
            <button onclick="window.location.href='<?php echo Router::url(array('controller'=>'users', 'action'=>'logout'))?>'"><?php echo __('Cerrar sesión') ?></button>
          </div>
          <div id="profile-photo">
    			  <?php if ((isset($user['img'])) && (isset($user['id']))) { // Si estas logueado, poner foto y link a tu perfil
                    echo $this->Html->image('profiles/'.$user['img'], array(
                      "alt" => "Tu perfil",
                      'url' => array('controller' => 'users', 'action' => 'view',$user['id'])
                    )); 
             } 
             ?>            
          </div>
        </div>
      </div>
      <div id="container-menu">
        <div id="head-menu">
          <ul>
            <li><?php echo $this->Html->image("res/home.png", array(
                "alt" => "Home",
                'url' => array('controller' => 'posts', 'action' => 'index')
                  )); ?>
            </li>
            
            <li><?php echo $this->Html->image("res/mail_ru.png", array(
                "alt" => "Mensajes",
                'url' => array('controller' => 'friendships', 'action' => 'viewPending',$user['id'])
                  )); ?></li>
            <li><?php echo $this->Html->image("res/users.png", array(
                "alt" => "Home",
                'url' => array('controller' => 'users', 'action' => 'index')
                  )); ?></li>
            
          </ul>
        </div>
        <div id="head-userinfo">
          <span> <?php if (isset($user['username'])){echo __('¡Bienvenido, '.$user['username'].'!'); }  ?></span>
        </div>
      </div>
    </div>