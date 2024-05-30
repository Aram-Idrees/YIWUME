<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UpdatePasswordsToBcrypt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Retrieve all users from the database
        $users = User::all();

        // Loop through each user and update their password to bcrypt
        foreach ($users as $user) {
            $user->password = Hash::make($user->password);
            $user->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If you need to revert the changes, you can implement the down method
        // However, it's not necessary in this case because bcrypt is a one-way
        // hashing algorithm, so you can't reverse the hashed passwords.
    }
}
