<div class="listings-widget listings-widget--recent">
    <h3 class="listings-widget__heading"><?= t('app', 'Recently Added') ?></h3>
    <div class="row">
    <?php foreach ($listings as $l): ?>
        <div class="listing col-lg-3">
            <div class="thumbnail">
                <img src="<?= $l->thumbSrc ?>" alt="<?= $l->title ?>" />
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
<!-- /listings-widget -->