<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wokster\seomodule\models\SeoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-search row">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="col-xs-3">    <?= $form->field($model, 'id') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'modul_name') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'item_id') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'seo_title') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'seo_keywords') ?>

</div><div class="col-xs-3">    <?= $form->field($model, 'seo_description') ?>

</div>    <div class="form-group col-xs-12">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
