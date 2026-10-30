<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin account. Email is the real inbox that receives password-reset links.
        User::updateOrCreate(
            ['email' => 'smbelal77@gmail.com'],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        // Regular user account.
        User::updateOrCreate(
            ['email' => 'user@cotton.test'],
            [
                'name' => 'Rahim Uddin',
                'role' => 'user',
                'password' => Hash::make('password'),
            ]
        );

        // Default hero banner.
        $this->call(BannerSeeder::class);

        // Garment categories + sample products.
        $this->call(CategoryProductSeeder::class);

        // About company section.
        $this->call(AboutSeeder::class);

        // Owner / founder profile.
        $this->call(OwnerSeeder::class);

        // Our Promise page.
        $this->call(PromiseSeeder::class);

        // Contact info.
        $this->call(ContactSeeder::class);

        // Certifications (About Us page).
        $this->call(CertificationSeeder::class);
    }
}
