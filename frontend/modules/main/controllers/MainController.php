<?php
namespace app\modules\main\controllers;

use frontend\models\Image;
use frontend\models\SignupForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MainController extends \yii\web\Controller
{
    public $layout = "inner";

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionRegister()
    {
        $model = new SignupForm();//create model

        if(\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if($model->load(\Yii::$app->request->post()) && $model->signup()) {
            print_r($model->getAttributes());
            die();
        };

        return $this->render('register', ['model' => $model]);
    }

    public function actionContact()
    {
        return $this->render('contact');
    }
}
