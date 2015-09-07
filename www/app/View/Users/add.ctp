<!-- app/View/Users/add.ctp -->
<div class="form-registry">
    <div class="title">
        <?php echo  __('Bienvenidos a Bisbardas, la red social para jubilados'); ?>
    </div>
    <div class="info">
        <?php echo  __('Registrate para hacer amigos con los que poder jugar a la petanca'); ?>
    </div>
    <div class="form">
        <?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','name' => 'form-registry',
            'inputDefaults' => array(
                'label' => false, // El label lo proporcionamos en un span diferente
                'div' => false // Corta la creacion de divs especificos para cada input
        ))); ?>
        <div class="form-line">
            <span class="form-line-title"><?php echo __("Nombre de usuario"); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('username');?></span>
        </div>
         <div class="form-line">
            <span class="form-line-title"><?php echo __("Contraseña"); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('password');?></span>
        </div>
        <div class="form-line">
            <span class="form-line-title"><?php echo __("Repite contraseña"); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('password2', array('type' => 'password'));?></span>
        </div>
        <div class="form-line">
            <span class="form-line-title"><?php echo __("Correo electrónico"); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('email');?></span>
        </div>
        <div class="form-line">
              <span class="form-line-space"></span>
        </div>
        <div class="form-line"><?php echo $this->Form->input('upload', array('type'=>'file'));?> </div>
        <div class="form-line"><span class="form-line-title">
            <?php echo $this->Form->end(__('Enviar')); ?>
            </span> 
        </div></div>
    </div>
</div>


