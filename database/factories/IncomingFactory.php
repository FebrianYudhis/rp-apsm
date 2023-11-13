<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IncomingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nomor_agenda" => $this->faker->unique()->numberBetween(1, 10000),
            "tanggal_diterima" => $this->faker->date(),
            "nomor_surat" => "SRT" . $this->faker->randomNumber(4) . "/" . $this->faker->numberBetween(1, 12) . "/" . $this->faker->year(),
            "pengirim" => $this->faker->company(),
            "tanggal_surat" => $this->faker->date(),
            "perihal" => $this->faker->sentence(),
            "lokasi_berkas" => "Lemari 1",
            "url" => "dokumen/masuk/dummy.pdf",
            "tahun" => $this->faker->randomElement([2022, 2023])
        ];
    }
}
