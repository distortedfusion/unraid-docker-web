<?php

namespace App\View\Components;

use ProtoneMedia\LaravelFormComponents\Components\FormCheckbox;

class Toggle extends FormCheckbox
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toggle');
    }
}
