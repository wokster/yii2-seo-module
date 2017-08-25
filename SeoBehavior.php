<?php
/**
 * Created by internetsite.com.ua
 * User: Tymofeiev Maksym
 * Date: 10.08.2016
 * Time: 19:22
 */

namespace wokster\seomodule;

use wokster\seomodule\models\Seo;
use yii\base\Behavior;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\helpers\StringHelper;
use yii\validators\Validator;

class SeoBehavior extends Behavior
{
  public $rules = [[['seo_title','seo_keywords','seo_description'],'safe']];
  public $seo_title;
  public $seo_keywords;
  public $seo_description;
  public $title_attribute = 'title';
  public $body_attribute = 'text';
  public $recommended_description = '';
  public $recommended_keywords = '';

  private $_seo;

  public function events()
  {
    return [
        ActiveRecord::EVENT_AFTER_FIND => 'findSeo',
        ActiveRecord::EVENT_AFTER_INSERT => 'saveSeo',
        ActiveRecord::EVENT_AFTER_UPDATE => 'saveSeo',
    ];
  }
  public function attach($owner)
  {
    parent::attach($owner);
    $validators = $owner->validators;
    foreach ($this->rules as $rule) {
      if ($rule instanceof Validator) {
        $validators->append($rule);
      } elseif (is_array($rule) && isset($rule[0], $rule[1])) { // attributes, validator type
        $validator = Validator::createValidator($rule[1], $owner, (array) $rule[0], array_slice($rule, 2));
        $validators->append($validator);
      } else {
        throw new InvalidConfigException('Invalid validation rule: a rule must specify both attribute names and validator type.');
      }
    }
  }

  public function getSeo()
  {
    if($this->_seo == null){
      $this->_seo = Seo::find()->andWhere(['modul_name'=>$this->owner->className()])->andWhere(['item_id'=>$this->owner->id])->one();
    }
    return $this->_seo;
  }
  
  public function findSeo(){
    if($this->seo != null){
      $this->seo_title = $this->seo->seo_title;
      $this->seo_keywords = $this->seo->seo_keywords;
      $this->seo_description = $this->seo->seo_description;
    }
    $this->recommended_description = StringHelper::truncateWords(strip_tags($this->owner->{$this->body_attribute}),25,'');
    $keyer = new KeywordsHelper();
    $this->recommended_keywords = $keyer->get_keywords($this->owner->{$this->body_attribute});
  }

  public function saveSeo(){
    if($this->seo != null){
      $seo = $this->seo;
    }else{
      $seo = new Seo();
      $seo->modul_name = $this->owner->className();
      $seo->item_id = $this->owner->id;
    }
    $seo->seo_title = $this->seo_title;
    $seo->seo_description = $this->seo_description;
    $seo->seo_keywords = $this->seo_keywords;
    $seo->save();
  }
}
