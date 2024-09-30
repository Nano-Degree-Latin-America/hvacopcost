<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarcasTest extends TestCase
{

    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_traer_paises()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('edit_marcas/292');
        /* $response->assertRedirect(route('edit_marcas/292')); */
        $response->assertStatus(200);
    }


    public function test_traer_paises_vacio()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('edit_marcas/""'); //id_marca va vacio
        $response->assertStatus(500);
    }

    public function test_traer_paises_no_id_exist()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('edit_marcas/af24'); //id_marca no existe
        $response->assertStatus(500);
    }

    public function test_store_marca()
    {
        $user = user::find(14);
        $marca  = [
            'marca' => 'Subaru',
            'cUnidad' => 1,
        ];
        $response = $this->actingAs($user)->post('marcas',$marca);
        $response->assertStatus(302);
    }

    public function test_store_marca_null_vals()
    {
        $user = user::find(14);
        $marca  = [
            'marca' => null,
            'cUnidad' => null,
        ];
        $response = $this->actingAs($user)->post('marcas',$marca);
        $response->assertStatus(500);
    }

    public function test_store_marca_vacio_vals()
    {
        $user = user::find(14);
        $marca  = [
            'marca' => '',
            'cUnidad' => '',
        ];
        $response = $this->actingAs($user)->post('marcas',$marca);
        $response->assertStatus(500);
    }


    public function test_delete_marca()
    {
        $user = user::find(14);
        //$response = $this->actingAs($user)->get('delete_marcas/897');
        //$response->assertStatus(200);
    }

    public function test_delete_marca_no_id()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('delete_marcas/""'); //sin  id
        $response->assertStatus(500);
    }

    public function test_send_marcas()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('send_marcas');
        $response->assertStatus(200);
    }

    public function test_send_marcas_equipo()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('send_marcas_equipo/1');
        $response->assertJsonStructure([
            ['id','marca','equipo']
        ]);
        $response->assertStatus(200);
    }

    public function test_send_marcas_equipo_no_id()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('send_marcas_equipo/""');
        $response->assertJsonCount(0);
        $response->assertStatus(200);

    }

    public function test_send_modelos()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('send_modelos/1');
        $response->assertJsonStructure([
            ['id','modelo','eficiencia']
        ]);
        //$response->assertJsonCount(0);
        $response->assertStatus(200);

    }
    public function test_send_modelos_vacio()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('send_modelos/""');
/*         $response->assertJsonStructure([
            ['id','modelo','eficiencia']
        ]); */
        $response->assertJsonCount(0);
        $response->assertStatus(200);

    }

    public function test_check_marca()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('check_marca/298');
/*         $response->assertJsonStructure([
            ['id','marca','equipo']
        ]); */
        $response->assertStatus(200);

    }

}
