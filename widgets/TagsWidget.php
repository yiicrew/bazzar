<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\modules\admin\models\Listing;

class TagsWidget extends Widget 
{
    public $heading = "Popular Tags";
    public $tags = [];

    public function run()
    {
        return $this->render('tags_widget', [
            'heading' => $this->heading,
            'tags' => explode(',', $this->tags)
        ]);
    }
}