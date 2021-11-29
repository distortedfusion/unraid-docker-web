<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public string $icon;
    public ?string $url;

    /**
     * Create a new component instance.
     *
     * @param string      $icon
     * @param string|null $url
     */
    public function __construct(string $icon, string $url = null)
    {
        $this->icon = $icon;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon');
    }
}
