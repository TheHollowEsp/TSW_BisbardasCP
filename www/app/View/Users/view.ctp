<!-- File: /app/View/Users/view.ctp -->
<?php echo $this->Session->flash();
$imageAv = 'profiles/' . $user['User']['img'];  
echo $this->Html->para(null, "Usuario: " . $user['User']['username']);
echo $this->Html->image($imageAv, array('alt' => $user['User']['username'],'width' => '256px'));
echo $this->Html->para(null, "ID: " . $user['User']['id']);
echo $this->Html->para(null, "Fecha de registro: " . $user['User']['registered']);
echo $this->Html->para(null, "Email: " . $user['User']['email']);


 if ($user['User']['id'] === $userLogged['id']){ 
    
	echo 'Puedes editar este usuario.';
    echo '<br />';

     echo $this->Form->postLink('Borrar usuario',
     array('controller' => 'users','action' => 'delete',$userLogged['id']
     ));   
        
    echo $this->Form->create('User', array(
    'url' => array('controller' => 'users', 'action' => 'edit',$userLogged['id'] )
));
    echo $this->Form->input('currentPassword', array('type' => 'password', 'required' => true));
    echo $this->Form->input('username', array('disabled' => 'disabled', 'value' => $user['User']['username']));
    echo $this->Form->input('email');
    echo $this->Form->input('newpassword', array('type' => 'password'));
    echo $this->Form->end('Editar');
    } else {echo "No puedes editar este usuario.";} ?>