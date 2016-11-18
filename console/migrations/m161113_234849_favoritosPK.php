<?php

use yii\db\Migration;

class m161113_234849_favoritosPK extends Migration
{
    public function up()
    {
            $this->execute('ALTER TABLE `favoritos` DROP PRIMARY KEY ,
                            ADD PRIMARY KEY ( `inmueble_id` ) ;'
                    );
            
            $this->execute('ALTER TABLE `favoritos` DROP PRIMARY KEY ,
                            ADD PRIMARY KEY ( `cliente_id` ) ;'
                    );
    }

    public function down()
    {
        echo "m161113_234849_favoritosPK cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
