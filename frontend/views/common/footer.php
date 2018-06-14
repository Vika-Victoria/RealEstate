<?php if (Yii::$app->user->isGuest)
{
    echo \frontend\widgets\Login::widget();
}
?>

<div class="footer">

    <div class="container">



        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Information</h4>
                <?php
                use yii\helpers\Url;
                use yii\widgets\Menu;

                $actionId = $this->context->action->id;
                $menuItems =[
                    ['label' => 'About', 'url' => ['/main/main/page', 'view' => 'about']],
                    ['label' => 'Blogs', 'url' => '/frontend/web/main/blog/index'],
                    ['label' => 'Agents', 'url' => '#'],
                    ['label' => 'Contact', 'url' => ['/main/main/page', 'view' => 'contact']],
                ];
                echo Menu::widget([
                    'options' => ['class' => 'row'],
                    'items' => $menuItems,
                ]);
                ?>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Newsletter</h4>
                <p>Get notified about the latest properties in our marketplace.</p>

                <?php echo \frontend\widgets\SubscribeWidget::widget();?>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Follow us</h4>
                <a href="#"><img src="\frontend\web\images/facebook.png"  alt="facebook"></a>
                <a href="#"><img src="\frontend\web\images/twitter.png"  alt="twitter"></a>
                <a href="#"><img src="\frontend\web\images/linkedin.png"  alt="linkedin"></a>
                <a href="#"><img src="\frontend\web\images/instagram.png"  alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Contact us</h4>
                <p><b>Bootstrap Realestate Inc.</b><br>
                    <span class="glyphicon glyphicon-map-marker"></span> 8290 Walk Street, Australia <br>
                    <span class="glyphicon glyphicon-envelope"></span> hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p>
            </div>
        </div>
        <p class="copyright">Copyright 2018. All rights reserved.	</p>


    </div></div>