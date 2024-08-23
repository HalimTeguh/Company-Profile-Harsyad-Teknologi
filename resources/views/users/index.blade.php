@extends('layouts.app', ['page' => ('Table User'), 'pageSlug' => 'User'])

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


    <div class="">
        <table class="table tablesorter " id="">
            <thead class=" text-primary">
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
                    <td class="align-baseline"> @if ($d->role == 1)
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
                                <a class="dropdown-item" href="#">Edit</a>
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

    </nav>
</div>




<!-- Modal Structure -->
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
                    @include('alerts.success')
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ ('Name') }}</label>
                        <input type="text" name="name"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            placeholder="{{ ('Name') }}" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ ('Email address') }}</label>
                        <input type="email" name="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="{{ ('Email address') }}" value="{{ old('email')}}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{ ('Pasword') }}</label>
                        <input type="password" name="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="{{ ('Pasword') }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                        <label>{{ ('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation"
                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                            placeholder="{{ ('Confirm Password') }}">
                        @include('alerts.feedback', ['field' => 'password_confirmation'])
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ ('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection