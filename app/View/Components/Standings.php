<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Standings extends Component
{
    public $teams; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->teams = $data; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.standings');
    }
}
