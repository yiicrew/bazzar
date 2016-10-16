<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\BasicThemeAsset;
use app\widgets\SiteNavWidget;

BasicThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (isset($this->description)): ?>
    <meta name="description" content="<?= e($this->description) ?>">
    <?php endif ?>
    <?php if (isset($this->keywords)): ?>
    <meta name="keywords" content="<?= e($this->keywords) ?>">
    <?php endif ?>
    <meta name="revisit-after" content="1 Days">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="rating" content="general">
    <?php if (!empty($this->og)): ?>
    <meta property="og:title" content="<?= e($this->og['title'])?>">
    <meta property="og:site_name" content="<?= Yii::$app->name ?>">
    <meta property="og:image" content="<?= $this->og['image'] ?>">
    <?php endif ?>

    <?= Html::csrfMetaTags() ?>
    <title><?= isset($this->title) ? e($this->title) : params('appName') ?></title>
    <base href="<?= Yii::$app->request->baseUrl ?>">
    <link href="http://fonts.googleapis.com/css?family=Cuprum&subset=latin,cyrillic" rel="stylesheet" type="text/css">
    <link rel="alternate"  type="application/rss+xml" title="<?= t("app", "Latest Classifieds")?>" href="<?= Yii::$app->request->baseUrl ?>/rss">
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php /*
<body itemscope itemtype="http://schema.org/WebPage">

<?= CategoryUlWidget::widget() ?>
<?= MenuWidget::widget() ?>
<?= PageMenuWidget::widget() ?>
*/ ?>
    <header class="site-header">
        <?= SiteNavWidget::widget() ?>
    </header>
    <!-- /site-header -->

    <div class="container">
        <div class="site-content site-content--spaced">
            <?= $content ?>
        </div>
    </div>
    <!-- /container -->

    <footer class="site-footer">
        <div class="container">
            <div class="pull-lg-left">
                <p>Copyright &copy; <?= params('appName') ?> <?= date('Y') ?></p>
            </div>
            <div class="pull-lg-right">
                <p>Bazzar 0.1</p>
            </div>
        </div>
    </footer>
    <!-- /site-footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>