<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class App extends Component
{
    public ?string $title;

    /**
     * Create a new component instance.
     *
     * @param string|null $title
     */
    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.app');
    }
}
