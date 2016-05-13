<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\modules\admin\models\Category;

class CategoryWidget extends Widget 
{
	public $heading;

    public function run()
    {
		return $this->render('category_widget', [
			'heading' => $this->heading,
			'categories' => Category::find()->forHomePage()
		]);
    }
}