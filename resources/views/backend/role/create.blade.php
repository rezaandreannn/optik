<x-app-layout title="Tambah-role">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Role</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" method="POST" action="{{ route('role.store') }}">
                @csrf
                {{-- inputan name --}}
                <div class="form-group">
                    <label for="name">Nama Role<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan name --}}


                {{-- description --}}
                <div class="form-group">
                    <label for="description" class="mt-2">Deskripsi<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        rows="3"></textarea>
                    @error('description')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end description --}}


                <br />

                {{-- tombol --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Kembali</a>
                {{-- end tombol --}}
            </form>
            <!-- end form for validations -->

        </div>
    </div>
    @push('scripts')
    @endpush
</x-app-layout>
