
<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->

            <div class="navbar-collapse collapse">
                <?php

                use yii\bootstrap\Nav;
                use yii\helpers\Url;

                $actionId = $this->context->action->id;
                //'active' => $actionId === 'index',
                $menuItems =[
                    ['label' => 'Home', 'url' => ['/']],
                    ['label' => 'About', 'url' => ['/main/main/page', 'view' => 'about']],
                    ['label' => 'Blog', 'url' => ['/main/article/index']],
                    ['label' => 'Agents', 'url' => ['/main/agents/index']],
                    ['label' => 'Contact', 'url' => ['/main/main/page', 'view' => 'contact']],


                ];
                echo Nav::widget([
                    'options' => ['class' => 'nav navbar-nav navbar-right'],
                    'items' => $menuItems,
                ]);
                ?>
            </div>
        </div>
    </div>

</div>
<!-- #Header Starts -->


<div class="container">

    <!-- Header Starts -->

        <div class="header">
            <a href="<?=Url::to('/frontend/web/')?>" ><img src="\frontend\web\images/logo.png"  alt="Realestate"></a>
            <?
            $menuItems = [];
            $guest = Yii::$app->user->isGuest;
            if($guest) {
                $menuItems[] =  ['label' => 'Login', 'url' => '#', 'linkOptions' => ['data-target' => '#loginpop', 'data-toggle' => "modal"]];
            }
            else{
                $menuItems[] =  ['label' => 'Agent', 'url' => ['/cabinet/agent/index']];
                $menuItems[] =  ['label' => 'Blog', 'url' => ['/cabinet/blog/index']];
                $menuItems[] =  ['label' => 'Manager Adv', 'url' => ['/cabinet/advert']];
                $menuItems[] =  ['label' => 'Password', 'url' => ['/cabinet/default/change-password']];
                $menuItems[] =  ['label' => 'Avatar', 'url' => ['/cabinet/default/settings']];
                $menuItems[] = ['label' => 'Logout',  'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];
            }
            echo Nav::widget([
                'options' => ['class' => 'pull-right'],
                'items' => $menuItems,
            ]);
            ?>
        </div>


    </div>