<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data[] = ['name' => 'Maszynki do włosów', 'slug' => 'maszynki-do-wlosow'];
        $data[] = ['name' => 'Golarki', 'slug' => 'golarki'];
        $data[] = ['name' => 'Trymery do brody', 'slug' => 'trymery-do-brody'];
        $data[] = ['name' => 'Zestawy do pielęgnacji osobistej', 'slug' => 'zestawy-do-pielegnacji-osobistej'];
        $data[] = ['name' => 'Trymery do ciała', 'slug' => 'trymery-do-ciala'];
        $data[] = ['name' => 'Trymery higieniczne', 'slug' => 'trymery-higieniczne'];
        $data[] = ['name' => 'Depilatory IPL', 'slug' => 'depilatory-ipl'];
        $data[] = ['name' => 'Szczoteczki do oczyszczania twarzy', 'slug' => 'szczoteczki-do-oczyszczania-twarzy'];
        $data[] = ['name' => 'Szczoteczki do zębów', 'slug' => 'szczoteczki-do-zebow'];

        Category::insert($data);
    }
}
