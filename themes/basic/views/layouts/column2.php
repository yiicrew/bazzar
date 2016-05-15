<div class="row">
    <section class="content content--narrow">
        <?= $content ?>
    </section>
    <aside class="sidebar sidebar--right">
        <?= FilterWidget::widget() ?>
        <?= HistoryWidget::widget() ?>
        <?= LocationWidget::widget() ?>
        <?= TagsWidget::widget() ?>
    </aside>
</div>