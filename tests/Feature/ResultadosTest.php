<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
class ResultadosTest extends TestCase
{
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

    public function test_as()
    {
       /*  $response = $this->get('/login'); */
        $user = user::find(14);
        $response = $this->actingAs($user)->get('get_cat_edi');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['id','name','id_user']
        ]);
        $response->assertJsonCount(14);
        /* $response->assertJsonStructure(['name' => 'Oficina']); */

    }


}
