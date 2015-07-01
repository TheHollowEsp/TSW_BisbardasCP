<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Registro'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('email');
        echo $this->Form->input('upload', array('type'=>'file'));

		?>
    </fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>