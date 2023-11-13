<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->username = "admin";
        $user->name = "Admin Aplikasi";
        $user->email = "admin@app.test";
        $user->password = Hash::make("admin123");
        $user->tahun = Carbon::now()->year;

        $user->save();
    }
}
