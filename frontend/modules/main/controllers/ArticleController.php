<?php

namespace app\modules\main\controllers;

use common\models\Blogs;
use yii\web\Controller;

class ArticleController extends Controller
{
    public $layout = "/inner";

    public function actionIndex()
    {
        $data = Blogs::getAll(5);

        return $this->render('index', compact('data'));


    }
}
