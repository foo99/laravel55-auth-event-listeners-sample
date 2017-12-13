<?php

use Illuminate\Database\Seeder;

class AuthEventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['Registered', 'registered', $now]);
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['Attempting', 'attempting', $now]);
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['Authenticated', 'authenticated', $now]);
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['Login', 'login', $now]);
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['FailedLogin', 'failed-login', $now]);
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['Logout', 'logout', $now]);
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['Lockout', 'lockout', $now]);
        \DB::insert('insert into auth_event_types (name, slug, created_at) values (?, ?, ?)', ['PasswordReset', 'password-reset', $now]);
    }
}
