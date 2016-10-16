<div class="widget widget--listing-recent">
    <h3 class="widget__heading"><?= t('app', 'Recently Added') ?></h3>
    <div class="widget__content row">
    <?php foreach ($listings as $l): ?>
        <div class="col-sm-3">
            <div class="card card--listing">
                <div class="card-media">
                    <img class="card-img-top" src="<?= $l->thumbSrc ?>" alt="<?= $l->title ?>">
                </div>
                <div class="card-block">
                    <h3 class="card-title">
                        <?= a($l->title, $l->viewUrl, [
                            'title' => $l->title,
                            'class' => 'card-link'
                        ]) ?>
                    </h3>
                    <p class="card-text"><?= e(truncate($l->description)) ?></p>
                    <p class="card-text card-meta">
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