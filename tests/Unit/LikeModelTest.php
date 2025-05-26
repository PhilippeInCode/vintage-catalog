<?php

namespace Tests\Unit;

use App\Models\Like;
use App\Models\User;
use App\Models\Garment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_like_factory_creates_valid_like()
    {
        $user = User::factory()->create();
        $garment = Garment::factory()->create();

        $like = Like::factory()->create([
            'user_id' => $user->id,
            'garment_id' => $garment->id,
        ]);

        $this->assertInstanceOf(Like::class, $like);
        $this->assertEquals($user->id, $like->user_id);
        $this->assertEquals($garment->id, $like->garment_id);
    }

    public function test_like_belongs_to_user()
    {
        $user = User::factory()->create();
        $like = Like::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $like->user);
        $this->assertEquals($user->id, $like->user->id);
    }

    public function test_like_belongs_to_garment()
    {
        $garment = Garment::factory()->create();
        $like = Like::factory()->create(['garment_id' => $garment->id]);

        $this->assertInstanceOf(Garment::class, $like->garment);
        $this->assertEquals($garment->id, $like->garment->id);
    }
}
