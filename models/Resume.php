<?php

namespace app\models;

use yii\db\ActiveRecord;

class Resume extends ActiveRecord
{
    public static function tableName(){
        return "{{resumes}}";
    }
    public function getworks()
    {
    return $this->hasMany(Work::className(), ['resumeID' => 'id']);
    }
}