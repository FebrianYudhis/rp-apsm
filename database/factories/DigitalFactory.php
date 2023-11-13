<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DigitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "perihal" => $this->faker->sentence(),
            "lokasi_berkas" => "-",
            "url" => "dokumen/digital/dummy.pdf",
        ];
    }
}
