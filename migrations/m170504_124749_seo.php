<?php

use yii\db\Migration;

class m170504_124749_seo extends Migration
{
    public function safeUp()
    {
        $this->createTable('seo',
            [
                'id' => $this->primaryKey(),
                'modul_name' => $this->string(255)->notNull(),
                'item_id'=> $this->integer(),
                'seo_title' => $this->string(255),
                'seo_keywords' => $this->string(500),
                'seo_description' => $this->string(500)
            ]
        );
        $this->createIndex(
            'seo-item_id-modul_name',
            'seo',
            ['item_id','modul_name']
        );
    }

    public function safeDown()
    {
        echo "m170504_124749_seo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170504_124749_seo cannot be reverted.\n";

        return false;
    }
    */
}
