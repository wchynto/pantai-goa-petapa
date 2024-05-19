<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use App\Models\Pengunjung;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TransaksiTest extends TestCase
{
    /**
     * Test column in table.
     *
     */
    public function test_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('transaksis', [
                'uuid',
                'no_transaksi',
                'total_harga',
                'total_bayar',
                'tanggal_transaksi',
                'snap_token',
                'status',
                'pengunjung_uuid',
            ]),
        );
    }

    /**
     * Test relationship with tiket.
     *
     * @return void
     */
    public function test_has_many_to_many_tiket(): void
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

    /**
     * Test relationship with pengunjung.
     *
     * @return void
     */
    public function test_has_belongs_to_pengunjung(): void
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
        $this->assertInstanceOf(Pengunjung::class, $transaksi->pengunjung);

        /**
         * Asserts that the `uuid` property of the `transaksi` property of the `$tiket` object is equal to the `uuid` property of the `$transaksi` object.
         *
         * @param mixed
         * @return void
         */
        $this->assertEquals($pegunjung->uuid, $transaksi->pengunjung->uuid);
    }
}
