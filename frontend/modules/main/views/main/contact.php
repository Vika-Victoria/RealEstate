<?php $this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title; ?>

<div class="row contact">
    <div class="col-lg-6 col-sm-6 ">

        <?
        $form = \yii\bootstrap\ActiveForm::begin();
        ?>

        <?= $form->field($model, 'name',['enableLabel' => false])->textInput(['placeholder' => 'Full Name', 'class' => 'form-control']) ?>
        <?= $form->field($model, 'email',['enableLabel' => false])->textInput(['placeholder' => 'Email Address', 'class' => 'form-control']) ?>
        <?= $form->field($model, 'subject',['enableLabel' => false])->textInput(['placeholder' => 'Contact Number', 'class' => 'form-control']) ?>
        <?= $form->field($model, 'body',[
            'inputOptions'=>[
                'placeholder'=>'Message',
                'class'=>'form-control',
            ]
        ])->textArea(['rows' => 6])->label(false); ?>


        <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::classname(), [
            'captchaAction' => 'main/captcha',
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>


        <?=\yii\helpers\Html::submitButton('Send Message',['class' => 'btn btn-success']) ?>
        <?
        \yii\bootstrap\ActiveForm::end();
        ?>

    </div>

</div>