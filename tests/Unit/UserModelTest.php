<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Like;
use App\Models\Garment;
use App\Models\PendingGarment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_factory_creates_valid_user()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(User::class, $user);
        $this->assertNotNull($user->email);
    }

    public function test_user_has_likes_relationship()
    {
        $user = User::factory()->create();
        $like = Like::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->likes->contains($like));
    }

    public function test_user_has_private_catalog_relationship()
    {
        $user = User::factory()->create();
        $garment = Garment::factory()->create();

        $user->privateCatalog()->attach($garment->id);

        $this->assertTrue($user->privateCatalog->contains($garment));
    }

    public function test_user_has_pending_garments_relationship()
    {
        $user = User::factory()->create();
        $pending = PendingGarment::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->pendingGarments->contains($pending));
    }

    public function test_user_casts_and_hidden_attributes()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $user->email_verified_at);
        $this->assertArrayNotHasKey('password', $user->toArray());
        $this->assertArrayNotHasKey('remember_token', $user->toArray());
    }
}
