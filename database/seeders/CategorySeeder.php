<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = $this->prepareData();
        DB::table('categories')->insert($data);
    }

    private function prepareData()
    {
        $insertData = [];
        foreach (range(1, 20) as $a) {
            $insertData[] = [
                'name' => 'Test Category - ' . $a,
                'image' => "https://imgs.search.brave.com/GoIkknrD1Lu77CnsddP802iVtMnTp63Rc0_flJD8xq8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9sYXJh/dmVsLmlvL2ltYWdl/cy9sYXJhdmVsLnBu/Zw",
                'description' => 'Test Description - ' . $a,
            ];
        };
        return $insertData;
    }
}
