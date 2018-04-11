<?php $this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title; ?>
<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

        <?php

        use yii\bootstrap\ActiveForm;
        use yii\helpers\Html;

        $form = ActiveForm::begin(
                [ 'enableClientValidation' => false,// отключает клиентскую валидацию false
                  'enableAjaxValidation' => true,
                ]
        );
        ?>

        <?php
            echo $form->field($model, 'username',['enableLabel' => false])->textInput(['placeholder' => 'Full Name', 'class' => 'form-control']);
        ?>
        <?php
            echo $form->field($model, 'email',['enableLabel' => false])->textInput(['placeholder' => 'Enter Email', 'class' => 'form-control']);
        ?>
        <?php
            echo $form->field($model, 'password',[
                'inputOptions'=>[
                    'placeholder'=>'Password',
                    'class'=>'form-control'
                ]
            ])->passwordInput()->label(false);
        ?>
        <?php
            echo $form->field($model, 'repassword',[
                'inputOptions'=>[
                    'placeholder'=>'Confirm Password',
                    'class'=>'form-control'
                ]
            ])->passwordInput()->label(false);
        ?>
        <?php
            echo Html::submitButton('Register', ['class' => 'btn btn-success']);
        ?>

        <?php
            ActiveForm::end();
        ?>

    </div>

</div>
