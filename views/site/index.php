<?php

/* @var $this yii\web\View */
/* @var $model \app\models\Calculator */

$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>
<div class="row">
    <div class="col-lg-5">

        <?php $form = ActiveForm::begin(['id' => 'calc-form']); ?>
        <?= $form->field($model, 'expression')->textInput(['autofocus' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <h1><?=$model->result?></h1>
</div>
