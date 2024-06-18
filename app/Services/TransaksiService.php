<?php

namespace App\Services;

use App\Models\Tiket;
use App\Models\Transaksi;
use App\Repositories\Eloquent\TiketRepository;
use App\Repositories\Eloquent\TransaksiRepository;

/**
 * Class TransaksiService.
 */
class TransaksiService
{
    protected $transaksiRepository;
    protected $tiketRepository;

    public function __construct()
    {
        $this->transaksiRepository = new TransaksiRepository(new Transaksi());
        $this->tiketRepository = new TiketRepository(new Tiket());
    }

    public function getTransaksiAll()
    {
        return $this->transaksiRepository->getTransaksiAll();
    }

    public function getTransaksiByUuid($uuid)
    {
        return $this->transaksiRepository->getTransaksiByUuid($uuid);
    }

    public function getTransaksiWhere($column, $value)
    {
        return $this->transaksiRepository->getTransaksiWhere($column, $value);
    }

    public function createTransaksi($data)
    {
        $transaksi = $this->transaksiRepository->createTransaksi($data);

        foreach ($data['tiket'] as $tiket) {
            $transaksi->tiket()->attach($data['tiket_uuid'], [
                'jumlah' => $data['jumlah'],
                'transaksi_uuid' => $transaksi->uuid,
                'tiket_uuid' => $tiket
            ]);
        }

        return $transaksi;
    }

    public function updateTransaksi($data, $uuid)
    {
        return $this->transaksiRepository->updateTransaksi($data, $uuid);
    }

    public function deleteTransaksi($uuid)
    {
        return $this->transaksiRepository->deleteTransaksi($uuid);
    }
}
