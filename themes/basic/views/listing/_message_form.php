<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<div class="send-message">
	<?php if (Yii::$app->session->hasFlash('message')): ?>
		<h2 class="send-message__heading"><?= t('app', 'Thank you!') ?></h2>
		<p class="alert alert-success"><?= Yii::$app->session->getFlash('message') ?></p>
	<?php else: ?>
		<h2 class="send-message__heading"><?= t('app', 'Contact') ?></h2>
		<?php $form=ActiveForm::begin([
			'id' => 'message-form',
			'options' => [
				'class' => 'send-message__form'
			]
		]); ?>
				
			<div class="form-group">
				<?= $form->field($model, 'body')->textArea() ?> 
				<a href="#" class="form__hint" title="<?= t('app', 'Enter your question here') ?>">[?]</a>
			</div>
				
			<div class="form-group">
				<?= $form->field($model, 'email') ?>
				<a href="#" class="thelp" title="<?= t('app', 'Enter your mail here') ?>">[?]</a>
			</div>	

			<div class="form-group">
				<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
					'imageOptions' => ['style' => 'cursor:pointer;']
				]) ?>
			</div>

			<div class="form-group buttons">
				<?= Html::submitButton('Send Message', ['class' => 'btn btn-primary', 'tabindex' => 4]); ?>
			</div>
		<?php ActiveForm::end() ?>
	<?php endif ?>
</div>
<!-- /send-message -->