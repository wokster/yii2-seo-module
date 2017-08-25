<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel wokster\seomodule\models\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seo параметры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-index row">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <span class="label label-default">записей <?= $dataProvider->getCount()?> из <?= $dataProvider->getTotalCount()?></span>
            </div>
            <div class="box-body">
                        <?= GridView::widget([
            'summary' => '',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'id',
            ['attribute'=>'modul_name','value'=>'modulName', 'filter'=>\wokster\seomodule\models\Seo::getModulList()],
            ['attribute'=>'item_id','value'=>'modulIdName'],
            'seo_title',
            'seo_keywords',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                        </div>
        </div>
    </div>
</div>
