<?php

use Illuminate\Database\Seeder;
use App\Repositories\UserRepository;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var UserRepository $userRepo */
        $userRepo = app(UserRepository::class);

        $userRepo->create(
            'Пользователь API',
            'api-test@abelohost.com',
            'qwerty'
        );
    }
}
