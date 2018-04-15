<?php
/**
 * Created by PhpStorm.
 * User: Viktoriya
 * Date: 12.04.2018
 * Time: 18:52
 */
namespace frontend\widgets;

use common\models\LoginForm;
use yii\bootstrap\Widget;

class Login extends Widget
{

    public function run()
    {
        $model = new  LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            $controller = \Yii::$app->controller;
            $controller->redirect($controller->goBack());
        }
        return $this->render("login", ['model' => $model]);
    }
}