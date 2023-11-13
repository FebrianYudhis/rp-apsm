<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OutcomingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tanggal_surat" => $this->faker->date(),
            "nomor_surat" => "SRT" . $this->faker->randomNumber(4) . "/" . $this->faker->numberBetween(1, 12) . "/" . $this->faker->year(),
            "tujuan" => $this->faker->company(),
            "perihal" => $this->faker->sentence(),
            "lokasi_berkas" => "Lemari 2",
            "url" => "dokumen/keluar/dummy.pdf",
            "tahun" => $this->faker->randomElement([2022, 2023])
        ];
    }
}
