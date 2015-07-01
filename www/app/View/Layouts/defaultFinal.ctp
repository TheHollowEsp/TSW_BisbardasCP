<?php
$siteDescription = __d('cake_dev', 'Bisbardas, la red social para jubilados');
$siteVersion = __d('cake_dev', 'Bisbardas 1.0');
?>
<!DOCTYPE html>
<html>
  <head>
   <?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $siteDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  </head>
  <body>
    <div id="bb-head-container">
      <div id="container-title">&nbsp;
        <div id="head-title">
         <?php echo $this->Html->image('title.png', array('alt' => 'Bisbardas')); ?>
        </div>
      </div>      
    </div>
	<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>   
	<?php echo $this->element('sql_dump'); ?>
	
</body>
</html>
