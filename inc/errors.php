<?php  if (count($errors) > 0) : ?>
		<?php foreach ($errors as $error) : ?>
			<div id="errors" class="alert alert-danger" role="alert"><?php echo $error ?></div>
		<?php endforeach ?>
<?php  endif ?>
