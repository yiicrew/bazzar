<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\modules\admin\models\Category;

$this->title = 'Post an ad';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="publish__heading">
	<?= t('app', 'Post an Ad')?>
</h1>
<?php if (Yii::$app->session->hasFlash('success')): ?>
	<div class="alert">
		<?= t('app', 'Your Classified is published.') ?>
	</div>
<?php else: ?>
	<?php $form = ActiveForm::begin([
		'id' => 'listing-form',
		'options' => [
			'name' => 'ad-form',
			'enctype' => 'multipart/form-data'
		]
	]) ?>

	<div class="form-group">
		<?= $form->field($model, 'title') ?>
		<a href="#" class="publish__hint" title="<?= t('app', 'Enter the title of your classified')?>">[?]</a>
	</div>

	<div class="form-group">
		<?= $form->field($model, 'type')->radioList(['Sale', 'Rent']) ?>
		<a href="#" class="thelp" title="<?= t('app', 'Select type for your classified') ?>">[?]</a>
	</div>

	<div class="form-group">
		<?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?> 
		<a href="#" class="publish__hint" title="<?= t('app', 'Please select category for your classified') ?>">[?]</a>
	</div>
	
	<div class="form-group">
		<?= $form->field($model, 'expiry_date') ?> 
		<a href="#" class="publish__hint" title="<?= t('app', 'Please select how long your classified will be active')?>">[?]</a>
	</div>
	
	<div class="publish_label_conatiner">
		<?= $form->field($model, 'description')->textArea() ?>
		<a href="#" class="publish__hint" title="<?= t('app', 'Enter description for your classified')?>">[?]</a><?}?>
	</div>

	<div class="form-group">
		<?= $form->field($model, 'price') ?> <?= '$' // Display Currency Symbol ?>
		<a href="#" class="publish__hint" title="<?= t('app', 'Enter price for your classified.') ?>">[?]</a>
	</div>

	<div class="form-group">
		<?= $form->field($model, 'is_phone_visible')->checkbox() ?> 
		<a href="#" class="thelp" title="<?= t('app', 'its okay show my phone number on the listing') ?>">[?]</a>
	</div>

