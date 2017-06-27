<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\EmailForm;
use app\models\search\EmailSearch;
use yii\web\Response;
use yii\widgets\ActiveForm;

class EmailController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new EmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        Url::remember();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new EmailForm();

        if($model->load(Yii::$app->request->post())){

            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if($model->save()){
                Yii::$app->session->setFlash('response', ['status' => 'success', 'body' => 'New data saved successfully']);
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

}