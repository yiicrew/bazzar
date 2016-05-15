<h3><?= Yii::t('app', 'Popular Categories') ?></h3>
<div class="category">
<?php foreach ($categories as $category): ?>
	<?= a($category->name, $category->url, [
		'title' => $category->name,
		'class' => 'category__link'
	]) ?>
<?php endforeach ?>
</div>