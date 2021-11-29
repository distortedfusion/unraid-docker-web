<?php

namespace App;

use App\Facades\Docker;
use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;

class Container extends DataTransferObject
{
    public string $name;
    public bool $running;
    public bool $paused;
    public bool $updated;
    public bool $autostart;
    public string $cpuset;
    public string $icon;
    public ?string $url;
    public ?string $shell;
    public string $registry;
    public string $support;
    public string $project;
    public string $template;

    public function getIconUrl(): ?string
    {
        if (empty($this->icon)) {
            return null;
        }

        $filePath = 'images/'.Str::after($this->icon, 'images/');

        return Docker::storage()->has($filePath)
            ? Docker::storage()->url($filePath)
            : null;
    }
}
