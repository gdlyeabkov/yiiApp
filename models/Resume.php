<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Resume is the model behind the resume of worker.
 */
class Resume extends ActiveRecord
{
    
    public static function tableName(){
        return "resumesTable";
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, date_born, city and body are required
            [['photo', 'date_born', 'city'], 'required'],
            // duties is string
            [['duties'], 'string'],
            // thirdName, name, organization, position are required and string
            [['thirdName', 'name', 'organization', 'position'], ['required','string']],
            // email is required and email
            [['email'], ['required', 'email']],
            // salary is required and unsigned
            [['salary'], ['required', ['integer', 'min' => 0]]],
        ];
    }
    public function getworks()
    {
    return $this->hasMany(Work::className(), ['resumeID' => 'id']);
    }
}