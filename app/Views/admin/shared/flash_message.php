<?php if (!empty($errors)) : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>Whoops!</strong> There are some problems with your input.</p>
		<ul>
			<?php foreach ($errors as $field => $error) : ?>
			<li><?= $error ?></li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>

<?php if (!empty($session->getFlashdata('success'))): ?>
	<div class="alert alert-success">
		<?= $session->getFlashdata('success') ?>
	</div>
<?php endif; ?>

<?php if (!empty($session->getFlashdata('errors'))): ?>
	<div class="alert alert-danger">
		<?= $session->getFlashdata('errors') ?>
	</div>
<?php endif; ?>