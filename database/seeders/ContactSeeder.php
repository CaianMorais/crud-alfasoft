<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Caian Quirino',
            'contact' => '993671420',
            'email' => 'caianqm@gmail.com',
        ]);
        Contact::create([
            'name' => 'Contato Teste da Silva',
            'contact' => '999999999',
            'email' => 'testedasilva@gmail.com',
        ]);
    }
}
