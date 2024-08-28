@extends('layouts.app', ['page' => 'Table User', 'pageSlug' => 'User'])

@section('content')
<div class="row">
    <div class="col-8">
        <h4 class="card-title">Users</h4>
    </div>
    <div class="col-4 text-right">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUser">
            Add User
        </button>
    </div>
</div>

<div class="card-body">
    <div>
        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('user.index') }}" class="form-inline mb-3">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by name or email" value="{{ request()->get('search') }}" style="width: 200px;">
            <select name="view" class="form-control form-control-sm ml-2">
                <option value="paginated" {{ request()->get('view') === 'paginated' ? 'selected' : '' }}>Pages</option>
                <option value="all" {{ request()->get('view') === 'all' ? 'selected' : '' }}>All</option>
            </select>
            <select name="perPage" class="form-control form-control-sm ml-2" {{ request()->get('view') === 'all' ? 'disabled' : '' }}>
                <option value="5" {{ request()->get('perPage') == 5 ? 'selected' : '' }}>5</option>
                <option value="25" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
            </select>
            <button type="submit" class="btn btn-sm btn-primary ml-2">Apply</button>
        </form>

        @include('alerts.success')
        @include('alerts.error')

        <table class="table tablesorter" id="">
            <thead class="text-primary">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role Action</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td class="align-baseline">
                        @if ($d->role == 1)
                        <div class="text-left">
                            <span class="btn btn-sm btn-success">Admin</span>
                        </div>
                        @else
                        <div class="text-left">
                            <span class="btn btn-sm btn-warning">User</span>
                        </div>
                        @endif
                    </td>
                    <td>{{ $d->created_at }}</td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <button type="button" class="dropdown-item edit-button" data-toggle="modal"
                                    data-target="#editUser" data-id="{{ $d->id }}" data-name="{{ $d->name }}"
                                    data-email="{{ $d->email }}" data-url="{{ route('user.update', $d->id) }}">
                                    Edit
                                </button>
                                <button type="button" class="dropdown-item delete-button" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="{{ $d->id }}" data-url="{{ route('user.destroy', $d->id) }}">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card-footer py-4">
    <nav class="d-flex justify-content-start" aria-label="...">
        <!-- Link Pagination -->
        @if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <ul class="pagination">
                <!-- Tombol Previous -->
                @if ($data->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                <!-- Nomor Halaman -->
                @foreach ($data->links()->elements[0] as $page => $url)
                    @if ($page == $data->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                <!-- Tombol Next -->
                @if ($data->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        @endif
    </nav>
</div>


<!-- Modal Add User -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('user.store') }}">
                <div class="modal-header">
                    <h5 class="modal-title h2 font-weight-bold" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ __('Name') }}</label>
                        <input type="text" name="name"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ __('Email address') }}</label>
                        <input type="email" name="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Email address') }}" value="{{ old('email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{ __('Password') }}</label>
                        <input type="password" name="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Password') }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                        <label>{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation"
                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Confirm Password') }}">
                        @include('alerts.feedback', ['field' => 'password_confirmation'])
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary closeModal">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editUserForm" method="POST" action="">
                <div class="modal-header">
                    <h5 class="modal-title h2 font-weight-bold" id="editUserLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="form-group{{ $errors->has('edit_name') ? ' has-danger' : '' }}">
                        <label>{{ __('Name') }}</label>
                        <input id="edit-name" type="text" name="edit_name"
                            class="form-control{{ $errors->has('edit_name') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Name') }}" value="{{ old('edit_name') }}">
                        @include('alerts.feedback', ['field' => 'edit_name'])
                    </div>

                    <div class="form-group{{ $errors->has('edit_email') ? ' has-danger' : '' }}">
                        <label>{{ __('Email address') }}</label>
                        <input id="edit-email" type="email" name="edit_email"
                            class="form-control{{ $errors->has('edit_email') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Email address') }}" value="{{ old('edit_email') }}">
                        @include('alerts.feedback', ['field' => 'edit_email'])
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary closeModal">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete User -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<script>
    document.querySelector('select[name="view"]').addEventListener('change', function() {
        const view = this.value;
        const perPageDropdown = document.querySelector('select[name="perPage"]');

        if (view === 'all') {
            perPageDropdown.disabled = true;
        } else {
            perPageDropdown.disabled = false;
        }

        // Submit form otomatis saat view berubah
        this.form.submit();
    });

    $(document).ready(function() {
        // Tampilkan modal Add User jika ada kesalahan terkait form Add User
        @if ($errors->has('name') || $errors->has('email') || $errors->has('password') || $errors->has('password_confirmation'))
            $('#addUser').modal('show');
        @endif

        // Tampilkan modal Edit User jika ada kesalahan terkait form Edit User
        @if ($errors->has('edit_name') || $errors->has('edit_email'))
            $('#editUser').modal('show');
        @endif 

        $('#addUser').on('shown.bs.modal', function () {
            $(this).find('.closeModal').click(function () {
                $('#addUser').modal('hide');
            });
        });

        $('#editUser').on('shown.bs.modal', function () {
            $(this).find('.closeModal').click(function () {
                $('#editUser').modal('hide');
            });
        });
    });

    $(document).ready(function() {

        // Ketika tombol edit diklik
        $('.edit-button').on('click', function() {
            // Ambil data dari atribut data-*
            var userId = $(this).data('id');
            var userName = $(this).data('name');
            var userEmail = $(this).data('email');
            var userUpdateUrl = $(this).data('url');

            // Isi form di dalam modal dengan data yang diambil
            $('#edit-user-id').val(userId);
            $('#edit-name').val(userName);
            $('#edit-email').val(userEmail);

            // Atur action form untuk update
            $('#editUserForm').attr('action', userUpdateUrl);
        });
    });

    $(document).ready(function() {
        // Ketika tombol delete diklik
        $('.delete-button').on('click', function() {
            // Ambil data dari atribut data-*
            var userId = $(this).data('id');
            var userDeleteUrl = $(this).data('url');

            // Atur action form untuk delete
            $('#deleteUserForm').attr('action', userDeleteUrl);
        });
    });

</script>
@endpush