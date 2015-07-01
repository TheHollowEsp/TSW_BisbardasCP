<h2>Ha ocurrido un error inesperado, amigo petanquero.</h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php echo $message; ?>	
</p>
<h3>Si te sientes con ganas, envía un informe a la sección de ayuda.</h3>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
