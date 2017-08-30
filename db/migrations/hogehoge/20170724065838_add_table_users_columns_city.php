<?php

use Phinx\Migration\AbstractMigration;

class AddTableUsersColumnsCity extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('users');
        $t->addColumn('city', 'string', ['limit' => 10, 'comment' => '都市', 'after' => 'postcode'])
          ->update();
    }

    public function down()
    {
        $t = $this->table('users');
        $t->removeColumn('city')
          ->save();
    }
}
