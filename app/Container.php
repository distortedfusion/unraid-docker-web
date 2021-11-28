<?php

namespace App;

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
}
