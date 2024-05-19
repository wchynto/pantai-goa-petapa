<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TransaksiTiketTest extends TestCase
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
         * Asserts that the `transaksi_tikets` table has the specified columns.
         */
        $this->assertTrue(
            Schema::hasColumns('transaksi_tikets', [
                'uuid',
                'no_tiket',
                'jumlah_penumpang',
                'expire_in',
                'status',
                'transaksi_uuid',
                'tiket_uuid'
            ]),
        );
    }
}
