<?php
/**
 * Created by PhpStorm.
 * User: Viktoriya
 * Date: 17.06.2018
 * Time: 16:52
 */

namespace app\modules\cabinet\controllers;


use common\models\Agent;
use common\models\AgentSearch;
use yii\web\Controller;
use common\models\ImageUpload;
use yii\web\UploadedFile;

class AgentController extends Controller
{
    public $layout = "/inner";

    public function actionIndex()
    {
        $searchModel = new AgentSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Agent();
        if ($model->load(\Yii::$app->request->post()) && $model->saveAgent()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post()) && $model->saveAgent()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Agent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload();

        if (\Yii::$app->request->isPost)
        {
            $agent = $this->findModel($id);
            $file= UploadedFile::getInstance($model, 'image');

            if ($agent->saveImage($model->uploadFile($file, $agent->image)))
            {
                return $this->redirect(['view', 'id' => $agent->id]);
            }
        }

        return$this->render('image', ['model' => $model]);
    }




}