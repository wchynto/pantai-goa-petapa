<?php

namespace Tests\Unit;

use App\Models\Guest;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GuestTest extends TestCase
{
    public function test_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('guests', [
                'uuid',
                'no_telpon',
                'pengunjung_uuid',
            ]),
        );
    }

    public function test_has_belongs_to_pengunjung(): void
    {
        $pengunjung = Pengunjung::factory()->create();

        $guest = Guest::factory()->create([
            'pengunjung_uuid' => $pengunjung->uuid
        ]);

        $this->assertInstanceOf(Pengunjung::class, $guest->pengunjung);

        $this->assertEquals($pengunjung->uuid, $guest->pengunjung_uuid);
    }
}
