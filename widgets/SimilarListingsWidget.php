<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Listing;

class SimilarListingsWidget extends Widget 
{
	public $listing;

	public function run()
	{
		$listings = Listing::find()->all();
		return $this->render('similar_listings_widget', [
			'listings' => $listings
		]);
	}
}