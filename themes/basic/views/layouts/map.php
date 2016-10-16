<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $this->view->pageTitle ?></title>
    <meta name="description" content="<?= $this->view->pageDescription ?>">
    <meta name="keywords" content="<?= $this->view->pageKeywords ?>">
    <meta name="robots" content="index , follow">
    <meta name="googlebot" content="noindex , nofollow">
    <meta name="rating" content="general">
    <base href="<?= Yii::$app->request->baseUrl ?>">
    <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl ?>/css/reset.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl ?>/css/style.css" media="screen, projection">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <?php
    Yii::app()->clientScript->registerScriptFile('http://maps.googleapis.com/maps/api/js?sensor=true&language=' . APP_LANG, CClientScript::POS_END);  
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/front/js/google.map.js', CClientScript::POS_END);
    ?>
    <style>
        html, body { background-image: none; }
    </style>
</head>
<body>
    <?= $content ?>
</body>
</html>