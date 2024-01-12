<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\newsitems>
 */
class newsitemsFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => $this->faker->sentence(),
      'tags' => 'Nieuwsletter, Update, Announcement',
      'content' => $this->faker->paragraph(5),
      'email' => $this->faker->email(),
      // 'image' => $this->faker->imageUrl(),
      'author' => $this->faker->name(),
      'website' => $this->faker->url(),
      'websiteName' => $this->faker->company(),
    ];
  }
}
