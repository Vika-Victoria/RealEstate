<?php

namespace app\modules\main\controllers;

use common\models\Blogs;
use yii\web\Controller;
use yii\data\Pagination;

class ArticleController extends Controller
{
    public $layout = "/inner";

    public function actionIndex()
    {
        $data = Blogs::getAll();

        $popular = Blogs::getPopular();
        $recent = Blogs::getRecent();
        $commented = Blogs::getCommented();

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular' => $popular,
            'recent' => $recent,
            'commented' => $commented,
        ]);
    }

    public function actionView($id)
    {
       $article = Blogs::findOne($id);

        $popular = Blogs::getPopular();
        $recent = Blogs::getRecent();
        $commented = Blogs::getCommented();

        return $this->render('view', [
            'article' => $article,
            'popular' => $popular,
            'recent' => $recent,
            'commented' => $commented,
        ]);
    }
}
