<?php

namespace Tests\Unit;

use App\Models\Photo;
use App\Models\Garment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhotoModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_photo_factory_creates_valid_photo()
    {
        $photo = Photo::factory()->create();

        $this->assertInstanceOf(Photo::class, $photo);
        $this->assertNotNull($photo->garment_id);
        $this->assertNotNull($photo->image_url);
    }

    public function test_photo_belongs_to_garment()
    {
        $garment = Garment::factory()->create();
        $photo = Photo::factory()->create(['garment_id' => $garment->id]);

        $this->assertInstanceOf(Garment::class, $photo->garment);
        $this->assertEquals($garment->id, $photo->garment->id);
    }
}
