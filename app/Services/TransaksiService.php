<?php

namespace App\Services;

use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\TransaksiTiket;
use App\Repositories\Eloquent\TiketRepository;
use App\Repositories\Eloquent\TransaksiRepository;
use App\Repositories\Eloquent\TransaksiTiketRepository;

/**
 * Class TransaksiService.
 */
class TransaksiService
{
  protected $transaksiRepository;
  protected $tiketRepository;
  protected $transaksiTiketRepository;

  public function __construct()
  {
    $this->transaksiRepository = new TransaksiRepository(new Transaksi());
    $this->tiketRepository = new TiketRepository(new Tiket());
    $this->transaksiTiketRepository = new TransaksiTiketRepository(new TransaksiTiket());
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
    $total_harga = 0;

    for ($i = 0; $i < count($data['tiket']); $i++) {
      $tiket = $this->tiketRepository->getTiketByUuid($data['tiket'][$i]);
      $total_harga += $tiket->harga * $data['jumlah'][$i];
    }

    $data['total_harga'] = $total_harga;
    $data['tanggal_transaksi'] = now();

    $transaksi = $this->transaksiRepository->createTransaksi($data);

    for ($i = 0; $i < count($data['tiket']); $i++) {
      $transaksi->tiket()->attach($data['tiket'][$i], [
        'jumlah' => $data['jumlah'][$i],
        'transaksi_uuid' => $transaksi->uuid,
        'tiket_uuid' => $data['tiket'][$i]
      ]);
    }

    return $transaksi;
  }

  public function updateTransaksi($data, $uuid)
  {
    $total_harga = 0;

    for ($i = 0; $i < count($data['tiket']); $i++) {
      $tiket = $this->tiketRepository->getTiketByUuid($data['tiket'][$i]);
      $total_harga += $tiket->harga * $data['jumlah'][$i];
    }

    $data['total_harga'] = $total_harga;
    $data['tanggal_transaksi'] = now();

    $transaksi = $this->transaksiRepository->getTransaksiByUuid($uuid);
    $transaksiTiket = $this->transaksiTiketRepository->getTransaksiTiketWhere('transaksi_uuid', $transaksi->uuid);

    for ($i = 0; $i < count($data['tiket']); $i++) {
      $this->transaksiTiketRepository->updateTransaksiTiket([
        'jumlah' => $data['jumlah'][$i],
        'transaksi_uuid' => $transaksi->uuid,
        'tiket_uuid' => $data['tiket'][$i]
      ], $transaksiTiket[$i]->uuid);
    }

    return $this->transaksiRepository->updateTransaksi($data, $uuid);
  }

  public function deleteTransaksi($uuid)
  {
    $transaksi = $this->transaksiRepository->getTransaksiByUuid($uuid);
    $transaksiTiket = $this->transaksiTiketRepository->getTransaksiTiketWhere('transaksi_uuid', $transaksi->uuid);
    foreach ($transaksiTiket as $item) {
      $this->transaksiTiketRepository->deleteTransaksiTiket($item->uuid);
    }
    return $this->transaksiRepository->deleteTransaksi($uuid);
  }
}
