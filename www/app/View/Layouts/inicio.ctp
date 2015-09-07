<?php
$siteDescription = __d('cake_dev', 'Bisbardas');
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
		<?php  echo $this->element('helpbox'); ?>
	    <?php  echo $this->element('header'); ?>
		<?php echo $this->Session->flash(); ?>
		<div id="bb-body-container">

		<?php  if (isset($message)){ echo $this->element('flash_notification');} ?>	
			<?php echo $this->fetch('content');  // Aqui se incluyen las vistas?>
		</div>   
	</body>
</html>
