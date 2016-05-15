<h3><?= Yii::t('app', 'Recently Added') ?></h3>
<div style="margin-bottom: 10px;">
	<?php foreach ($listings as $k): ?>
		<?php
		$adUrl = Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k->ad_title) ), 'id' => $k->ad_id));
		$alt = htmlspecialchars(stripslashes($k->ad_title));
		?>
	    <div class="classified_list_container">
	        <div class="classified_list_pic"><a href="<?=$adUrl?>" title="<?=$alt?>"><img src="<?=$k->getSmallPic( $k->ad_pic )?>" width="120" height="90" alt="<?=$alt?>" /></a></div>
	        <div class="classified_list_description">
	            <a href="<?=$adUrl?>" title="<?=$alt?>"><?=stripslashes($k->ad_title)?></a>
	            <p><?=DCUtil::getShortDescription( stripslashes($k->ad_description) )?></p>
	            <p class="info"><?=Yii::t('common', 'Location')?> : <b><?=$k->location->location_name?></b> | <?=Yii::t('common', 'Category')?> : <b><?=$k->category->category_title?></b> | <?=Yii::t('common', 'Publish date')?> : <b><?=$k->ad_publish_date?></b></p>
	        </div>
	        <div class="clear"></div>
	    </div>
	<?php endforeach ?>
</div>