<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public ?string $icon;

    /**
     * Create a new component instance.
     *
     * @param string|null $icon
     */
    public function __construct(string $icon = null)
    {
        $this->icon = $icon;
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
