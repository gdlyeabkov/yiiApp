<?php

namespace app\models;

use yii\db\ActiveRecord;

class Work extends ActiveRecord
{
    public static function tableName(){
        return "{{works}}";
    }
    public function getresumes()
    {
    return $this->hasOne(Resume::className(), ['id' => 'resumeID']);
    }
}