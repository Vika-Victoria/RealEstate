<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
        <?php
        use yii\bootstrap\ActiveForm;
        use yii\helpers\Html;

        $form = ActiveForm::begin();
        ?>

        <?=$form->field($model, 'username',['enableLabel' => false])->textInput(['placeholder' => 'Full Name', 'class' => 'form-control']);?>
        <?=$form->field($model, 'password',[
            'inputOptions'=>[
                'placeholder'=>'Password',
                'class'=>'form-control'
            ]
        ])->passwordInput()->label(false);?>
        <?=$form->field($model, 'rememberMe')->checkbox();?>

        <?=Html::submitButton('Login', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>