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
            <div class="listing-group__content row">
                <?php foreach ($listings as $l): ?>
                <div class="col-lg-4">
                    <div class="card listing">
                        <div class="listing__media">
                            <img class="listing__image" src="<?= $l->thumbSrc ?>" alt="<?= $l->title ?>" />
                        </div>
                        <div class="card-block">
                            <h3 class="listing__title">
                                <?= a($l->title, $l->viewUrl, [
                                    'title' => $l->title,
                                    'class' => 'listing__link'
                                ]) ?>
                            </h3>
                            <p class="card-text"><?= e(truncate($l->description)) ?></p>
                            <p class="card-text listing__meta">
                                <small class="text-muted">
                                    <?= t('app', 'Added at') ?>: <?= time_ago($l->created_at) ?>
                                </small>
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