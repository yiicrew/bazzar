<?php
/* @var $this yii\web\View */
use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
$this->title = $heading = isset($_GET['category']) ? ucwords($_GET['category']) : 'Result';
?>

<div class="row">
	<aside class="sidebar sidebar--left col-lg-3">
		<div class="filter">
			<h3 class="filter__heading">Category</h3>
		</div>
	</aside>
	<!-- /sidebar -->

	<main class="main col-lg-9">
		<div class="listing-group listing-group--listview">
			<h3 class="listing-group__heading"><?= $heading ?></h3>
			<div class="listing-group__body row">
			    <?php foreach ($listings as $l): ?>
			    <div class="col-lg-4">
			        <div class="card card--listing">
			        	<div class="card-media">
			            	<img class="card-img-top" src="<?= $l->thumbSrc ?>" alt="<?= $l->title ?>" />
			            </div>
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
	</main>
	<!-- /main -->
</div>