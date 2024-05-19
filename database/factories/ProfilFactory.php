<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => 'Pantai Goa Petapa',
            'deskripsi' => $this->faker->paragraph(3),
            'logo' => 'logo.png',
            'email' => 'pantai_goapetapa@gmail.com',
            'alamat' => 'Bangkalan',
            'no_telepon' => $this->faker->e164PhoneNumber('id_ID'),
        ];
    }
}
