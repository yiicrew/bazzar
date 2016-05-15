<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\modules\admin\models\Listing;

class RecentListingsWidget extends Widget 
{
	public $heading;

    public function run()
    {
		return $this->render('recent_listings_widget', [
			'listings' => Listing::find()->mostRecent()
		]);
    }
}