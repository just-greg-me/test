<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EmailSearch */
/* @var $dataProvider yii\data\ArrayDataProvider */

use yii\helpers\Html;

$this->title = 'Emails';
?>

<div class="row">
    <div class="col-sm-8">
        <h1 class="h4"><b>Emails</b></h1>
    </div>
    <div class="col-sm-4 text-right"><?= Html::a('Add', ['create'], ['class' => 'btn btn-info', 'data-loader' => true]); ?></div>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'email',
            ]
        ]) ?>
    </div>
</div>