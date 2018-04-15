<?
namespace frontend\components;

use yii\base\Component;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;

class Common extends Component{

    const EVENT_NOTIFY = 'notify_admin';

    public function sendMail($email,$subject,$body,$name=''){
        if(\Yii::$app->mail->compose()
            ->setFrom(['vik1126111@gmail.com' =>'Advert'])
            ->setTo([$email => $name])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send());

        $this->trigger(self::EVENT_NOTIFY);
    }

    public function notifyAdmin($event){

        print "Notify Admin";
    }


    public static function getTitleAdvert($data){

        return $data['bedroom'].' Bed Rooms and '.$data['kitchen'].' Kitchen Room Aparment on Sale';
    }

    public static function getImageAdvert($data,$general = true,$original = false){

        $image = [];
        $base = Url::base();
        if($general){

            $image[] = $base.'/uploads/adverts/'.$data['ID'].'/general/'.$data['general_image'];
        }
        else{
            $path = \Yii::getAlias("@frontend/web/uploads/adverts" . $data['id']);
            $files = BaseFileHelper::findFiles($path);

            foreach ($files as $file){
                if (strstr($file, "small_") && !strstr($file, "general_")) {
                    $image[] = $base . '/uploads/adverts/' . $data['ID'] . '/' . basename($file);
                }
            }
        }

        return $image;
    }

    public static function substr($text,$start=0,$end=50){

        return mb_substr($text,$start,$end);
    }

    public static  function getType($row){
        return ($row['sold'] ? 'Sold' : 'New');
    }

}