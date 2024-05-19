<?php

namespace Tests\Unit;

use App\Models\MediaSosial;
use App\Models\Profil;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MediaSosialTest extends TestCase
{
    public function test_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('media_sosials', [
                'uuid',
                'keterangan',
            ]),
        );
    }

    public function test_has_many_to_many_profil(): void
    {
        $mediaSosial = MediaSosial::factory()->create();

        $profil = Profil::factory()->create();

        $mediaSosial->profil()->attach(
            $profil->uuid,
            [
                'keterangan' => 'www.instagram.com/instagram',
                'profil_uuid' => $profil->uuid,
                'media_sosial_uuid' => $mediaSosial->uuid
            ]
        );

        $this->assertInstanceOf(Collection::class, $mediaSosial->profil);

        $this->assertInstanceOf(Profil::class, $mediaSosial->profil->first());
    }
}
