<?php

namespace App\Services;

use App\Models\Transaksi;
use App\Repositories\Eloquent\TransaksiRepository;

/**
 * Class TransaksiService.
 */
class TransaksiService
{
    protected $transaksiRepository;

    public function __construct()
    {
        $this->transaksiRepository = new TransaksiRepository(new Transaksi());
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
        return $this->transaksiRepository->createTransaksi($data);
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
