<?php

namespace Database\Seeders;

use App\Models\Public\ListPropinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Exception;

class ListPropinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $defaultList = [
                'Aceh',
                'Sumatera Utara',
                'Sumatera Barat',
                'Riau',
                'Kepulauan Riau',
                'Jambi',
                'Bangka Belitung',
                'Sumatera Selatan',
                'Lampung',
            ];

            foreach ($defaultList as $eachlist) {
                $check = ListPropinsi::where('nama_propinsi', $eachlist)->first();

                if (!$check) {
                    ListPropinsi::create([
                        'nama_propinsi' => $eachlist,
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
