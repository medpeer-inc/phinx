<?php

use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    public function run()
    {
        $t = $this->table('users');
        $t->truncate();

        $genders = [1,2,3];

        $faker = Faker\Factory::create('ja_JP');
        $d = [];
        for ($i = 0; $i < 100; $i++) {
            $d[] = [
                'last_name'        => $faker->lastName(10),
                'first_name'       => $faker->firstName(10),
                'last_kana_name'   => $faker->lastKanaName(10),
                'first_kana_name'  => $faker->firstKanaName(10),
                'username'         => $faker->userName(20),
                'password'         => sha1($faker->password),
                'email'            => $faker->email,
                'postcode'         => $faker->postcode,
                'city'             => $faker->city,
                'birthday'         => $faker->date($format='Y-m-d',$max='now'),
                'gender'           => $faker->randomElement($genders),
                'card_number'      => $faker->creditCardNumber,
                'description'      => $faker->text(200),
                'created'          => date('Y-m-d H:i:s'),
                'updated'          => date('Y-m-d H:i:s'),
            ];
        }

        $this->insert('users', $d);
    }
}
