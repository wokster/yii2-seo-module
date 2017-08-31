<?php
/**
 * Created by internetsite.com.ua
 * User: Tymofeiev Maksym
 * Date: 28.12.2016
 * Time: 13:59
 */

namespace wokster\seomodule;


use yii\base\ErrorException;
use yii\helpers\HtmlPurifier;

class KeywordsHelper
{
  protected $text;
  protected $origin_arr;
  protected $modif_arr;
  protected $min_word_length = 5;

  function explode_str_on_words()
  {
    $text = HtmlPurifier::process($this->text);
    $text = trim($text);
    //Список стоп символом и слов
    $del_symbols = array(",", ".", ";", ":", "", "#", "$", "%", "^",
"!", "@", "`", "~", "*", "-", "=", "+", "",
"|", "/", ">", "<", "(", ")", "&", "?", "?", "t",
"r", "n", "{","}","[","]", "'", "“", "”", "•",
    );
    $del_words = require(__DIR__ . '/stop_words.php');
    array_walk($del_words,function (&$item,$k){
      $item = ' '.$item.' ';
    });
    $text = str_ireplace(array_merge($del_symbols,$del_words), " ", $text);
    $text = preg_replace("( +)", " ", $text);
    $this->origin_arr = explode(" ", trim($text));
    return $this->origin_arr;
}

  function count_words()
  {
    $tmp_arr = array();
    foreach ($this->origin_arr as $val)
    {
      if (strlen($val)>=$this->min_word_length)
      {
        $val = strtolower($val);
        if (array_key_exists($val, $tmp_arr))
        {
          $tmp_arr[$val]++;
        }
        else
        {
          $tmp_arr[$val] = 1;
        }
      }
    }
    arsort ($tmp_arr);
    $this->modif_arr = $tmp_arr;
  }

  function get_keywords($text)
  {
    $text = strip_tags($text);
    $this->text = mb_convert_case($text,MB_CASE_LOWER,"UTF-8");
    $this->explode_str_on_words();
    $this->count_words();
    $arr = array_slice($this->modif_arr, 0, 10);
    $str = "";
    foreach ($arr as $key=>$val)
    {
      $str .= $key . ", ";
    }
    return trim(substr($str, 0, strlen($str)-2));
  }
}