<?php

namespace App;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Docker
{
    const FILENAME = 'docker.json';

    /**
     * Get all processed containers.
     *
     * @return \Illuminate\Support\Collection
     */
    public function containers(): Collection
    {
        return collect(Container::arrayOf($this->getProcessedData()));
    }

    /**
     * Get a fresh collection of containers from a collection.
     *
     * @param \Illuminate\Support\Collection $containers
     *
     * @return \Illuminate\Support\Collection
     */
    public function fromCollection(Collection $containers): Collection
    {
        return collect(Container::arrayOf($containers->all()));
    }

    /**
     * Get the processed data which can be used in the DTO class.
     *
     * @return array
     */
    protected function getProcessedData(): array
    {
        $data = json_decode($this->storage()->get(self::FILENAME), true);

        return collect($data)->map(function ($data, $key) {
            return collect(array_merge([
                'name' => $key,
            ], $data))->mapWithKeys(function ($value, $key) {
                return [Str::lower($key) => $value];
            })->toArray();
        })->values()->all();
    }

    /**
     * Get the storage disk where the raw JSON is located.
     *
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    public function storage(): Filesystem
    {
        return Storage::disk('data');
    }
}
