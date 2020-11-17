<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property float price
 * @property string name
 */
class Product extends ActiveRecord
{
  public static function tableName()
  {
    return '{{%products}}';
  }
}