<?php
/* @var $this yii\web\View */

use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
use app\widgets\SimilarListingsWidget;
use app\widgets\TagsWidget;
use app\widgets\GoogleMapWidget;

$this->title = $listing->title;
$listingUrl = $listing->getViewUrl(true);
?>
<section class="listing-view">
	<header class="listing-view__header well">
		<div class="action pull-right">
			<a href="#" class="action__link">
				<span class="action__icon glyphicon glyphicon-heart-empty"></span>
				Watch
			</a>
			<a href="#" class="action__link">
				<span class="action__icon glyphicon glyphicon-duplicate"></span>
				Post a similar ad
			</a>
		</div>

		<h1 class="listing-view__title"><?= e($listing->title) ?></h1>
		<?php if (!empty($listing->price) && $listing->price > 0): ?>
			<h5 class="listing-view__price">$<?= $listing->price ?> <?= $listing->price_type ?></h5>
		<?php endif ?>
		<?php if ($listing->address): ?>
			<p class="listing-view__address">
				<span class="glyphicon glyphicon-map-marker"></span>
				<?= $listing->address ?>
			</p>
		<?php endif ?>
	</header>

	<div class="row">
		<div class="listing-view__content col-lg-8">
			<div class="gallery">
				<div class="gallery__preview">
					<img class="gallery__image" src="<?= $listing->thumbSrc ?>" alt=""/>
				</div>
				<div class="gallery__thumbs">
				<?php foreach ($listing->images as $image): ?>
					<img class="gallery__thumb" src="<?= $image->thumbSrc ?>" width="120" height="90" />
				<?php endforeach ?>
				</div>
			</div>
			<!-- /gallery -->

			<div class="row">
				<div class="col-lg-6">
					<table class="table attribute-list">
						<tbody>
							<tr>
								<th><?= t('app', 'Category') ?></th>
								<td><?= $listing->category ?></td>
							</tr>
							<tr>
								<th><?= t('app', 'Published') ?></th>
								<td><?= time_ago($listing->created_at) ?></td>
							</tr>
							<?php if (!empty($listing->website_url)): ?>
							<tr>
								<th><?= t('app', 'Web Site') ?></th>
								<td>
									<?= a($listing->website_url, $listing->website_url, [
										'target' => '_blank',
										'rel' => 'nofollow'
									]) ?>
								</td>
							</tr>
							<?php endif ?>
							<?php if (!empty($listing->expiry_date)): ?>
								<tr>
									<th><?= t('app', 'Listing Valid Until')?></th>
									<td><?= $listing->expiry_date ?></td>
								</tr>
							<?php endif ?>
						</tbody>
					</table>
				</div>
				<div class="col-lg-6">
					<table class="table attribute-list">
						<tbody>
							<tr>
								<th><?= t('app', 'Category') ?></th>
								<td><?= $listing->category ?></td>
							</tr>
							<tr>
								<th><?= t('app', 'Published') ?></th>
								<td><?= time_ago($listing->created_at) ?></td>
							</tr>
							<?php if (!empty($listing->website_url)): ?>
							<tr>
								<th><?= t('app', 'Web Site') ?></th>
								<td>
									<?= a($listing->website_url, $listing->website_url, [
										'target' => '_blank',
										'rel' => 'nofollow'
									]) ?>
								</td>
							</tr>
							<?php endif ?>
							<?php if (!empty($listing->expiry_date)): ?>
								<tr>
									<th><?= t('app', 'Listing Valid Until')?></th>
									<td><?= $listing->expiry_date ?></td>
								</tr>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /listing-view__details -->

			<div class="panel panel-default listing-view__description">
				<div class="panel-body">
					<?= nl2br(e($listing->description)) ?>
				</div>
			</div>
			<!-- /listing-view__description -->

			<?php // BannerWidget::widget(['position' => '720x90']) ?>
			<?= SimilarListingsWidget::widget(['listing' => $listing]) ?>
		</div>
		<!-- /listing-view__content -->

		<div class="listing-view__sidebar col-lg-4">
			<div class="clearfix">
				<div class="report pull-sm-right">
		            <a href="#" class="report__link">
		                <span class="report__icon glyphicon glyphicon-flag"></span>
		                <span class="report__label">Report</span>
		            </a>
	            </div>
	            <!-- /report -->

				<div class="share">
					<div class="share__link share__link--facebook">
						<a href="#" target="_blank"><span>Share on Facebook</span></a>
					</div>
					<div class="share__link share__link--twitter">
						<a href="#" target="_blank"><span>Tweet</span></a>
					</div>
					<div class="share__link share__link--google-plus">
						<a href="#"><span>Share on Google+</span></a>
					</div>
					<div class="share__link share__link--pinterest">
						<a href="#"  target="_blank"><span>Pin</span></a>
					</div>
	                <div class="share__link share__link--email">
	                    <a id="ad-share-friend-link" href="#"><span>Share with a friend</span></a>
	                </div>
				</div>
				<!-- /share -->
			</div>

			<br>

			<div class="card card--user">
				<div class="card-block">
					<?php if (!empty($listing->user)): ?>
					<div class="user clearfix">
						<div class="user__media pull-sm-left">
							<span class="user__icon glyphicon glyphicon-user"></span>
						</div>
						<div class="user__info pull-sm-left">
							<strong class="user__name"><?= $listing->user ?></strong>
							<time class="user__member-since">
								Member since <?= date('Y', $listing->user->created_at) ?>
							</time>
						</div>
					</div>
					<!-- /user -->
					<?php endif ?>
					<div class="reply">
						<a href="#" class="btn btn-lg btn-primary u-block">Send Message</a>
						<?php if ($listing->user): ?>
							<a href="#">
								<?= e($listing->user->phone) ?>
							</a>
						<?php endif ?>
						<?php if ($listing->user): ?>
							<a href="skype:<?= $listing->user->skype ?>?chat">
								<?= e($listing->user->skype) ?>
							</a>
						<?php endif ?>
					</div>
					<!-- /reply -->
				</div>
			</div>
			<!-- /card -->

			<div class="safety clearfix">
				<div class="safety__media pull-left">
					<span class="safety__icon glyphicon glyphicon-ok-sign"></span>
				</div>
				<div class="safety__info">
					<p class="safety__tip">
						Always meet the seller face-to-face to inspect and test drive the car. 
					</p>
					<a href="#" class="safety__link">Find more helpful hints here</a>
				</div>
			</div>
			<!-- /safety -->

		</div>
		<!-- /listing-view__sidebar -->
	</div>
		
	<?php if (!empty($listing->video)): ?>
	<div class="listing-view__video">
		<?= video_player($video) ?>
	</div>
	<?php endif ?>

	<?php // $this->render('_message_form', ['model' => $contactModal]) ?>

	<?= GoogleMapWidget::widget([
		'coordinates' => $listing->coordinates,
		'address' => $listing->address
	]) ?>

	<div class="listing-view__tags">
		<?= TagsWidget::widget(['tags' => $listing->tags]) ?>
	</div>
	<!-- /listing-view__tags -->
</section>
<!-- /listing-view -->