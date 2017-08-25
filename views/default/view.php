<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model wokster\seomodule\models\Seo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Seo параметры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-view">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="btn-group">
                        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Seo параметры?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    
																		'id',
                                    'modulName',
                                    'item_id',
                                    'seo_title',
                                    'seo_keywords',
                                    'seo_description',
                                                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
