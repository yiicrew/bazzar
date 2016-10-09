<?php
/* @var $this yii\web\View */
use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
$this->title = $heading = isset($_GET['category']) ? ucwords($_GET['category']) : 'Result';
?>
<div class="listing-group listing-group--listview">
	<h1 class="listing-group__heading"><?= $heading ?></h1>
	<div class="listing-group__body row">
	    <?php foreach ($listings as $l): ?>
	    <div class="col-lg-3">
	        <div class="card card--listing">
	            <img class="card-img-top" src="<?= $l->thumbSrc ?>" alt="<?= $l->title ?>" />
	            <div class="card-block">
	                <h3 class="card-title">
	                    <?= a($l->title, $l->viewUrl, [
	                        'title' => $l->title,
	                        'class' => 'card-link'
	                    ]) ?>
	                </h3>
	                <p class="card-text"><?= e(truncate($l->description)) ?></p>
	                <p class="card-meta">
	                    <?= t('app', 'Added at') ?>: <?= time_ago($l->created_at) ?>
	                </p>
	            </div>
	        </div>
	    </div>
	    <?php endforeach ?>
    </div>
</div>
<!-- /listing-list -->
