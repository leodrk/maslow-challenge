<?php

namespace Controller;

use App\Models\Benefit;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BenefitControllerTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    private User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }


    public function testIndex()
    {
        $this->actingAs($this->user)
            ->get('/api/benefit')
            ->assertStatus(200);
    }

    public function testStore()
    {
        $this->actingAs($this->user)
            ->post('/api/benefit', Benefit::factory()->create()->toArray())
            ->assertStatus(200);
    }

    public function testShow()
    {
        $this->actingAs($this->user)
            ->get('/api/benefit/{benefit}', Benefit::factory()->create()->toArray())
            ->assertStatus(200);
    }

    public function testUpdate()
    {
        $benefit = Benefit::factory()->create();
        $this->actingAs($this->user)
            ->put("/api/benefit/{$benefit->id}", ['name' => 'test2'])
            ->assertStatus(200);
    }

    public function testDestroy()
    {
        $benefit = Benefit::factory()->create();
        $this->actingAs($this->user)
            ->delete("/api/benefit/{$benefit->id}")
            ->assertStatus(200);
    }
}
