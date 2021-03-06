<?php
$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<div class="container">
    <div class="spacer blog">
        <div class="row">
            <div class="col-lg-8 col-sm-12 ">


                <?php foreach ($articles as $article): ?>
                <!-- blog list -->
                <div class="row">
                    <div class="col-lg-4 col-sm-4 "><a href="<?= Url::toRoute(['article/view', 'id' => $article->id]); ?>"  class="thumbnail"><img src="<?= $article->getImage(); ?>"  alt="blog title"></a></div>
                    <div class="col-lg-8 col-sm-8 ">
                        <h3><a href="<?= Url::toRoute(['article/view', 'id' => $article->id]); ?>" ><?= $article->title; ?></a></h3>

                        <div class="info">Posted on: <?= $article->getDate(); ?></div>
                        <p><?= $article->description; ?></p>
                        <a href="<?= Url::toRoute(['article/view', 'id' => $article->id]); ?>"  class="more">Read More</a>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- blog list -->


            </div>
            <div class="col-lg-4 visible-lg">

                <!-- tabs -->
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#tab1" data-toggle="tab">Recent Post</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab">Most Popular</a></li>
                        <li class="active"><a href="#tab3" data-toggle="tab">Most Commented</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                            <ul class="list-unstyled">
                             <?php foreach ($recent as $article):?>
                                <li>
                                    <h5><a href="blogdetail.html" ><?= $article->title; ?></a></h5>
                                    <div class="info">Posted on: <?= $article->data; ?></div>
                                </li>
                             <?php endforeach;?>

                            </ul>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <ul  class="list-unstyled">
                               <?php foreach ($popular as $article): ?>
                                    <li>
                                        <h5><a href="blogdetail.html" ><?= $article->title; ?></a></h5>
                                        <div class="info">Posted on: <?= $article->data; ?></div>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="tab-pane active" id="tab3">
                            <ul class="list-unstyled">
                                <?php foreach ($commented as $article):?>
                                    <li>
                                        <h5><a href="blogdetail.html" ><?= $article->title; ?></a></h5>
                                        <div class="info">Posted on: <?= $article->data; ?></div>
                                    </li>
                                <?php endforeach;?>

                            </ul>
                        </div>
                    </div>

                </div>
                <!-- tabs -->

            </div>

        </div>

        <?php
            echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
        ?>

    </div>
</div>