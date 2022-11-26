<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::query()->get();

        for ($i=0;$i<10;$i++) {
            $chat =  Chat::query()->create([
                "title"=>"test",
                "description"=>"test"
            ]);
            foreach ($users as $user) {
                $chat->chatUsers()->attach($user->id);

                for ($j=0;$j<random_int(1,10);$j++) {
                    Message::factory()->create([
                        'user_id' => $user->id,
                        'chat_id' => $chat->id
                    ]);
                }

            }

            Message::factory()->create([
                'user_id' => 2,
                'chat_id' => $chat->id
            ]);

        }


    }
}
