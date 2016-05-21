<?php

namespace app\controllers;

use app\models\PostAdForm;
use app\models\ContactForm;
use app\models\User;
use app\modules\admin\models\Listing;

class ListingController extends \yii\web\Controller
{
    public function actionCreate()
    {
    	$model = new PostAdForm;
        $user = new User;
        return $this->render('create', [
        	'model' => $model,
            'user' => $user
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

    public function actionView($id, $slug)
    {
        $listing = Listing::findOne($id);
        $contactModal = new ContactForm;
        return $this->render('view', [
            'listing' => $listing,
            'contactModal' => $contactModal
        ]);
    }

}
