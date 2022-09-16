<x-app-layout title="Cetak">
    <div class="x_panel">
        <div class="x_title">
            <h2>Cetak</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" method="POST" action="{{ route('cetak.store') }}">
                @csrf


                {{-- inputan bulan --}}
                <div class="form-group">
                    <label for="bulan">Pilih Bulan<span class="text-danger">*</span></label>
                    <select name="bulan" id="bulan" class="form-control  @error('bulan') is-invalid @enderror"
                        name="bulan">
                        <option value=""> -- Pilih -- </option>
                        @foreach (App\Models\Order::BULAN as $bulan => $value)
                            @if (old('bulan') == $bulan)
                                <option value="{{ $bulan }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $bulan }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('bulan')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan bulan --}}

                {{-- inputan tahun --}}
                <div class="form-group">
                    <label for="tahun">Pilih tahun<span class="text-danger">*</span></label>
                    <select name="tahun" id="tahun" class="form-control  @error('tahun') is-invalid @enderror"
                        name="tahun">
                        <option value=""> -- Pilih -- </option>
                        @foreach (App\Models\Order::TAHUN as $tahun => $value)
                            @if (old('tahun') == $tahun)
                                <option value="{{ $tahun }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $tahun }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('tahun')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan bulan --}}




                <br />

                {{-- tombol --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
                {{-- end tombol --}}
            </form>
            <!-- end form for validations -->

        </div>
    </div>
    @push('scripts')
    @endpush
</x-app-layout>
