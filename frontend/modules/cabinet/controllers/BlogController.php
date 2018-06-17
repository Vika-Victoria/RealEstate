<?php
/**
 * Created by PhpStorm.
 * User: Viktoriya
 * Date: 12.06.2018
 * Time: 19:26
 */

namespace app\modules\cabinet\controllers;


use common\models\Blogs;
use common\models\BlogsSearch;
use common\models\ImageUpload;
use yii\web\Controller;
use yii\web\UploadedFile;

class BlogController extends Controller
{

    public $layout = "/inner";

    public function actionIndex()
    {
        $searchModel = new BlogsSearch();
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
        $model = new Blogs();
        if ($model->load(\Yii::$app->request->post()) && $model->saveBlogs()) {
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

        if ($model->load(\Yii::$app->request->post()) && $model->saveBlogs()) {
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
        if (($model = Blogs::findOne($id)) !== null) {
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
            $blog = $this->findModel($id);
            $file= UploadedFile::getInstance($model, 'image');

            if ($blog->saveImage($model->uploadFile($file, $blog->image)))
            {
                return $this->redirect(['view', 'id' => $blog->id]);
            }
        }

        return$this->render('image', ['model' => $model]);
    }

}