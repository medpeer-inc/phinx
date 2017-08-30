<?php

use Phinx\Migration\AbstractMigration;

class CreateTableMembers extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('members');
        $t->addColumn('member_code', 'string',    ['limit' => 20,  'comment' => '会員コード'])   // string 型 20文字制限
          ->addColumn('created',     'timestamp', ['default' => 'CURRENT_TIMESTAMP'])        // timestamp 型 default: CURRENT_TIMESTAMP
          ->addColumn('updated',     'datetime',  ['null' => true])                          // datetime 型 NULL 許可
          ->addIndex(['member_code'], ['unique' => true])                                    // member_code にユニークキー設定
          ->create();
    }

    public function down()
    {
        $this->dropTable('members');
    }
}
