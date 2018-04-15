<?php

namespace app\modules\main\controllers;
use yii\caching\FileCache;
use frontend\components\Common;
use yii\db\Query;
use yii\web\Controller;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "bootstrap";
//        return $this->render('index');
        $query = new Query();
        $query_advert = $query->from('advert')->orderBy('id desc');
        $command = $query->limit(5);
        $result_general = $command->all();
        $count_general = $command->count();

//        return $this->render('index', ['result_general' => $result_general, 'count_general' => $count_general]);
        $featured = $query_advert->limit(15)->all();
        $recommend_query = $query_advert->where("recommend=1")->limit(5);
        $recommend = $recommend_query->all();
        $recommend_count = $recommend_query->count();

        return $this->render('index', [
            'result_general' => $result_general,
            'count_general' => $count_general,
            'featured' => $featured,
            'recommend' => $recommend,
            'recommend_count' => $recommend_count,
        ]);

    }

    public function actionService()
    {
        $cache = \Yii::$app->cache;
//        $cache = $locator->cache;
        $cache->set("test",1);
       print $cache->get("test");

    }

    public function actionEvent(){

        $component = \Yii::$app->common; //new Common();
        $component->on(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);
        $component->sendMail("test@domain.com","Test","Test text");
        $component->off(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);

    }

}
