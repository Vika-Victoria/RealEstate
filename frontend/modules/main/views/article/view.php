<?php

$this->title =  $article->title;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
    <div class="spacer blog">
        <div class="row">
            <div class="col-lg-8">

                <!-- blog detail -->
                <h2><?= $article->title; ?></h2>
                <div class="info">Posted on: <?= $article->getDate(); ?></div>
                <img src="<?= $article->getImage(); ?>"  class="thumbnail img-responsive"  alt="blog title">
                <p><?= $article->text; ?></p>
                <!-- blog detail -->

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
    </div>
</div>