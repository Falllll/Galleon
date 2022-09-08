<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\CardList;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);

        $user = User::factory()->create([
            'name' => 'Gatot Kaca',
            'email' => 'gatotkaca@gmail.com',
            'password' => bcrypt('secret'),
            'position_id' => '1'
        ])->attachRole('user');

        $boards = Board::factory(10)->for($user)->create();

        foreach ($boards as $board) {
            $cardList = CardList::factory()->create([
                'board_id' => $board->id,
                'user_id' => $user->id
            ]);

            Card::factory(50)->create([
                'board_id' => $board->id,
                'user_id' => $user->id,
                'card_list_id' => $cardList->id
            ]);
        }

        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PositionSeeder::class);

        
    }
}
