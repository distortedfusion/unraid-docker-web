<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListItem extends Component
{
    public ?string $url;

    /**
     * Create a new component instance.
     *
     * @param string|null $url
     */
    public function __construct(string $url = null)
    {
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-item');
    }
}
