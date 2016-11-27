<div class="widget widget--listing-related">
    <h3 class="widget__heading"><?= t('app', 'Related Listings') ?></h3>
    <div class="widget__content row">
    <?php foreach ($listings as $l): ?>
        <div class="col-sm-4">
            <div class="card listing">
                <div class="listing__media">
                    <img class="listing__image" src="<?= $l->thumbSrc ?>" alt="<?= $l->title ?>">
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
                        <small class="text-muted"><?= t('app', 'Posted') ?>: <?= time_ago($l->created_at) ?></small>
                    </p>
                </div>
            </div>
            <!-- /thumbnail -->
        </div>
    <?php endforeach ?>
    </div>
</div>
<!-- /listings-widget -->