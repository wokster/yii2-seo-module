<?php
/**
 * Created by internetsite.com.ua
 * User: Tymofeiev Maksym
 * Date: 02.06.2016
 * Time: 15:34
 */

namespace wokster\seomodule;

use common\models\Seo;
use Yii;
use yii\base\Model;
use yii\base\Widget as BaseWidget;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

class SeoWidget extends BaseWidget
{
  /**
   * @var Model the data model that this widget is associated with.
   */
  public $model;
  public $page = 'main';

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
    if($this->model == null){
     $data = Seo::find()->andWhere(['modul_name'=>$this->page])->one();
    }else {
      $data = $this->model;
    }
      if(!empty($data->seo_title)){
        $this->view->title = $data->seo_title;
      }elseif(isset($data->title)){
        $this->view->title = $data->title;
      }else{
        $this->view->title = '';
      }
      if(!empty($data->seo_description)){
        $this->view->registerMetaTag(['name' => 'description', 'content' => $data->seo_description],'description');
      }
      if(!empty($data->seo_keywords)){
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $data->seo_keywords],'keywords');
      } 
  }
}
