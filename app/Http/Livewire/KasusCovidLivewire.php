<?php

namespace App\Http\Livewire;

use App\Models\GejalaCovid;
use App\Models\KategoriGejalaCovid;
use Livewire\Component;

class KasusCovidLivewire extends Component
{
    public $kategori_gejala_covid = [];

    public $banyak_gejala = [];
    public $gejala_covid = [];


    public function mount()
    {
        $this->kategori_gejala_covid = KategoriGejalaCovid::all();
        $this->gejala_covid = GejalaCovid::all();
        $this->banyak_gejala = [
            ['gejala_covid_id' => '']
        ];
    }

    public function tambahGejala()
    {
        $this->banyak_gejala[] = ['gejala_covid_id' => ''];
    }
    public function hapusGejala($index)
    {
        unset($this->banyak_gejala[$index]);
        $this->banyak_gejala = array_values($this->banyak_gejala);
    }
    public function render()
    {
        info($this->banyak_gejala);
        return view('livewire.kasus-covid-livewire');
    }
}
