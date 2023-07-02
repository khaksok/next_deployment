<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [];
        foreach(range(1, 50) as $index){
            $contact=[
                'first_name' => 'First name' . $index,
                'last_name' => 'Last name' . $index,
                'phone' => 'Phone' . $index,
                'email' => 'email' . $index,
                'address' => 'Address' . $index,
                'company_id' => 1
                
            ];
            $contacts[] = $contact;
        }
        // DB::table('contacts')->truncate();
        DB::table('contacts')->insert($contacts);
    }
}
