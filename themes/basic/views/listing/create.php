<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><?= t('app', 'Ad Details') ?></h4>
            </div>
            <div class="panel-body">
                <div>
                    <?= $form->errorSummary($model) ?>
                </div>
                <div class="form-group form-inline">
                    <?= $form->field($model, 'type')->radioList($model->typeOptions) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'title') ?>
                </div>
                <div class="form-group">
                <?= $form->field($model, 'category_id')->dropDownList(
                    ArrayHelper::map(Category::find()->all(), 'id', 'name')
                ) ?> 
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'expiry_date') ?> 
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'description')->textArea([
                        'rows' => 10
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'price') ?>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><?= t('app', 'Pictures') ?></h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?= $form->field($model, 'imageFiles[]')->fileInput([
                        'multiple' => true, 'accept' => 'image/*'
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><?= t('app', 'Contact Details') ?></h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?= $form->field($user, 'email') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($user, 'name') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($user, 'phone') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'is_phone_visible')->checkbox() ?> 
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'address') ?>
                    <a href="#" id="location_find_window">
                        <?=Yii::t('app', 'Find on map')?>
                    </a>
                    <?= $form->field($model, 'lat')->hiddenInput(['id' => 'lat'])->label(false) ?>
                    <p class="hint">
                        Type your address or click on <?= a("Find on map", "#") ?> to select 
                        your address from map.
                    </p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Finishing Up</h4>
            </div>
            <div class="panel-body">
                <p>By posting your ad, you are agreeing to our terms of use and privacy policy.</p>
                <div class="form-group buttons">
                        <?= Html::submitButton($model->isNewRecord ? t('app', 'Post my Ad') : t('admin', 'Save Changes'), [
                        'tabindex' => 19,
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
            </div>
        </div>
	<?php ActiveForm::end() ?>
<?php endif ?>

<script type="text/javascript">
$(document).ready(function(){
	$('#location_find_window').click(function(){
		window.open("<?= url('listing/map')?>", "gmap_window", "menubar=0,resizable=0,width=1000,height=420,status=0,location=0");
		return false;
	});
});
</script>
