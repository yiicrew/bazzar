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
		NavBar::begin([
	        'brandLabel' => params('app_name'),
	        'brandUrl' => Yii::$app->homeUrl,
	        'options' => [
	            'class' => 'navbar-fixed-top',
	        ],
	    ]);
	    echo Nav::widget([
	        'options' => ['class' => 'navbar-nav navbar-right'],
	        'items' => [
	            ['label' => 'Register', 'url' => ['/user/register']],
	            Yii::$app->user->isGuest ? (
	                ['label' => 'Login', 'url' => ['/user/login']]
	            ) : (
	                '<li>'
	                . Html::beginForm(['/user/logout'], 'post', ['class' => 'navbar-form'])
	                . Html::submitButton(
	                    'Logout - ' . Yii::$app->user->identity->username,
	                    ['class' => 'btn btn-link']
	                )
	                . Html::endForm()
	                . '</li>'
	            ),
	            ['label' => 'Post an ad', 'url' => ['/post-ad'], 'linkOptions' => ['class' => 'post-ad-btn']],
	        ],
	    ]);
	    /*
	    <form action="<?=Yii::$app->createUrl('listings/search')?>" method="get">
			<input type="text" name="q"/>
			<button type="submit">Search</button>
		</form>
		*/
	    NavBar::end();
	}
}