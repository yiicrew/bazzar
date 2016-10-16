<div class="widget widget--category">
	<h3 class="widget__heading"><?= t('app', 'Popular Categories') ?></h3>
	<div class="widget__items row">
	<?php foreach ($categories as $category): ?>
		<div class="col-lg-4 category">
			<?= a($category->name, $category->url, [
				'title' => $category->name,
				'class' => 'category__link category__link--parent'
			]) ?>
			<div class="category__children">
			<?php foreach ($category->children as $child): ?>
				<?= a($child->name, $child->url, [
					'title' => $child->name,
					'class' => 'category__link category__link--child'
				]) ?>
			<?php endforeach ?>
			</div>
		</div>	
	<?php endforeach ?>
	</div>
</div>
<!-- /category-widget -->