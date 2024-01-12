<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\newsitems;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// User::factory(1)->create();

		$user = User::factory()->create(
			[
				'name' => 'admin',
				'email' => 'admin@admin.nl'
			]
		);

		newsitems::factory(6)->create([
			'user_id' => $user->id
		]);
	}
}
