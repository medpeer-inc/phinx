<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateTableUsers extends AbstractMigration
{
    public function up()
    {
        // 自動生成される id を排除し、primary key を user_id とする
        $t = $this->table('users', ['id' => 'user_id']);

        $t->addColumn('last_name',       'string',     ['limit' => 10,  'comment' => '姓'])        // string 型 20文字制限
          ->addColumn('first_name',      'string',     ['limit' => 10,  'comment' => '名'])        // string 型 20文字制限
          ->addColumn('last_kana_name',  'string',     ['null' => true, 'limit' => 10,  'comment' => '姓（カナ）']) // string 型 NULL許可 10文字制限
          ->addColumn('first_kana_name', 'string',     ['null' => true, 'limit' => 10,  'comment' => '名（カナ）']) // string 型 NULL許可 10文字制限
          ->addColumn('username',        'string',     ['limit' => 20,  'comment' => 'ユーザ名'])   // string 型 20文字制限
          ->addColumn('password',        'string',     ['limit' => 40,  'comment' => 'パスワード']) // string 型 40文字制限
          ->addColumn('email',           'string',     ['limit' => 100, 'comment' => 'Email'])    // string 型 100文字制限
          ->addColumn('postcode',        'string',     ['limit' => 10,  'comment' => '郵便番号'])   // string 型 10文字制限
          ->addColumn('birthday',        'date',       ['comment' => '誕生日'])                    // date 型
          ->addColumn('gender',          'integer',    ['limit' => MysqlAdapter::INT_TINY, 'comment' => '性別(1:男 2:女 3:その他)']) // tinyint 型
          ->addColumn('card_number',     'string',     ['null' => true, 'limit' => 20,  'comment' =>'クレジットカードNo'])  // string 型 20文字制限 NULL許可
          ->addColumn('description',     'string',       ['null' => true, 'limit' => 255, 'comment' =>'説明'])  // longtext 型 200文字制限 NULL許可
          ->addColumn('created',         'timestamp',  ['default' => 'CURRENT_TIMESTAMP'])        // timestamp 型 default: CURRENT_TIMESTAMP
          ->addColumn('updated',         'datetime',   ['null' => true])                          // datetime 型 NULL 許可
          ->addIndex(['username', 'email'],     ['unique' => true])                               // username, email にユニークキー設定
          ->create();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
