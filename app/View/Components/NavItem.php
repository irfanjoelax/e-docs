<?php

namespace App\View\Components;

use App\Models\Klasifikasi;
use Illuminate\View\Component;

class NavItem extends Component
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
        $klasifikasis = Klasifikasi::all();

        return view('components.nav-item', [
            'klasifikasis' => $klasifikasis
        ]);
    }
}
