<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SetAdminPassword extends Command
{
    /**
     * php artisan admin:password
     * php artisan admin:password --email=smbelal77@gmail.com --password=secret123
     */
    protected $signature = 'admin:password
                            {--email= : Which account to update (defaults to the first admin)}
                            {--password= : New password (you will be prompted securely if omitted)}';

    protected $description = 'Reset an admin password from the command line (email-free recovery)';

    public function handle(): int
    {
        $email = $this->option('email');

        $user = $email
            ? User::where('email', $email)->first()
            : User::where('role', 'admin')->orderBy('id')->first();

        if (! $user) {
            $this->error($email ? "No account found with email {$email}." : 'No admin account found.');

            return self::FAILURE;
        }

        $password = $this->option('password') ?: $this->secret('Enter the new password (min 8 characters)');

        if (! $password || strlen($password) < 8) {
            $this->error('Password must be at least 8 characters.');

            return self::FAILURE;
        }

        $user->update(['password' => Hash::make($password)]);

        $this->info("Password updated for {$user->email}.");

        return self::SUCCESS;
    }
}
