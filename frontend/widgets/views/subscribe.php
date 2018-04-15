<?
$form = \yii\bootstrap\ActiveForm::begin([
    'enableAjaxValidation' => true,
    'validationUrl' => \yii\helpers\Url::to(['/validate/subscribe']),
    'options' => ['class' => 'form-inline']
]);
?>
<?= $form->field($model, 'email',['enableLabel' => false])->textInput(['placeholder' => 'Enter Your email address', 'class' => 'form-control']) ?>

<?=\yii\helpers\Html::submitButton('Notify Me!', ['class' => 'btn btn-success']) ?>

<?
\yii\bootstrap\ActiveForm::end();
?>