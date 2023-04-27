<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Roles;
use App\Models\Person;
use App\Models\User;
use App\Models\Store;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Person factory
        Person::factory(100)->create();
        echo "Person seed successfully!\n";

        // Role factory
        Roles::factory()->create([
            'code' => 'sample code 1',
            'name' =>  'admin',
        ]);

        Roles::factory()->create([
            'code' => 'sample code 2',
            'name' =>  'seller',
        ]);

        Roles::factory()->create([
            'code' => 'sample code 3',
            'name' =>  'buyer',
        ]);
        echo "Role seed successfully!\n";

        // User factory
        User::factory(100)->create();

        // set user profile
        $persons = Person::with('user')->get();
        $usedUserIds = [];
        $users = User::all();
        $users->each(function ($user) use ($persons, $usedUserIds) {
            while (true) {
                $rdm = rand(1, $persons->count());
                if (!in_array($rdm, $usedUserIds)) {
                    $user->person_id = $rdm;
                    array_push($usedUserIds, $rdm);
                    break;
                } else {
                    $rdm = rand(1, $persons->count());
                }
            }
        });
        echo "User seed successfully!\n";

        // Store factory
        Store::factory(50)->create();

        // set store user
        $userIdsForStore = [];
        Store::all()->each(function ($store) use ($users, $userIdsForStore) {
            $user = $users->random();
            while (in_array($user->id, $userIdsForStore)) {
                $user = $users->random();
            }
            array_push($userIdsForStore, $user->id);
            $store->user_id = $user->id;
            $store->save();
        });
        echo "Store seed successfully!\n";
    }
}
