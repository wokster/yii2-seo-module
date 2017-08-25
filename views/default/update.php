<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wokster\seomodule\models\Seo */

$this->title = 'Редактировать Seo параметры: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Seo параметры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="seo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
