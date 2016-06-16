<?php
/* @var $this yii\web\View */

use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
use app\widgets\SimilarListingsWidget;
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
				<span class="action__icon glyphicon glyphicon-copy"></span>
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
					<?= e($listing->description) ?>
				</div>
			</div>
			<!-- /listing-view__description -->

			<?php // BannerWidget::widget(['position' => '720x90']) ?>
			<?= SimilarListingsWidget::widget(['listing' => $listing]) ?>
		</div>
		<!-- /listing-view__content -->

		<div class="listing-view__sidebar col-lg-4">
			<div class="clearfix">
				<div class="report pull-right">
		            <a href="#" class="listing-view__report">
		                <span class="glyphicon glyphicon-flag"></span>
		                <span>Report</span>
		            </a>
	            </div>

				<div class="share clearfix">
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

			<div class="panel panel-default">
				<div class="panel-body">

					<div class="user well clearfix">
					<?php if (!empty($listing->user)): ?>
						<div class="user__media pull-left">
							<span class="user__icon glyphicon glyphicon-user"></span>
						</div>
						<div class="user__info pull-left">
							<strong class="user__name"><?= $listing->user ?></strong>
							<time class="user__member-since">
								Member since <?= date('Y', $listing->user->created_at) ?>
							</time>
						</div>
					<?php endif ?>
					</div>

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
				</div>
			</div>

		</div>
		<!-- /listing-view__sidebar -->
	</div>
		
	<?php if (!empty($listing->video)): ?>
	<div class="listing-view__video">
		<?= video_player($video) ?>
	</div>
	<?php endif ?>


	<?php // $this->render('_message_form', ['model' => $contactModal]) ?>
		
		<?php /* if(ENABLE_GOOGLE_MAP && !empty($listing->ad_lat)){?>
			<div class="info_box">
				<div id="gmap_detail" style="width: 245px; height:245px;"></div>
				<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&language=<?=APP_LANG?>"></script>
				<script type="text/javascript">
					var latlng = new google.maps.LatLng(<?=$listing->ad_lat?>);
					var myOptions = {
					  zoom: 16,
					  center: latlng,
					  mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					map = new google.maps.Map(document.getElementById("gmap_detail"), myOptions);
					marker = new google.maps.Marker({
					  map: map,
					  draggable:true,
					  position: latlng
					});
				</script>
			</div>	
		</div>	
		<?} */ ?>

	<div class="listing-view__tags">
		<?php /*
		$tags = Ad::model()->normalizeTags();
		$listing->tags;
		if(!empty($tags)){
			foreach ($tags as $k) {
				$link = Yii::app()->createUrl('ad/index', array('search_string' => stripslashes($k)));
				$tagsArray[] = '<a href="' . $link . '" class="tag_link" title="' . htmlspecialchars(stripslashes($k)) . '">' . stripslashes($k) . '</a>';
			}
			echo join(' ', $tagsArray);
		}
		*/ ?>
	</div>
	<!-- /listing-view__tags -->
</section>
<!-- /listing-view -->