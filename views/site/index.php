<?php

/* @var $this yii\web\View */
/* @var $model \app\models\Calculator */
/** @var \app\models\Logging[] $logs */
$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>
<div class="row">
    <div class="col-lg-5">
        <strong>Allowed operations:</strong> <i>+</i> <i>-</i> <i>*</i> <i>/</i> <i>^</i>
    </div>
    <div class="col-lg-5">
        <strong>Example:</strong> 2 3 + 4 +
    </div>
</div>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'calc-form']); ?>
        <?= $form->field($model, 'expression')->textInput(['autofocus' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <h1>Result: <?=$model->result?></h1>
</div>
<div class="row">
    <h2>Result logs:</h2>
    <ul class="list-group">
        <?php foreach ($logs as $log): ?>
        <li class="list-group-item"><strong><?=$log->expression?>:</strong> <?=$log->result?></li>
        <?php endforeach; ?>
    </ul>
</div>
