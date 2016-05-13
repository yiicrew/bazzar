<?php
use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
?>
<?= CategoryWidget::widget() ?>

<div style="width:728px; height:90px; margin:20px 0px;">
	<?= $this->render('@app/views/banners/banner_728x90') ?>
</div>

<?= RecentListingsWidget::widget() ?>

<div style="width:728px; height:90px; margin:20px 0px;">
	<?= $this->render('@app/views/banners/banner_728x90') ?>
</div>