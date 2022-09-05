<x-app-layout title="Edit-Produk">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Produk</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" method="POST" action="{{ route('product.update', $product->id) }}"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                {{-- inputan name --}}
                <div class="form-group">
                    <label for="name">Nama Produk<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name', $product->name) }}" />
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan name --}}

                {{-- inputan category --}}
                <div class="form-group">
                    <label for="category_id">Kategori<span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id"
                        class="form-control  @error('category_id') is-invalid @enderror" name="category_id">
                        <option value=""> -- Pilih -- </option>
                        @foreach (App\Models\Category::all() as $category)
                            @if (old('category_id', $product->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan category --}}


                {{-- inputan photo --}}
                <div class="form-group mt-2">
                    <label for="image">Gambar<span class="text-danger">*</span></label>
                    {{-- cek apakah gambar ada --}}
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" class="img-preview mb-2 d-block"
                            style="width: 300px">
                    @else
                        <img class="img-preview mb-2" style="width: 300px">
                    @endif
                    <input type="hidden" value="{{ $product->photo }}" name="oldImage">
                    <img class="img-preview mb-2" style="width: 300px">
                    <input class="d-block @error('photo') is-invalid @enderror" type="file" id="image"
                        name="photo" onchange="Live()">
                </div>
                {{-- end inputan photo --}}


                {{-- inputan qty --}}
                <div class="form-group">
                    <label for="qty">Jumlah<span class="text-danger">*</span></label>
                    <input type="number" id="qty" class="form-control @error('qty') is-invalid @enderror"
                        name="qty" value="{{ old('qty', $product->qty) }}" />
                    @error('qty')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan qty --}}

                {{-- inputan price --}}
                <div class="form-group">
                    <label for="price">Harga<span class="text-danger">*</span></label>
                    <input type="number" id="price" class="form-control @error('price') is-invalid @enderror"
                        name="price" value="{{ old('price', $product->price) }}" />
                    @error('price')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan qty --}}

                {{-- description --}}
                <div class="form-group">
                    <label for="description" class="mt-2">Deskripsi<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        rows="3">{{ old('description', $product->description) }}</textarea>
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
