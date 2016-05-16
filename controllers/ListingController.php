<?php

namespace app\controllers;

use app\models\PostAdForm;

class ListingController extends \yii\web\Controller
{
    public function actionCreate()
    {
    	$model = new PostAdForm;
        return $this->render('create', [
        	'model' => $model
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
