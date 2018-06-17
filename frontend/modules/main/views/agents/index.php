<?php
$this->title = 'Agents';
$this->params['breadcrumbs'][] = $this->title;

use yii\widgets\LinkPager;
?>
<div class="container">
    <div class="spacer agents">

        <div class="row">
            <div class="col-lg-8  col-lg-offset-2 col-sm-12">
                <!-- agents -->

            <?foreach ($agents as $agent): ?>
                <div class="row">
                    <div class="col-lg-2 col-sm-2 "><a href="#"><img src="<?= $agent->getImage(); ?>"  class="img-responsive"  alt="agent name"></a></div>
                    <div class="col-lg-7 col-sm-7 "><h4><?= $agent->name; ?></h4><p><?= $agent->description; ?></p></div>
                    <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:abc@realestate.com"><?= $agent->email; ?></a><br>
                        <span class="glyphicon glyphicon-earphone"></span> <?= $agent->tel; ?></div>
                </div>
            <?php endforeach;?>
                <!-- agents -->

            </div>
        </div>

        <?php
        echo LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>

    </div>
</div>