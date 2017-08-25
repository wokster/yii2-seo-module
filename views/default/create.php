<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model wokster\seomodule\models\Seo */

$this->title = 'Создать Seo параметры';
$this->params['breadcrumbs'][] = ['label' => 'Seo параметры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
