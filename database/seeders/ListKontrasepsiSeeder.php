<?php

namespace Database\Seeders;

use App\Models\Public\ListKontrasepsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Exception;

class ListKontrasepsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $defaultList = [
                'Pil',
                'Kondom',
                'IUD',
            ];

            foreach ($defaultList as $eachlist) {
                $check = ListKontrasepsi::where('nama_kontrasepsi', $eachlist)->first();

                if (!$check) {
                    ListKontrasepsi::create([
                        'nama_kontrasepsi' => $eachlist,
                    ]);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
