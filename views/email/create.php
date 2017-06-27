<?php

/* @var $this \yii\web\View */
/* @var $model \app\models\EmailForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Add new email';

?>

<div class="row">
    <div class="col-sm-4"><?= Html::a('Go back', Url::previous(), ['class' => 'btn btn-default']) ?></div>
    <div class="col-sm-4 text-center">
        <h1 class="h4"><b><?= $this->title ?></b></h1>
    </div>
    <div class="col-sm-4"></div>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr>
    </div>
</div>

<?php $form = ActiveForm::begin(['id' => 'email-form', 'enableAjaxValidation' => true]); ?>
    <div class="row">
        <div class="col-sm-12"><?= $form->errorSummary($model); ?></div>
    </div>
    <?= $form->field($model, 'input')->label(sprintf('%s (%s)', $model->getAttributeLabel('input'), $model->getAttributeNote('input')))?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>
<?php ActiveForm::end(); ?>

