<?php

namespace App\Services;

use App\Models\Tiket;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Eloquent\TiketRepository;

/**
 * Class TiketService.
 */
class TiketService
{
  protected $tiketRepository;

  public function __construct()
  {
    $this->tiketRepository = new TiketRepository(new Tiket());
  }

  public function getTiketAll()
  {
    return $this->tiketRepository->getTiketAll();
  }

  public function getTiketByUuid($uuid)
  {
    return $this->tiketRepository->getTiketByUuid($uuid);
  }

  public function getTiketWhere($column, $value)
  {
    return $this->tiketRepository->getTiketWhere($column, $value);
  }

  public function createTiket($data)
  {
    if ($data['thumbnail']) {
      $thumbnail = $data['thumbnail'];
      $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
      $path = Storage::putFileAs('public/images/tiket/thumbnails', $thumbnail, $thumbnailName);
      $data['thumbnail'] = $path;
    }
    return $this->tiketRepository->createTiket($data);
  }

  public function updateTiket($data, $uuid, $updateThumbnail)
  {
    $tiket = $this->tiketRepository->getTiketByUuid($uuid);
    if ($updateThumbnail) {
      if ($tiket->thumbnail) {
        Storage::delete($tiket->thumbnail);
      }
      $thumbnail = $data['thumbnail'];
      $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
      $path = Storage::putFileAs('public/images/tiket/thumbnails', $thumbnail, $thumbnailName);
      $data['thumbnail'] = $path;
    }

    return $this->tiketRepository->updateTiket($data, $uuid);
  }

  public function deleteTiket($uuid)
  {
    Storage::delete($this->tiketRepository->getTiketByUuid($uuid)->thumbnail);
    return $this->tiketRepository->deleteTiket($uuid);
  }
}
