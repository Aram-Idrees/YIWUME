<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdatePasswordsToBcrypt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Get all users from the users table
        $users = DB::table('users')->get();
        
        // Loop through each user and update their password to use Bcrypt hashing
        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => bcrypt($user->password)]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverting this operation may not be necessary
        // as it involves irreversible changes to user passwords.
        // If needed, you could implement a down method to revert
        // the changes, but it's not common for password hashing migrations.
    }
}
