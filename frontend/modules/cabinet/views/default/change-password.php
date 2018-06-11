<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Advert */

$this->title = 'Change password';
$this->params['breadcrumbs'][] = ['label' => 'Change password', 'url' => ['change-password']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-form">

    <? $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <?=$form->field($model,'password')->passwordInput() ?>
    <?=$form->field($model,'repassword')->passwordInput() ?>


    <?= \yii\helpers\Html::submitButton('Change password', ['class' => 'btn btn-primary']) ?>

    <? \yii\bootstrap\ActiveForm::end() ?>


    </div>