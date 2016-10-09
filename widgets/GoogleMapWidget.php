<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\modules\admin\models\Listing;

class GoogleMapWidget extends Widget 
{
    public $heading = "Google Map";
    public $coordinates = null;
    public $address = null;

    public function run()
    {
        return $this->render('google_map_widget', [
            'heading' => $this->heading,
            'coordinates' => $this->coordinates,
            'address' => $this->address,
            'lang' => Yii::$app->language
        ]);
    }
}