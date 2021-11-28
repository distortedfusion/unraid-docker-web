<?php

namespace App\Http\Livewire;

use App\Facades\Docker;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class Containers extends Component
{
    public Collection $availableContainers;

    public string $search = '';
    public bool $showAll = false;

    public function mount(): void
    {
        $this->availableContainers = Docker::containers();
    }

    public function render()
    {
        return view('livewire.containers', ['containers' => $this->filteredContainers()]);
    }

    /**
     * Get a collection of filtered containers.
     *
     * @return \Illuminate\Support\Collection
     */
    public function filteredContainers(): Collection
    {
        return $this->availableContainers
            ->filter(function ($container) {
                return $this->showAll || $container->running;
            })
            ->filter(function ($container) {
                if (empty($this->search)) {
                    return true;
                }

                return Str::containsInsensitive($container->name, $this->search);
            });
    }

    /**
     * Re-hydrate the available containers to ensure we're using the DTO classes.
     *
     * @param \Illuminate\Support\Collection $containers
     *
     * @return void
     */
    public function hydrateAvailableContainers(Collection $containers): void
    {
        $this->availableContainers = Docker::fromCollection($containers);
    }
}
