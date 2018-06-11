<?

namespace frontend\widgets;

use frontend\components\Common;
use common\models\Subscribe;
use yii\bootstrap\Widget;

class SubscribeWidget extends  Widget{

    public function run(){
        $model = new Subscribe();

        if($model->load(\Yii::$app->request->post()) && $model->save()){
            $model = $this->trigger(Subscribe::EVENT_NOTIFICATION_ADMIN);
            \Yii::$app->session->setFlash('message','Success subscribe');
            \Yii::$app->controller->redirect("/frontend/web/");
        }

        return $this->render("subscribe", ['model' => $model]);
    }
}