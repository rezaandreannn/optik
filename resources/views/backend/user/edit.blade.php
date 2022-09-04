<x-app-layout title="Edit-user">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" method="POST" action="{{ route('user.update', $user->id) }}">
                @method('PATCH')
                @csrf
                {{-- inputan name --}}
                <div class="form-group">
                    <label for="name">Nama User<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name', $user->name) }}" />
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan name --}}

                {{-- inputan role --}}
                <div class="form-group">
                    <label for="role_id">Role<span class="text-danger">*</span></label>
                    <select name="role_id" id="role_id" class="form-control  @error('role_id') is-invalid @enderror"
                        name="role_id">
                        <option value=""> -- Pilih -- </option>
                        @foreach (App\Models\Role::all() as $role)
                            @if (old('role_id', $user->role_id) == $role->id)
                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan role --}}


                {{-- inputan email --}}
                <div class="form-group">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email', $user->email) }}" disabled />
                    @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan email --}}

                {{-- inputan password --}}
                <div class="form-group">
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="{{ old('password') }}" />
                    @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- end inputan password --}}

                {{-- inputan password_confirmation --}}
                {{-- <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password<span class="text-danger">*</span></label>
                    <input type="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    @error('password_confirmation')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div> --}}
                {{-- end inputan password_confirmation --}}


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
