<?php
/**
 * Created by internetsite.com.ua
 * User: Tymofeiev Maksym
 * Date: 02.06.2016
 * Time: 15:34
 */

namespace wokster\seomodule;

use Yii;
use yii\base\Model;
use yii\base\Widget as BaseWidget;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

class SeoFormWidget extends BaseWidget
{
  /**
   * @var Model the data model that this widget is associated with.
   */
  public $model;
  public $form;

  /**
   * @inheritdoc
   */
  public function init()
  {
    parent::init();
  }

  /**
   * @inheritdoc
   */
  public function run()
  {
    $addon = '';
    if(!$this->model->isNewRecord)
      $addon = Html::a('авто','#',['class'=>'input-group-addon seo-add-default']);
    echo Html::beginTag('div',['class'=>'row']);
    echo Html::tag('div',Html::tag('h4','Seo параметры'),['class'=>'col-xs-12']);
    echo Html::tag('div',$this->form->field($this->model,'seo_title',['template'=>'{label}<div class="">{input}'.$addon.'</div>{hint}'])->label('Seo Title')->textInput(['maxlength' => true])->hint((!$this->model->isNewRecord)?'Авто генерация: <span class="defaulttext">'.$this->model->{$this->model->title_attribute}:'').'</span>',['class'=>'col-xs-12']);
    echo Html::tag('div',$this->form->field($this->model,'seo_keywords',['template'=>'{label}<div class="">{input}'.$addon.'</div>{hint}'])->label('Seo Keywords')->textInput(['maxlength' => true])->hint((!$this->model->isNewRecord)?'Авто генерация: <span class="defaulttext">'.$this->model->recommended_keywords.'</span>':''),['class'=>'col-xs-12']);
    echo Html::tag('div',$this->form->field($this->model,'seo_description',['template'=>'{label}<div class="">{input}'.$addon.'</div>{hint}'])->label('Seo Description')->textarea(['rows' => 3])->hint((!$this->model->isNewRecord)?'Авто генерация: <span class="defaulttext">'.$this->model->recommended_description.'</span>':''),['class'=>'col-xs-12']);
    echo Html::endTag('div');
    $this->view->registerJs("
    $('.seo-add-default').on('click',function(e){
    e.preventDefault();
      var defaulttext = $(this).closest('.form-group').find('.defaulttext').text();    
      $(this).siblings('.form-control').val(defaulttext);
    });
    ");
  }
}
