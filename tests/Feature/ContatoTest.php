<?php

namespace Tests\Feature;

use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContatoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Teste para verificar se a página de listagem de contatos é exibida corretamente.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('contatos.index'));
        $response->assertStatus(200);
    }

    /**
     * Teste para verificar se a página de criação de contatos é exibida corretamente.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->get(route('contatos.create'));
        $response->assertStatus(200);
    }

    /**
     * Teste para verificar se a página de edição de contatos é exibida corretamente.
     *
     * @return void
     */
    public function testEdit()
    {
        $contato = Contato::factory()->create();

        $response = $this->get(route('contatos.edit', $contato));
        $response->assertStatus(200);
    }

    /**
     * Teste para verificar se o contato é salvo corretamente.
     *
     * @return void
     */
    public function testStore()
    {
        $contato = Contato::factory()->make();

        $response = $this->post(route('contatos.store'), [
            'nome' => $contato->nome,
            'email' => $contato->email,
            'data_nascimento' => $contato->data_nascimento,
            'cpf' => $contato->cpf,
            'telefones' => [
                [
                    'tipo' => 'Celular',
                    'numero' => '999999999',
                ],
                [
                    'tipo' => 'Trabalho',
                    'numero' => '888888888',
                ],
            ],
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contatos', [
            'nome' => $contato->nome,
            'email' => $contato->email,
            'data_nascimento' => $contato->data_nascimento,
            'cpf' => $contato->cpf,
        ]);
        $this->assertDatabaseHas('telefones', [
            'tipo' => 'Celular',
            'numero' => '999999999',
        ]);
        $this->assertDatabaseHas('telefones', [
            'tipo' => 'Trabalho',
            'numero' => '888888888',
        ]);
    }

    /**
     * Teste para verificar se o contato é atualizado corretamente.
     *
     * @return void
     */
    public function testUpdate()
    {
        $contato = Contato::factory()->create();

        $response = $this->put(route('contatos.update', $contato), [
            'nome' => 'Novo Nome',
            'email' => $contato->email,
            'data_nascimento' => $contato->data_nascimento,
            'cpf' => $contato->cpf,
            'telefones' => [
                [
                    'tipo' => 'Celular',
                    'numero' => '999999999',
                ],
                [
                    'tipo' => 'Trabalho'
                ],
            ]
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('contatos', [
            'id' => $contato->id,
            'nome' => 'Novo Nome',
            'email' => $contato->email,
            'data_nascimento' => $contato->data_nascimento,
            'cpf' => $contato->cpf,
        ]);
        $this->assertDatabaseHas('telefones', [
            'contato_id' => $contato->id,
            'tipo' => 'Celular',
            'numero' => '999999999',
        ]);
        $this->assertDatabaseMissing('telefones', [
            'contato_id' => $contato->id,
            'tipo' => 'Trabalho',
            'numero' => '888888888',
        ]);
    }

    /**
     * Teste para verificar se o contato é excluído corretamente.
     *
     * @return void
     */
    public function testDestroy()
    {
        $contato = Contato::factory()->create();

        $response = $this->delete(route('contatos.destroy', $contato));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('contatos', ['id' => $contato->id]);
    }
}
