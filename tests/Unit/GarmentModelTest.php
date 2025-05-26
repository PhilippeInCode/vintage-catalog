<?php

namespace Tests\Unit;

use App\Models\Garment;
use App\Models\Like;
use App\Models\PendingGarment;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GarmentModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_garment_with_fillable_attributes()
    {
        $data = [
            'name' => 'Test Garment',
            'description' => 'Desc',
            'origin_country' => 'España',
            'production_year' => 1985,
            'production_period' => '80s',
            'usage_type' => 'military',
            'usage_year' => 1990,
            'used_country' => 'Francia',
            'materials' => 'Algodón'
        ];

        $garment = Garment::create($data);

        $this->assertDatabaseHas('garments', ['name' => 'Test Garment']);
    }

    public function test_photos_relationship()
    {
        $garment = Garment::factory()->create();
        $garment->photos()->create(['image_url' => 'test.jpg']);

        $this->assertCount(1, $garment->photos);
        $this->assertEquals('test.jpg', $garment->photos->first()->image_url);
    }

    public function test_likes_relationship()
    {
        $garment = Garment::factory()->create();
        $garment->likes()->create(['user_id' => User::factory()->create()->id]);

        $this->assertCount(1, $garment->likes);
    }

    public function test_users_who_liked_relationship()
    {
        $garment = Garment::factory()->create();
        $user = User::factory()->create();

        $garment->usersWhoLiked()->attach($user->id);

        $this->assertTrue($garment->usersWhoLiked->contains($user));
    }

    public function test_private_users_relationship()
    {
        $garment = Garment::factory()->create();
        $user = User::factory()->create();

        $garment->privateUsers()->attach($user->id);

        $this->assertTrue($garment->privateUsers->contains($user));
    }

    public function test_pending_entries_relationship()
    {
        $garment = Garment::factory()->create();
        $garment->pendingEntries()->create([
            'user_id' => User::factory()->create()->id,
            'status' => 'pending'
        ]);

        $this->assertCount(1, $garment->pendingEntries);
    }
}