<?php /*	

	<div class="publish_section_header"><h2><?=Yii::t('app', 'Contact')?></h2></div>
	<div>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_email', array('label' => Yii::t('app', 'E-Mail'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=Yii::t('app', 'Enter contact mail for your classified. The mail will not be visible to other users.')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_email',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 8)); ?>
			<?php echo $form->error($model,'ad_email'); ?>
		</div>
	
		
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_puslisher_name', array('label' => Yii::t('app', 'Contact Name'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=Yii::t('app', 'Enter Contact Name')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_puslisher_name',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 9)); ?>
			<?php echo $form->error($model,'ad_puslisher_name'); ?>
		</div>
		
		
		<div class="clear"></div>
	</div>	
	
	<div>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_phone', array('label' => Yii::t('app', 'Phone'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=Yii::t('app', 'Enter phone')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_phone',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 10)); ?>
			<?php echo $form->error($model,'ad_phone'); ?>
		</div>
		
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_skype', array('label' => Yii::t('admin_v2', 'Skype'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=Yii::t('app', 'Enter skype')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_skype',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 11)); ?>
			<?php echo $form->error($model,'ad_skype'); ?>
		</div>
		<div class="clear"></div>
	</div>

	<div class="last_row_in_publish_section">
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'location_id', array('label' => Yii::t('app', 'Location'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=Yii::t('app', 'Select Region for your classified')?>">[?]</a><?}?>
			</div>
			<?php echo $form->dropDownList($model,'location_id', $this->view->cityList, array('encode' => false, 'prompt' => Yii::t('app', 'Select Location'), 'class' => 'publish_select', 'style' => 'width:350px;', 'tabindex' => 12)); ?>
			<?php echo $form->error($model,'location_id');?>
		</div>
		<div class="clear"></div>
		<div class="publish_left_row" style="width: 530px;">
			<div class="publish_label_conatiner">
			<?
				$address_tipsy_message = htmlentities(Yii::t('app', 'Type address for your classified, or click on "Find on map" to select your address from map.'), ENT_COMPAT, 'utf-8');
				if(!ENABLE_GOOGLE_MAP){
					$address_tipsy_message = Yii::t('app', 'Type address for your classified');
				}
			?>
			<?php echo $form->labelEx($model,'ad_address'); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=$address_tipsy_message?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_address',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:500px;', 'id' => 'address', 'tabindex' => 13)); ?>
			<?php echo $form->error($model,'ad_address', array('inputID' => 'address')); ?>
		</div>
		<?if(ENABLE_GOOGLE_MAP){?>
		<div class="publish_left_row" style="width:150px;">
			<div style="margin-left:20px; margin-top:20px;">
				<input type="button" name="location_find_window" id="location_find_window" value="<?=Yii::t('app', 'Find on map')?>" , tabindex="14">
				<?php echo $form->hiddenField($model,'ad_lat',array('id' => 'lat')); ?>
			</div>
		</div>
		<?}?>
		<div class="clear"></div>
	</div>
	
	<?if(ENABLE_VIDEO_LINK_PUBLISH || ENABLE_LINK_PUBLISH){?>
	
	<div class="publish_section_header"><h2><?=Yii::t('app', 'Additional information')?></h2></div>
	
	<div class="last_row_in_publish_section">
		<?if(ENABLE_LINK_PUBLISH){?>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_link', array('label' => Yii::t('app', 'Web Site'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=Yii::t('app', 'Enter website url in this format : http://www.site.com')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_link',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 15)); ?>
			<?php echo $form->error($model,'ad_link'); ?>
		</div>
		<?}?>
		
		<?if(ENABLE_VIDEO_LINK_PUBLISH){?>
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_video', array('label' => Yii::t('app', 'Video'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="#" class="thelp" title="<?=Yii::t('app', 'Paste YouTube, Vimeo, etc. video embed code here.')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_video',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 16)); ?>
			<?php echo $form->error($model,'ad_video'); ?>
		</div>
		<?}?>
		<div class="clear"></div>
	</div>
	
	<?}?>

	
	
*/ ?>
	<div class="form-group">
		<?= $form->field($model, 'images')->fileInput() ?>
		<?php /* ->widget('MultiFileUpload', [
            'model'		=> $model,
            'attribute'	=> 'images',
            'accept' 	=> 'gif|jpg|png', 
            'max'		=> 5,
            'duplicate' => 'Duplicate file!', 
            'denied' 	=> 'Invalid file type',
            'htmlOptions' => array('tabindex' => 17)
        ]) this could be added later */ ?>
		<div class="publish__hint">
			<?= t('app', 'Select up to 5 photos to attach to your classified. The photos must be in gif, jpg or png format and no bigger than 200kb.')?>			
		</div>
	</div>

	<div class="form-group">
		<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>
	</div>

	<div class="form-group buttons">
		<?= Html::submitButton($model->isNewRecord ? t('app', 'Post Ad') : t('admin', 'Save Changes'), [
			'tabindex' => 19,
			'class' => 'btn btn-primary'
		]) ?>
	</div>
	<?php ActiveForm::end() ?>
<?php endif ?>
<?php 
if (defined('ENABLE_VISUAL_EDITOR')) {
	Yii::$app->clientScript->registerScriptFile(base_url() . '/assets/js/ckeditor/ckeditor.js');
	Yii::$app->clientScript->registerScriptFile(base_url() . '/assets/js/publish.js');
}
if (defined('ENABLE_TIPSY_PUBLISH')) {
	Yii::app()->clientScript
		->registerScriptFile(base_url() . '/assets/js/tipsy/jquery.tipsy.js', CClientScript::POS_END)
		->registerCssFile(base_url() . '/assets/js/tipsy/tipsy.css', 'screen'); 
} 
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#location_find_window').click(function(){
		window.open("<?= url('listing/map')?>", "gmap_window", "menubar=0,resizable=0,width=1000,height=420,status=0,location=0");
		return false;
	});
    $('a.publish__hint').tipsy({
    	trigger: 'hover', 
    	gravity: 's', 
    	fade: true, 
    	html: true, 
    	title: 'title'
   	});
});
</script>