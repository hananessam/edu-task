<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = \File::get(public_path('users.json'));
        $data = json_decode($json);

        foreach ($data->users as $user) {
            User::create([
                'id' => $user->id,
                'email' => $user->email,
                'currency' => $user->currency,
                'balance' => $user->balance,
                'created_at' => $user->created_at,
            ]);
        }
    }
}
