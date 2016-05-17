<?php
/* @var $this yii\web\View */

use app\widgets\CategoryWidget;
use app\widgets\RecentListingsWidget;
use app\widgets\BannerWidget;
use app\widgets\SimilarListingsWidget;
$listingUrl = $listing->getViewUrl(true);
?>
<section id="listing-view">
	<h1><?= e($listing->title) ?></h1>
	<div class="share-widget">
		<div class="share-widget__link" style="float:left;">
			<g:plusone></g:plusone>
        </div>
        <div class="share-widget__link" style="float:left; height:24px;">
			<div class="fb-like" data-href="<?= $listingUrl ?>" data-send="true" data-width="450" data-show-faces="true"></div>
        </div>
        <div class="share-widget__link" style="float:left;">
			<a href="http://pinterest.com/pin/create/button/" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
        </div>
	</div>
	
	<div class="listing-view__description">
		<?= e($listing->description) ?>
	</div>
	
	<div class="listing-view__gallery">
	<?php if ($listing->hasImages()): ?>
		<?php foreach ($images as $image): ?>
			<a href="<?= $image->url ?>">
				<img src="<?= $image->thumbSrc ?>" width="120" height="90" />
			</a>
		<?php endforeach ?>
	<?php else: ?>
		<p>No images available for thie listing.</p>
	<?php endif ?>
	</div>
	<!-- /listing-view__gallery -->
		
	<?php if (!empty($listing->video)): ?>
	<div class="listing-view__video">
		<?= video_player($video) ?>
	</div>
	<?php endif ?>
	
	<div class="listing-view__meta" style="line-height: 18px; font-size: 12px;">
		<?php if ($listing->type): ?>
			<?= t('app', 'Listing Type') ?> : <b><?= t('app', $listing->type) ?></b><br />
		<?php endif ?>
		<?= t('app', 'Category')?> : <b><?= $listing->category?></b><br />
		<?= t('app', 'Published')?> : <b><?= time_ago($listing->created_at) ?></b><br />
		<?php if (!empty($listing->expiry_date)): ?>
			<?= t('app', 'Listing Valid Until')?> : <b><?= $listing->expiry_date ?></b><br />
		<?php endif ?>
		<?php if (!empty($listing->price) && $listing->price > 0): ?>
			<?= t('app', 'Price') ?>: <b>$<?= $listing->price ?></b><br />
		<?php endif ?>
		<?php if (!empty($listing->website_url)): ?>
			<?= t('app', 'Web Site')?>: <?= a($listing->website_url, $listing->website_url, [
					'target' => '_blank',
					'rel' => 'nofollow'
				]) ?>
			<br />
		<?php endif ?>
		<?php if (!empty($listing->user)): ?>
			<?= t('app', 'Contact Name')?> : <b><?= $listing->user ?></b><br />
		<?php endif ?>
		<?php if ($listing->user): ?>
			<?= t('app', 'Phone') ?>: <b><?= e($listing->phone) ?></b><br />
		<?php endif ?>
		<?php if ($listing->user): ?>
			Skype: <a href="skype:<?=$listing->skype?>?chat"><?= e($listing->skype) ?></a><br />
		<?php endif ?>
		<?php if ($listing->location): ?>
			<?= t('app', 'Location')?> : <b><?= $listing->location ?></b><br />
		<?php endif ?>
		<?php if ($listing->address): ?>
			<?= t('app', 'Adress')?> : <b><?= $listing->address ?></b><br />
		<?php endif ?>
	</div>
		
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
		<?} */ ?>
	</div>	
	<div class="clear"></div>

	<div style="margin-bottom: 10px;">
		<?php /*
		$tags = Ad::model()->normalizeTags($listing->ad_tags);
		if(!empty($tags)){
			foreach ($tags as $k){
				$link = Yii::app()->createUrl('ad/index', array('search_string' => stripslashes($k)));
				$tagsArray[] = '<a href="' . $link . '" class="tag_link" title="' . htmlspecialchars(stripslashes($k)) . '">' . stripslashes($k) . '</a>';
			}
			echo join(' ', $tagsArray);
		}
		*/ ?>
		<div class="clear"></div>
	</div>

	<?= BannerWidget::widget(['position' => '720x90']) ?>
