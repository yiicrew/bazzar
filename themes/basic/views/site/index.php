<?php
use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
?>
<?= CategoryWidget::widget() ?>
<?= BannerWidget::widget(['position' => '728x90']) ?>
<?= RecentListingsWidget::widget() ?>
<?= BannerWidget::widget(['position' => '728x90']) ?>