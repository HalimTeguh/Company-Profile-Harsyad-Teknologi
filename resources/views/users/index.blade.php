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
        @include('alerts.success')
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
    <nav class="d-flex justify-content-end" aria-label="...">
        <!-- Pagination, if necessary -->
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

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ __('Name') }}</label>
                        <input id="edit-name" type="text" name="name"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ __('Email address') }}</label>
                        <input id="edit-email" type="email" name="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Email address') }}" value="{{ old('email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('js')
<script>
    

    $(document).ready(function() {
        // Tampilkan modal jika ada kesalahan
        @if ($errors->any())
            $('#addUser').modal('show');
        @endif 

        $('#addUser').on('shown.bs.modal', function () {
            $(this).find('.closeModal').click(function () {
                $('#addUser').modal('hide');
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
</script>
@endpush