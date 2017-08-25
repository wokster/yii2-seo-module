<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wokster\seomodule\models\Seo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">

                <div class="box-header with-border">
                    <h3 class="box-title">Заполните форму</h3>
                </div>

                <div class="box-body">

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'modul_name')->dropDownList($model->getModulList()) ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12"><label class="control-label" for="seo-item_id">Id страницы в модуле <?=$model->getModulName()?></label></div>
                    <div class="col-xs-6 col-sm-8">
                      <?php
                      if(is_int($model->item_id)){
                        $sw = true;
                        $st = '';
                      }else{
                        $sw = false;
                        $st = 'display:none;';
                      }
                      ?>
                      <?= $form->field($model, 'item_id')->label(false)->textInput(['style'=>$st])?>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                      <?=\dosamigos\switchinput\SwitchBox::widget([
                          'name' => 'Test',
                          'id'=>'switcher',
                          'clientOptions' => [
                              'state' => $sw,
                              'size' => 'large',
                              'onColor' => 'primary',
                              'offColor' => 'default',
                              'offText' => 'Главная',
                              'onText' => 'Дочерняя'
                          ]
                      ])?>
                      <?= $this->registerJs("
                        $('#switcher').on('switchChange.bootstrapSwitch', function (e, data) {
                          if(data){
                            $('#seo-item_id').show();
                            var new_v = $('#seo-item_id').attr('data-old-val');
                            $('#seo-item_id').attr('value',new_v);
                          }else{
                            $('#seo-item_id').hide();
                            var old_v = $('#seo-item_id').val();
                            $('#seo-item_id').attr('data-old-val',old_v);
                            $('#seo-item_id').removeAttr('value');
                          }
                        });
                        ");
                      ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
  <?php ActiveForm::end(); ?>
</div>
