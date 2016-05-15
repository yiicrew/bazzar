<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\SiteNavWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (isset($this->description)): ?>
        <meta name="description" content="<?= e($this->description) ?>" />
    <?php endif ?>
    <?php if (isset($this->keywords)): ?>
        <meta name="keywords" content="<?= e($this->keywords) ?>" />
    <?php endif ?>
    <meta name="revisit-after" content="1 Days" />
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="index,follow" />
    <meta name="rating" content="general" />
    <base href="<?= Yii::$app->request->baseUrl ?>" />
    <?php if (!empty($this->og)): ?>
        <meta property="og:title" content="<?= e($this->og['title'])?>"/>
        <meta property="og:site_name" content="<?= Yii::$app->name ?>"/>
        <meta property="og:image" content="<?= $this->og['image'] ?>"/>
    <?php endif ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= isset($this->title) ? e($this->title) : params('app_name') ?></title>
    <link href='http://fonts.googleapis.com/css?family=Cuprum&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="alternate"  type="application/rss+xml" title="<?=Yii::t('app', 'Latest Classifieds')?>" href="<?= Yii::$app->request->baseUrl ?>/rss" />
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<?php /*

/front/style/style.css

<body itemscope itemtype="http://schema.org/WebPage">

<?= CategoryUlWidget::widget() ?>
<?= MenuWidget::widget() ?>
<?= PageMenuWidget::widget() ?>
<?= a(t('app', 'Contact'), ['site/contact']) ?>
<?= a(t('app', 'Post an Ad'), [ad/publish']) ?>

*/ ?>

<div class="wrap">
    <header class="site-header">
        <?= SiteNavWidget::widget() ?>
    </header>
    <!-- /site-header -->
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="pull-left">
            <p>Copyright &copy; <?= params('app_name') ?> <?= date('Y') ?></p>
        </div>
        <div class="pull-right">
            <p>Bazzar 0.1</p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>