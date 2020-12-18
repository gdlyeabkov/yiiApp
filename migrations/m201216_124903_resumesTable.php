<?php

use yii\db\Migration;

/**
 * Class m201216_124903_resumesTable
 */
class m201216_124903_resumesTable extends Migration
{
    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeUp()
    // {

    // }

    /**
     * {@inheritdoc}
     */
    // public function safeDown()
    // {
    //     echo "m201216_124903_resumesTable cannot be reverted.\n";

    //     return false;
    // }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('resumesTable', [
            'id' => $this->primaryKey(),
            'photo' => $this->string(),
            'date_updated' => $this->date(),
            'specialization' => $this->text(),
            'salary' => $this->integer(),
            'experience' => $this->string(),
            'age' => $this->integer(),
            'recidense' => $this->string(),
            'tag' => $this->string(),
            'phone' => $this->string(),
            'about' => $this->string(),
            'email' => $this->string(),
            'name' => $this->string(),
            'gender' => $this->string(),
            'thirdName' => $this->string(),
            'date_born' => $this->date(),
            'contacts' => $this->text(),
            'schedule' => $this->string(),
            'organization' => $this->string(),
            'position' => $this->string(),
            'duties' => $this->string(),
            'employment' => $this->string(),
            'views' => $this->integer(),
            'dateWork' => $this->string(),
            'places_of_work' => $this->string(),
        ]);
    }

    public function down()
    {
        echo "m201216_124903_resumesTable cannot be reverted.\n";

        return false;
    }
}
