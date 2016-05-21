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
<div class="listing-delete">
<?php if (Yii::$app->session->hasFlash('message')): ?>
	<div class="alert alert-success listing-delete__alert">
		<?= t('app', 'Your listing was deleted!')?>
	</div>
	<?= http_refresh(3, url('site/index')) ?>
<?php else: ?>
	<?php $form=ActiveForm::begin([
		'id' => 'listing-delete__form',
		'htmlOptions' => [
			'class' => 'listing-delete__form'
		]
	]) ?>
		<div class="form-group">
			<?= $form->field($model, 'code') ?> 
			<a href="#" class="form__hint" title="<?= t('app', 'Delete code that you have recived by e-mail') ?>">[?]</a>
		</div>
		<div class="form-group">
			<?php $this->field($model, 'verifyCode') ?>
		</div>
		<div class="form-group buttons">
			<?= Html::submitButton(t('app', 'Delete'), ['tabindex' => 3]) ?>
		</div>
	<?= ActiveForm::end() ?>
<?php endif ?>
</div>
<!-- /listing-delete -->