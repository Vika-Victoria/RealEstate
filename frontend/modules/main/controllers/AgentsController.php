<?php
/**
 * Created by PhpStorm.
 * User: Viktoriya
 * Date: 17.06.2018
 * Time: 18:35
 */

namespace app\modules\main\controllers;


use common\models\Agent;
use yii\web\Controller;

class AgentsController extends Controller
{
    public $layout = "/inner";


    public function actionIndex()
    {
        $data = Agent::getAgent();

        return $this->render('index', [
            'agents' => $data['agents'],
            'pagination' => $data['pagination'],
        ]);
    }

}