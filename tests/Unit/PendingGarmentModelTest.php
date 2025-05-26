<?php

namespace Tests\Unit;

use App\Models\PendingGarment;
use App\Models\User;
use App\Models\Garment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PendingGarmentModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_pending_garment_factory_creates_valid_record()
    {
        $pending = PendingGarment::factory()->create();

        $this->assertInstanceOf(PendingGarment::class, $pending);
        $this->assertNotNull($pending->user_id);
        $this->assertNotNull($pending->garment_id);
        $this->assertNotNull($pending->status);
        $this->assertNotNull($pending->submitted_at);
    }

    public function test_pending_garment_belongs_to_user()
    {
        $user = User::factory()->create();
        $pending = PendingGarment::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $pending->user);
        $this->assertEquals($user->id, $pending->user->id);
    }

    public function test_pending_garment_belongs_to_garment()
    {
        $garment = Garment::factory()->create();
        $pending = PendingGarment::factory()->create(['garment_id' => $garment->id]);

        $this->assertInstanceOf(Garment::class, $pending->garment);
        $this->assertEquals($garment->id, $pending->garment->id);
    }
}
