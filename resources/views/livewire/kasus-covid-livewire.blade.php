<div>
    <form action="{{ route('kasus-covid.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="kategori_gejala_id">Kategori Covid</label>
            <select name="kategori_gejala_id" required class=" form-control">
                <option value="">Pilih Kategori Gejala Covid</option>
                @foreach ($kategori_gejala_covid as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" hidden>
            <label class="font-weight-bold" for="persentase_kecocokan">Persentase Kecocokan</label>
            <input type="text" class="form-control" name="persentase_kecocokan" value="100">
        </div>

        <button class="btn btn-secondary mt-3 mb-2" wire:click.prevent="tambahGejala">
            <i class="fa fa-plus"></i><span> Tambah Gejala</span>
        </button>

        <table class="table table-borderless" id="tabel_gejala">
            <thead>
                <tr>
                    <th width="95%">Gejala</th>
                    <th width="5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banyak_gejala as $index =>$banyak)
                <tr>
                    <td>
                        <select name="banyak[{{$index}}][gejala_covid_id]"
                                            wire:model="banyak_gejala.{{$index}}.gejala_covid_id"
                                            class="form-control">
                            <option value="">Pilih Gejala Covid</option>
                            @foreach ($gejala_covid as $gejala)
                                <option value="{{ $gejala->id }}">{{ $gejala->gejala }}</option>
                            @endforeach
                        </select>
                    </td>
                    

                    <td>
                        <a href="#" wire:click.prevent="hapusGejala({{$index}})" class="btn btn-danger btn-block"><span class="fa fa-trash-alt"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {{-- <div class="form-group">
            <div class="row">
                <div class="col-11">
                    <select  name="gejala_covid_id" required class="form-control">

                        <select name="banyakGejala[{{$index}}][gejala_covid_id]"
                                        wire:model="kasusBanyakGejala.{{$index}}.gejala_covid_id"
                                        class="form-control">
                        <option value="">Pilih Gejala Covid</option>
                        @foreach ($gejala_covid as $gejala)
                            <option value="{{ $gejala->id }}">{{ $gejala->gejala }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <button class="btn btn-danger btn-block">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        

        <button type="submit" class="btn btn-primary btn-block">
            Simpan
        </button>
    </form>
</div>
