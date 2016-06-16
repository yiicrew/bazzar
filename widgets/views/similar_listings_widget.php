<div class="panel panel-default listings-widget listings-widget--similar">
    <div class="panel-heading">
	   <h4 class="listings-widget__heading"><?= t('app', 'Related Listings') ?></h4>
    </div>
    <div class="panel-body">
    	<div class="row">
    	<?php foreach ($listings as $l): ?>
            <div class="listing col-lg-4">
                <div class="thumbnail">
                    <img src="<?= $l->thumbSrc ?>" alt="<?=$l->title?>" />
                    <div class="caption listing__details">
                        <h3 class="listing__title">
                            <?= a($l->title, $l->viewUrl, [
                                'title' => $l->title,
                                'class' => 'listing__link'
                            ]) ?>
                        </h3>
                        <p class="listing__description"><?= e(truncate($l->description)) ?></p>
                        <p class="listing__meta">
                            Posted <?= time_ago($l->created_at) ?>
                        </p>
                    </div>
                </div>
                <!-- /thumbnail -->
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <!-- /panel-body -->
</div>
<!-- /listing-widget -->