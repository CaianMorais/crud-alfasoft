<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ContactValidationTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_name_must_be_greater_than_5_characters()
    {
        # simula o login de admin pra ter permissao
        $admin = User::factory()->create(['email' => 'admin@admin.com']);
        
        $response = $this->actingAs($admin)->post(route('contacts.store'), [
            'name' => 'test', // nome mt curto
            'contact' => '123456789',
            'email' => 'teste-silva@gmail.com'
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    public function test_contact_must_have_9_numbers()
    {
        $admin = User::factory()->create(['email' => 'admin@admin.com']);

        $response10Numbers = $this->actingAs($admin)->post(route('contacts.store'), [
            'name' => 'João Silva',
            'contact' => '1234567890', // contato maior que 9 caracteres
            'email' => 'teste-silva@gmail.com'
        ]);

        $response10Numbers->assertSessionHasErrors(['contact']);

        $response8Numbers = $this->actingAs($admin)->post(route('contacts.store'), [
            'name' => 'João Silva',
            'contact' => '12345678', // contato menor que 9 caracteres
            'email' => 'teste-silva@gmail.com'
        ]);

        $response8Numbers->assertSessionHasErrors(['contact']);
    }

    public function test_email_must_be_valid()
    {
        $admin = User::factory()->create(['email' => 'admin@admin.com']);

        $response = $this->actingAs($admin)->post(route('contacts.store'), [
            'name' => 'Teste da Silva',
            'contact' => '123456789',
            'email' => 'teste-silva' // email invalido
        ]);

        $response->assertSessionHasErrors(['email']);
    }
}
