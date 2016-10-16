<section class="main">
    <?= $content ?>
</section>
<!-- /main -->

<aside class="sidebar sidebar--right">
    <?= FilterWidget::widget() ?>
    <?= HistoryWidget::widget() ?>
    <?= LocationWidget::widget() ?>
    <?= TagsWidget::widget() ?>
</aside>
<!-- /aside -->