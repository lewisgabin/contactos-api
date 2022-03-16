<?php

namespace Tests\Feature;

use App\Models\Contacto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactosEndpointTest extends TestCase
{
    use WithFaker;
    /** @test */
    public function test_contactos_crear_endpoint()
    {
        $payload = [
            'nombre' => $this->faker->name(),
            'apellidos' =>  $this->faker->lastName(),
            'telefonos' => array($this->faker->phoneNumber(), $this->faker->phoneNumber()),
            'direcciones' => array($this->faker->address(), $this->faker->address()),
        ];

        $response = $this->post('/api/contacto/crear', $payload)->assertStatus(201);
    }

    public function test_contactos_listar_endpoint()
    {
        $contacto = Contacto::orderBy('id', 'desc')->first();

        //buscar por nombre
        $payload = [
            'valor' =>  $contacto->nombre,
        ];

        $response = $this->post('/api/contacto/listar', $payload)->assertStatus(200);

        //buscar por apellidos
        $payload = [
            'valor' =>  $contacto->apellidos,
        ];

        $response = $this->post('/api/contacto/listar', $payload)->assertStatus(200);

        //buscar por telefonos
        $payload = [
            'valor' =>  '809-298-5056',
        ];

        $response = $this->post('/api/contacto/listar', $payload)->assertStatus(200);
    }
}
