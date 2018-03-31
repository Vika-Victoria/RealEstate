<?php

namespace app\modules\main\controllers;
use yii\caching\FileCache;
use frontend\components\Common;
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
        return $this->render('index');
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
