<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class BannerWidget extends Widget 
{
	public $position;

    public function run()
    {
		return $this->render('banner_widget');
    }
}