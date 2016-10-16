<?php
use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
?>
<main class="main">
    <?= CategoryWidget::widget() ?>
    <?= RecentListingsWidget::widget() ?>
    <?= BannerWidget::widget(['position' => '728x90']) ?>
</main>
<!-- /main -->