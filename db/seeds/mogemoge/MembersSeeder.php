<?php

use Phinx\Seed\AbstractSeed;

class MembersSeeder extends AbstractSeed
{
    public function run()
    {
        $t = $this->table('members');
        $t->truncate();

        $faker = Faker\Factory::create('ja_JP');
        $d = [];
        for ($i = 0; $i < 100; $i++) {
            $d[] = [
                'member_code'  => $faker->regexify('[0-9]{20}'),
                'created'   => date('Y-m-d H:i:s'),
                'updated'   => date('Y-m-d H:i:s'),
            ];
        }

        $this->insert('members', $d);
    }
}
