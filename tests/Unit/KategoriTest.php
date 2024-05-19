<?php

namespace Tests\Unit;

use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class KategoriTest extends TestCase
{
    public function test_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('kategoris', [
                'uuid',
                'keterangan',
            ]),
        );
    }

    public function test_has_one_to_many_postingan()
    {
        $kategori = Kategori::factory()->create();

        $postingan = Postingan::factory()->create([
            'kategori_uuid' => $kategori->uuid
        ]);

        $this->assertInstanceOf(Collection::class, $kategori->postingan);

        $this->assertEquals($kategori->uuid, $postingan->kategori_uuid);
    }
}
