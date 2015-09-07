<!-- File: /app/View/Posts/add.ctp -->
<div class="form-registry">
    <div class="title">
        <?php echo  __('Publicar un post'); ?>
    </div>
    <div class="info">
        <?php echo  __('Recuerda seguir las normas de la comunidad'); ?>
    </div>
    <?php echo $this->Form->create('Post',array('controller' => 'posts', 'action' => 'add', 'enctype'=>'multipart/form-data','name' => 'form-registry',
            'inputDefaults' => array(
                'label' => false, // El label lo proporcionamos en un span diferente
                'div' => false // Corta la creacion de divs especificos para cada input
        ))); ?>
        <div class="form-line">
            <div class="form-line"><?php echo __('Título:'); ?></span>
            <span class="form-line-input"><?php echo $this->Form->input('title');?></span>
		</div>
        <div class="form-line">
            <span class="form-line-input"><?php echo $this->Form->input('body', array('rows' => '3'));?></span>
		</div>
        <div class="form-line">
           <?php echo $this->Form->input('upload', array('type'=>'file'));?>
		</div>
         <div class="form-line">
            <span class="form-line-title"><?php echo $this->Form->end('Save Post');?></span>
		</div>
