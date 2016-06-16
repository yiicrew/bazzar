<?php

namespace app\controllers;

use Yii;
use app\models\PostAdForm;
use app\models\ContactForm;
use app\models\User;
use app\modules\admin\models\Listing;
use yii\web\UploadedFile;

class ListingController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new PostAdForm;
        $user = new User;
        $request = Yii::$app->request;

        if ($model->load($request->post()) && $user->load($request->post())) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $model->attachUser($user);

            if ($model->uploadAndSave()) {
                Yii::$app->session->setFlash('success', 'Your listing has been created!');
            }
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user
        ]);
    }

    public function actionIndex($category = null, $id = null)
    {
        $listings = Listing::find()->where(['category_id' => $id])->all();

        return $this->render('index', [
            'listings' => $listings
        ]);
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
