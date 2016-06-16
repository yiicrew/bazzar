<?php
/* @var $this yii\web\View */
use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
$this->title = $heading = isset($_GET['category']) ? ucwords($_GET['category']) : 'Result';
?>
<div class="listing-list">
	<h1 class="listing-list__heading"><?= $heading ?></h1>
	<div class="row">
	    <?php foreach ($listings as $l): ?>
	    <div class="listing col-lg-3">
	        <div class="thumbnail">
	            <img src="<?= $l->thumbSrc ?>" alt="<?=$l->title?>" />
	            <div class="caption listing__details">
	                <h3 class="listing__title">
	                    <?= a($l->title, $l->viewUrl, [
	                        'title' => $l->title,
	                        'class' => 'listing__link'
	                    ]) ?>
	                </h3>
	                <p class="listing__description"><?= e(truncate($l->description)) ?></p>
	                <p class="listing__meta">
	                    <?= t('app', 'Added at') ?>: <?= time_ago($l->created_at) ?>
	                </p>
	            </div>
	        </div>
	        <!-- /thumbnail -->
	    </div>
	    <?php endforeach ?>
    </div>
</div>
<!-- /listing-list -->
