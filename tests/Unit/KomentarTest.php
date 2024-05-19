<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class KomentarTest extends TestCase
{
    public function test_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('komentars', [
                'uuid',
                'body',
                'user_uuid',
                'postingan_uuid',
            ]),
        );
    }
}
