<x-app-layout title="Tambah-kategori">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Kategori</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- inputan name --}}
                <div class="form-group">
                    <label for="name">name<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan name --}}


                {{-- inputan photo --}}
                <div class="form-group mt-2">
                    <label for="image">Photo<span class="text-danger">*</span></label>
                    <img class="img-preview mb-2" style="width: 300px">
                    <input class="d-block @error('photo') is-invalid @enderror" type="file" id="image"
                        name="photo" onchange="Live()">
                </div>
                {{-- end inputan photo --}}


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
                <a href="{{ route('category.index') }}" class="btn btn-danger">Kembali</a>
                {{-- end tombol --}}
            </form>
            <!-- end form for validations -->

        </div>
    </div>
    @push('scripts')
    @endpush
</x-app-layout>
