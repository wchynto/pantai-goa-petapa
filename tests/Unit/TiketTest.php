<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use App\Models\Pengunjung;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TiketTest extends TestCase
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
         * Asserts that the `tikets` table has the specified columns.
         */
        $this->assertTrue(
            Schema::hasColumns('tikets', [
                'uuid',
                'keterangan',
                'harga',
                'kendaraan_uuid',
            ]),
        );
    }

    /**
     * Test relationship with kendaraan.
     *
     * @return void
     */
    public function test_has_belongs_to_kendaraan(): void
    {
        /**
         * Create kendaraan
         *
         * @var Kendaraan
         */
        $kendaraan = Kendaraan::factory()->create();

        /**
         * Create tiket
         *
         * @var Tiket
         */
        $tiket = Tiket::factory()->create([
            'kendaraan_uuid' => $kendaraan->uuid
        ]);

        /**
         * Asset that the `kendaraan` property of the `$tiket` object is an instance of `Kendaraan`.
         *
         * @param mixed
         * @return void
         */
        $this->assertInstanceOf(Kendaraan::class, $tiket->kendaraan);

        /**
         * Asserts that the `uuid` property of the `kendaraan` property of the `$tiket` object is equal to the `uuid` property of the `$kendaraan` object.
         *
         * @param mixed
         * @return void
         */
        $this->assertEquals($tiket->kendaraan->uuid, $kendaraan->uuid);
    }

    /**
     * Test relationship with transaksi.
     *
     * @return void
     */
    public function test_has_many_to_many_transaksi(): void
    {
        /**
         * Create kendaraan
         *
         * @var Kendaraan
         */
        $kendaraan = Kendaraan::factory()->create();

        /**
         * Create tiket
         *
         * @var Tiket
         */
        $tiket = Tiket::factory()->create([
            'kendaraan_uuid' => $kendaraan->uuid
        ]);

        /**
         * Create pengunjung
         *
         * @var Pengunjung
         */
        $pegunjung = Pengunjung::factory()->create();

        /**
         * Create user
         *
         * @var User
         */
        $user = User::factory()->create([
            'pengunjung_uuid' => $pegunjung->uuid
        ]);

        /**
         * Create transaksi
         *
         * @var Transaksi
         */
        $transaksi = Transaksi::factory()->create([
            'total_harga' => 100000,
            'total_bayar' => 100000,
            'pengunjung_uuid' => $pegunjung->uuid
        ]);

        /**
         * Attach tiket to transaksi
         */
        $transaksi->tiket()->attach($tiket->uuid, [
            'jumlah_penumpang' => 1,
            'transaksi_uuid' => $transaksi->uuid,
            'tiket_uuid' => $tiket->uuid
        ]);

        /**
         * Asset that the `transaksi` property of the `$tiket` object is an instance of Collection.
         *
         * @param mixed
         * @return void
         */
        $this->assertInstanceOf(Collection::class, $tiket->transaksi);

        /**
         * Asserts that the `uuid` property of the `transaksi` property of the `$tiket` object is equal to the `uuid` property of the `$transaksi` object.
         *
         * @param mixed
         * @return void
         */
        $this->assertEquals($tiket->transaksi[0]->uuid, $transaksi->uuid);
    }
}
