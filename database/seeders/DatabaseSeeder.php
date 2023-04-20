<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Roles;
use App\Models\Person;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Person factory
        Person::factory(500)->create();

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

        // User factory
        User::factory(500)->create();

        // set user profile
        $persons = Person::with('user')->get();
        $usedIds = [];
        User::all()->each(function ($user) use ($persons, $usedIds) {
            while (true) {
                $rdm = rand(1, $persons->count());
                if (!in_array($rdm, $usedIds)) {
                    $user->update([
                        'person_id' => $rdm
                    ]);
                    array_push($usedIds, $rdm);
                    break;
                } else {
                    $rdm = rand(1, $persons->count());
                }
            }
        });

    }
}
