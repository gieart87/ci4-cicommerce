<ul class="pagination pagination-sm m-0 float-right">
	<?php if ($pager->hasPrevious()) : ?>
		<li class="page-item">
			<a href="<?= $pager->getPrevious() ?>" class="page-link" aria-label="<?= lang('Pager.previous') ?>">
				<span>«</span>
			</a>
		</li>
	<?php endif ?>

	<?php foreach ($pager->links() as $link) : ?>
		<li <?= $link['active'] ? 'class="active page-item"' : 'class="page-item"' ?>>
			<a href="<?= $link['uri'] ?>" class="page-link">
				<?= $link['title'] ?>
			</a>
		</li>
	<?php endforeach ?>

	<?php if ($pager->hasNext()) : ?>
		<li class="page-item">
			<a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="page-link">
				<span aria-hidden="true">»</span>
			</a>
		</li>
	<?php endif ?>
</ul>