<?php /* 
<div class="message-form">
	<div class="box_title" style="font-weight:normal;">
		<h2 style="margin-bottom:0px;"><?=Yii::t('detail_page', 'Contact')?></h2>
	</div>	
	<div class="box_content" style="padding-top:15px;">
		<div style="margin-bottom:10px;">
			<?if($this->view->showContactForm){?>
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'ad-contact-form',
					'enableAjaxValidation'=>false,
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					
					'htmlOptions'=>array(
						'name'=>'ad-contact-form',
					),
				)); ?>
				
				<div>
					<div class="row" style="float:left; width:350px;">
						<div class="publish_label_conatiner">
						<?php echo $form->labelEx($this->view->adContactModel,'message'); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('detail_page_v2', 'Enter your question here')?>">[?]</a><?}?>
						</div>
						<?php echo $form->textArea($this->view->adContactModel,'message',array('rows'=>13, 'cols'=>30, 'class' => 'publish_input', 'style' => 'width:338px;', 'tabindex' => 1)); ?>
						<?php echo $form->error($this->view->adContactModel,'message'); ?>
					</div>
				
				
					<div class="publish_left_row" style="width:350px; margin-left:20px;">
						<div style="margin-bottom:12px;">
							<div class="publish_label_conatiner">
							<?php echo $form->labelEx($this->view->adContactModel,'email');?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('detail_page_v2', 'Enter your mail here')?>">[?]</a><?}?>
							</div>
							<?php echo $form->textField($this->view->adContactModel,'email',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:338px;', 'tabindex' => 2)); ?>
							<?php echo $form->error($this->view->adContactModel,'email'); ?>
						</div>	
						<div>
							<div style="margin-bottom:10px;">
								<?php if(CCaptcha::checkRequirements()): ?>
								<div class="publish_left_row">
									<div>
										<?php $this->widget('CCaptcha', array('showRefreshButton' => false, 'clickableImage' => true, 'imageOptions' => array('style' => 'cursor:pointer;'))); ?>
									</div>
									<div>
										<?php echo $form->textField($this->view->adContactModel,'verifyCode', array('class' => 'publish_input', 'style' => 'width:150px;', 'tabindex' => 3)); ?>
									</div>
									<?php echo $form->error($this->view->adContactModel,'verifyCode'); ?>
								</div>
								<div class="publish_left_row">
									<?=Yii::t('app', 'Please enter the letters')?>	
								</div>
								<div class="clear"></div>
								<?php endif; ?>
							</div>
						</div>
						<div class="row buttons">
							<?php echo CHtml::submitButton(Yii::t('detail_page', 'Send'), array('tabindex' => 4)); ?>
						</div>
					</div>
					
					
					<div class="clear"></div>
				</div>
				<?php $this->endWidget();?>
			<?} else {?>
				<div class="publish_info">
					<b><?=Yii::t('detail_page', 'Your Message was send.')?></b>
					<?=DCUtil::genRefresh(3, Yii::app()->createUrl('ad/detail', array('title' => DCUtil::getSeoTitle(stripslashes($listing->ad_title)), 'id' => $listing->ad_id)))?>
					<script type="text/javascript">
						$(document).ready(function(){
						   var $target = $('#contact_form_anchor');
						   $target = $target.length && $target;
						   if ($target.length) {
						  		var targetOffset = $target.offset().top;
						  		$('html,body').animate({scrollTop: targetOffset}, 2000);
						   }
						});
					</script>
				</div>	
			<?}?>
		</div>
	</div>
</div>
<!-- /message-form -->
*/ ?>
<?= SimilarListingsWidget::widget(['listing' => $listing]) ?>
</section>


<div id="fb-root" style="display:none;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>