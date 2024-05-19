<?php

namespace Tests\Unit;

use App\Models\Guest;
use App\Models\Pengunjung;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PengunjungTest extends TestCase
{
    public function test_has_expected_columns(): void
    {
        $this->assertTrue(Schema::hasColumns('pengunjungs', [
            'uuid',
            'nama',
        ]));
    }

    public function test_has_one_to_many_user(): void
    {
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

        $this->assertInstanceOf(User::class, $pegunjung->user);

        $this->assertEquals($pegunjung->uuid, $user->pengunjung_uuid);
    }

    public function test_has_one_to_many_guest(): void
    {
        /**
         * Create pengunjung
         *
         * @var Pengunjung
         */
        $pegunjung = Pengunjung::factory()->create();

        /**
         * Create guest
         *
         * @var Guest
         */
        $guest = Guest::factory()->create([
            'pengunjung_uuid' => $pegunjung->uuid
        ]);

        $this->assertInstanceOf(Guest::class, $pegunjung->guest);

        $this->assertEquals($pegunjung->uuid, $guest->pengunjung_uuid);
    }

    public function test_has_one_to_many_transaksi(): void
    {
        /**
         * Create pengunjung
         *
         * @var Pengunjung
         */
        $pegunjung = Pengunjung::factory()->create();

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

        $this->assertInstanceOf(Collection::class, $pegunjung->transaksi);

        $this->assertEquals($pegunjung->uuid, $transaksi->pengunjung_uuid);
    }
}
