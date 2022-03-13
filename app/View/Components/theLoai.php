<?php

namespace App\View\Components;

use App\Models\categoryModels;
use Illuminate\View\Component;

class theLoai extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = categoryModels::all();
        return view('components.the-loai')->with('data', $data);
    }
}
