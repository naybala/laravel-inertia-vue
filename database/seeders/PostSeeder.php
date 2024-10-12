<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = $this->prepareData();
        DB::table('/posts')->insert($data);
    }

    private function prepareData()
    {
        $insertData = [];
        foreach (range(1, 20) as $a) {
            $insertData[] = [
                'title' => 'Test Post - ' . $a,
                'body' => 'Test Post Body - ' . $a,
            ];
        };
        return $insertData;
    }
}
