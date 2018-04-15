
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

                $actionId = $this->context->action->id;
                $menuItems =[
                    ['label' => 'Home', 'active' => $actionId === 'index', 'url' => '#'],
                    ['label' => 'About', 'url' => '#'],
                    ['label' => 'Blog', 'url' => '#'],
                    ['label' => 'Contact', 'url' => '#'],
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
            <a href="index.html" ><img src="\frontend\web\images/logo.png"  alt="Realestate"></a>
            <?
            $menuItems = [];
            $guest = Yii::$app->user->isGuest;
            if($guest) {
                $menuItems[] =  ['label' => 'Login', 'url' => '#', 'linkOptions' => ['data-target' => '#loginpop', 'data-toggle' => "modal"]];
            }
            else{
                $menuItems[] =  ['label' => 'Manager adverts', 'url' => ['/cabinet/advert']];
                $menuItems[] = ['label' => 'Logout',  'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];
            }
            echo Nav::widget([
                'options' => ['class' => 'pull-right'],
                'items' => $menuItems,
            ]);
            ?>
        </div>


    </div>