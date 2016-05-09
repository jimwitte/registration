<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'Welcome Page is Open Text',
            'key' => 'welcome_page_open',
            'value' => 'Welcome, registration is open!',
            'description' => 'This text is shown on the welcome page when registration is open.',
            'type' => 'text'
        ]);

        DB::table('settings')->insert([
            'name' => 'Welcome Page is Closed Text',
            'key' => 'welcome_page_closed',
            'value' => 'Welcome. registration is not available.',
            'description' => 'This text is shown on the welcome page when registration is closed.',
            'type' => 'text'
        ]);

        DB::table('settings')->insert([
            'name' => 'Open Date',
            'key' => 'open_date',
            'value' => '2015-01-01',
            'description' => 'Registration is available at 12:01 AM on this date.',
            'type' => 'date'
        ]);

        DB::table('settings')->insert([
            'name' => 'Close Date',
            'key' => 'close_date',
            'value' => '2015-01-01',
            'description' => 'Registration will close at 12:01 AM on this date.',
            'type' => 'date'
        ]);

        DB::table('settings')->insert([
            'name' => 'Email From: address',
            'key' => 'email_from',
            'value' => 'example@example.com',
            'description' => 'Email sent by the system will use this email address as the sender.',
            'type' => 'email'
        ]);

    }
}
