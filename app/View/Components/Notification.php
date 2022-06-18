<?php

namespace App\View\Components;

use App\Models\SuratMasuk;
use Illuminate\View\Component;

class Notification extends Component
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

        $suratMasuks = SuratMasuk::where('dibaca', 'no')->limit(5)->latest()->get();

        $cekBaca = $suratMasuks->contains('dibaca', 'no');

        return view('components.notification', [
            'suratMasuks' => $suratMasuks,
            'cekBaca' => $cekBaca
        ]);
    }
}
