<!--//app/View/Users/login.ctp-->
<div class="form-registry">
    <div class="title">
        <?php echo  __('Bienvenidos a Bisbardas, la red social para jubilados'); ?>
    </div>
    <div class="info">
        <?php echo  __('Loguéate para empezar a compartir tus hazañas de pelota'); ?>
    </div>
	 <?php echo $this->Session->flash('auth'); ?>
	 <?php echo $this->Form->create('User',array('controller' => 'users', 'action' => 'login', 'enctype'=>'multipart/form-data','name' => 'form-registry',
            'inputDefaults' => array(
                'label' => false, // El label lo proporcionamos en un span diferente
                'div' => false // Corta la creacion de divs especificos para cada input
        ))); ?>
    	<div class="form-line">
            <span class="form-line-title"><?php echo $this->Html->image("res/mail_ru.png", array("alt" => "Mail", 'width' => '50px')); ?></span>
			<span class="form-line-input"><?php echo $this->Form->input('username');?></span>
		</div>
        	
		<div class="form-line">
            <span class="form-line-title"><?php echo $this->Html->image("res/authenticator.png", array("alt" => "Password", 'width' => '50px')); ?></span>
			<span class="form-line-input"><?php echo $this->Form->input('password'); ?></span>
		</div>
		<div class="form-line">
            <span class="form-line-title"><?php echo $this->Form->end(__('Login')); ?></span> 
		</div>
</div>
	
