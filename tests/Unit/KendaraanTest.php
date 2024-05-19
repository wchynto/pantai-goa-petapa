<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use App\Models\Tiket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test column in table.
     *
     * @return void
     */
    public function test_has_expected_columns(): void
    {
        /**
         * Asserts that the `kendaraans` table has the specified columns.
         */
        $this->assertTrue(
            Schema::hasColumns('kendaraans', [
                'uuid',
                'keterangan'
            ]),
        );
    }

    /**
     *  Test relationship with tiket.
     *
     *  @return void
     */
    public function test_has_one_to_many_tiket(): void
    {
        /**
         * Create kendaraan.
         *
         * @var Kendaraan
         */
        $kendaraan = Kendaraan::factory()->create();

        /**
         * Create tiket.
         *
         * @var Tiket
         */
        $tiket = Tiket::factory()->create([
            'kendaraan_uuid' => $kendaraan->uuid
        ]);

        /**
         * Asserts that the `tiket` property of the `$kendaraan` object is an instance of `Collection`.
         *
         * @param mixed
         * @return void
         */
        $this->assertInstanceOf(Collection::class, $kendaraan->tiket);

        /**
         * Asserts that the `uuid` property of the `$tiket` object is equal to the `uuid` property of the `$kendaraan->tiket->first()` object.
         *
         * @param mixed
         * @return void
         */
        $this->assertEquals($tiket->uuid, $kendaraan->tiket->first()->uuid);
    }
}
