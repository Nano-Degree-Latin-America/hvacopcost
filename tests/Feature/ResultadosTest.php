<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\User;
class ResultadosTest extends TestCase
{

    use WithoutMiddleware;
    /* $this->withoutMiddleware(); */
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/login');
/*        $response = $this->post(route('login'), [
        'email' => 'daniel24992@gmail.com',
        'password' => '12345678'
    ]);
    $response->assertRedirect(route('home')); */

    }

    public function test_traer_categoria_edificio()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('get_cat_edi');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['id','name','id_user']
        ]);
        $response->assertJsonCount(14);
        /* $response->assertJsonStructure(['name' => 'Oficina']); */
    }

    public function test_traer_tipo_edificio()
    {
        $user = user::find(14);
        $response = $this->actingAs($user)->get('get_cat_edi/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['id','name']
        ]);
        $response->assertJsonCount(3);
        /* $response->assertJsonStructure(['name' => 'Oficina']); */

    }


    public function test_traer_paises()
    {

        $user = user::find(14);
        $response = $this->actingAs($user)->post('getPaises');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['idPais','pais']
        ]);

    }

    public function test_traer_ciudades()
    {
        $id_ciudad = 17;
        $user = user::find(14);
        $response = $this->actingAs($user)->post('getCiudades',['id_ciudad'=>$id_ciudad]);
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_cap_op_1_retro()
    {
        $id_ciudad = 321;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_1_retro/321');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_cap_op_3_retro()
    {
        $id_ciudad = 321;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_3_retro/321');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_cap_op_5_retro()
    {
        $id_ciudad = 321;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_5_retro/321');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_cap_op_10_retro()
    {
        $id_ciudad = 321;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_10_retro/321');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_cap_op_3()
    {
        $id_ciudad = 323;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_3/323');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }


    public function test_cap_op_5()
    {
        $id_ciudad = 323;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_5/323');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_cap_op_10()
    {
        $id_ciudad = 323;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_10/323');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_cap_op_15()
    {
        $id_ciudad = 323;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('cap_op_15/323');
        $response->assertStatus(200);
/*         $response->assertJsonStructure([
            ['idCiudad','ciudad']
        ]); */

    }

    public function test_roi_s_ene()
    {
        $id_ciudad = 323;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('roi_s_ene/323/7137.0468/121214/0/45542');
        $response->assertJsonCount(3);
        $response->assertStatus(200);

    }

    public function test_roi_ene_prod()
    {
        $id_ciudad = 323;
        $user = user::find(14);
        $response = $this->actingAs($user)->get('roi_ene_prod/323/7137.0468/121214/50000/0/0/45542/0');
        $response->assertJsonCount(3);
        $response->assertStatus(200);
    }
}
