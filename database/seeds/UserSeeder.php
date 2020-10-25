<?php

use App\Tweet;
use App\User;
use App\UserAttribute;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(User::class, 10)->create()->each(function (User $user) use ($faker) {
            $user->attrs()->save(factory(UserAttribute::class)->make());

            for ($i = 0; $i < rand(2, 6); $i++) {
                $toUser = User::find(rand(1, 10));

                $user->tweets()->save(factory(Tweet::class)->make());

                if ($toUser && $user->isNot($toUser)) {
                    $user->sendMessage($toUser, $faker->sentence);
                    $toUser->sendMessage($user, $faker->sentence);

                    if (!$user->following($toUser)) {
                        $user->follow($toUser);
                    }
                }
            }
        });
    }
}
