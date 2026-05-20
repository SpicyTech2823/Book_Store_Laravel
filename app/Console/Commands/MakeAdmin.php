<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    protected $signature = 'make:admin {email} {--create}';
    protected $description = 'Make a user admin or create a new admin user';

    public function handle()
    {
        $email = $this->argument('email');
        $create = $this->option('create');

        $user = User::where('email', $email)->first();

        if (!$user) {
            if ($create) {
                $name = $this->ask('Enter user name');
                $password = $this->secret('Enter password');

                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'is_admin' => true,
                ]);

                $this->info("Admin user created: {$email}");
            } else {
                $this->error("User not found. Use --create to create a new admin user");
                return;
            }
        } else {
            $user->update(['is_admin' => true]);
            $this->info("User promoted to admin: {$email}");
        }
    }
}
