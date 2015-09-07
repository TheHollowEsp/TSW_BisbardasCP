<?php
$siteDescription = __d('cake_dev', 'Bisbardas');
$siteVersion = __d('cake_dev', 'Bisbardas 1.0');
$user = $this->Session->read('UserInfo');
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
	    <?php  echo $this->element('headerLogged', array('user' => $user)); ?>		
		<div id="bb-body-container">
		<?php  if (isset($message)){ echo $this->element('flash_notification', array('message' => $message));} ?>	
			<?php echo $this->fetch('content');  // Aqui se incluyen las vistas?>
		</div>   
	</body>
</html>
