<?php

namespace wokster\seomodule\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $modul_name
 * @property integer $item_id
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 */
class Seo extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modul_name'], 'required'],
            [['item_id'], 'integer'],
            [['modul_name', 'seo_title'], 'string', 'max' => 255],
            [['seo_keywords', 'seo_description'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modul_name' => 'Modul Name',
            'item_id' => 'Item ID',
            'seo_title' => 'Seo Title',
            'seo_keywords' => 'Seo Keywords',
            'seo_description' => 'Seo Description',
        ];
    }
    public static function getModulList(){
        return [
            'main' => 'Главная',
            'price' => 'Прайс',
            'common\models\Article' => 'статьи',
            'common\models\Medical' => 'разделы медицины',
            'common\models\Page' => 'страницы',
            'common\models\News' => 'новости',
        ];
    }
    public function getModulName(){
        $list = self::getModulList();
        if(isset($list[$this->modul_name])){
            $name = $list[$this->modul_name];
        }else{
            $name = 'неизвестно';
        }
        return $name;
    }
    public function getModulIdName(){
        if($this->item_id == null){
            return 'главная';
        }
        return $this->item_id;
    }
}
