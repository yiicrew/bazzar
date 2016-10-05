<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

class SiteNavWidget extends Widget {

	public function run()
	{
		$items = [
            ['label' => 'Register', 'url' => ['/user/register']],
            $this->getUserLink(),
            ['label' => 'Post an ad', 'url' => ['/post-ad'], 'linkOptions' => ['class' => 'btn btn--post-ad']],
        ];

		NavBar::begin([
	        'brandLabel' => params('app_name'),
	        'brandUrl' => Yii::$app->homeUrl,
	        'options' => [
	            'class' => 'navbar-fixed-top',
	        ],
	    ]);
	    echo Nav::widget([
	        'options' => ['class' => 'navbar-nav pull-lg-right'],
	        'items' => $items,
	    ]);
	    /*
	    <form action="<?=Yii::$app->createUrl('listings/search')?>" method="get">
			<input type="text" name="q"/>
			<button type="submit">Search</button>
		</form>
		*/
	    NavBar::end();
	}

	public function getUserLink()
	{
		if (Yii::$app->user->isGuest) {
	        return ['label' => 'Login', 'url' => ['/user/login']];
	    } else {
            return '<li>'
            . Html::beginForm(['/user/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton('Logout - ' . Yii::$app->user->identity->username, ['class' => 'btn btn-link'])
            . Html::endForm()
            . '</li>';
	    };
	}
}