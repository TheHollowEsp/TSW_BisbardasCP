//app/View/Users/login.ctp

<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Introduce tu usuario y contraseña'); ?>
            <?php echo __('Ejemplo: hollow // hollow'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<?php
echo $this->Html->link('Registrarse', ['controller' => 'users', 'action' => 'add']); ?>
</div>