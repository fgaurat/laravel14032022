<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Hello extends Component
{

    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        Log::info($name);
        // $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hello');
    }
}
