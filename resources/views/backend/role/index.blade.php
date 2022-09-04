<x-app-layout title="Role">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            {{-- pesan flashdata --}}
            @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- end pesan flashdata --}}
            <div class="x_panel">
                <div class="x_title">
                    <h2>Role </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="{{ route('role.create') }}" class="btn btn-primary">Tambah</a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                {{-- <p class="text-muted font-13 m-b-30">
                                    DataTables has most features enabled by default, so all you need to do to use it
                                    with
                                    your own tables is to call the construction function: <code>$().DataTable();</code>
                                </p> --}}
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Dibuat</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->description }}</td>
                                                <td>{{ $role->created_at }}</td>
                                                <td>
                                                    {{-- edit role --}}
                                                    <a href="{{ route('role.edit', $role->id) }}"
                                                        class="btn btn-warning border-0">Edit</a>
                                                    {{-- end edit role --}}

                                                    {{-- delete role --}}
                                                    <form action="{{ route('role.destroy', $role->id) }}" method="post"
                                                        class="d-inline" onsubmit="return confirm('yakin menghapus ?')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger border-0 d-inline"
                                                            type="submit">Hapus</button>
                                                    </form>
                                                    {{-- end delete role --}}

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- Datatables -->
        <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    @endpush
</x-app-layout>
