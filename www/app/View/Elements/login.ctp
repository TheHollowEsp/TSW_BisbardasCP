<div id="head-login">
	 <?php echo $this->Session->flash('auth'); ?>
	 <?php echo $this->Form->create('User',array('controller' => 'users', 'action' => 'login', 'enctype'=>'multipart/form-data','name' => 'form-registry',
            'inputDefaults' => array(
                'label' => false, // El label lo proporcionamos en un span diferente
                'div' => false // Corta la creacion de divs especificos para cada input
        ))); ?>
    	<div class="form-login">
			<div class="form-login-elem form-login-input" title="Usuario">
				<?php echo $this->Html->image("res/mail_ru.png", array("alt" => "Mail")); ?>
				<?php echo $this->Form->input('username');?>
        	</div>
			<div class="form-login-elem form-login-input" title="Contraseña">
				<?php echo $this->Html->image("res/authenticator.png", array("alt" => "Password")); ?>
				<?php echo $this->Form->input('password'); ?>
			</div>
			<div class="form-login-elem form-login-button">
				<?php echo $this->Form->end(__('Login')); ?>
			</div>
		</div>
	
</div>

