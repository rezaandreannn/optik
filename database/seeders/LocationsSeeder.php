<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();

        foreach ($daftarProvinsi as $provinsi) {
            Province::create([
                'province_id' => $provinsi['province_id'],
                'title' => $provinsi['province']
            ]);

            $cities = RajaOngkir::kota()->dariProvinsi($provinsi['province_id'])->get();

            foreach ($cities as $city) {
                City::create([
                    'province_id' => $provinsi['province_id'],
                    'city_id' => $city['city_id'],
                    'title' => $city['city_name']
                ]);
            }
        }
    }
}
