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
<<<<<<< HEAD
                    </li>
                    <li>
                        <a href="{{ route('pages.icons') }}">
                            <i class="tim-icons icon-atom"></i>
                            <p>{{ ('Icons') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.maps') }}">
                            <i class="tim-icons icon-pin"></i>
                            <p>{{ ('Maps') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.notifications') }}">
                            <i class="tim-icons icon-bell-55"></i>
                            <p>{{ ('Notifications') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.tables') }}">
                            <i class="tim-icons icon-puzzle-10"></i>
                            <p>{{ ('Table List') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.typography') }}">
                            <i class="tim-icons icon-align-center"></i>
                            <p>{{ ('Typography') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.rtl') }}">
                            <i class="tim-icons icon-world"></i>
                            <p>{{ ('RTL Support') }}</p>
                        </a>
                    </li>
                    <li class="bg-info">
                        <a href="{{ route('pages.upgrade') }}">
                            <i class="tim-icons icon-spaceship"></i>
                            <p>{{ ('Upgrade to PRO') }}</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#">{{ $page ?? ('Dashboard') }}</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-expanded="false" aria-label="{{ ('Toggle navigation') }}">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="search-bar input-group">
                                <button class="btn btn-link" id="search-button" data-toggle="modal"
                                    data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                    <span class="d-lg-none d-md-block">{{ ('Search') }}</span>
                                </button>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="notification d-none d-lg-block d-xl-block"></div>
                                    <i class="tim-icons icon-sound-wave"></i>
                                    <p class="d-lg-none"> {{ ('Notifications') }} </p>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                                    <li class="nav-link">
                                        <a href="#" class="nav-item dropdown-item">{{ ('Mike John responded to your
                                            email') }}</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" class="nav-item dropdown-item">{{ ('You have 5 more tasks') }}</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" class="nav-item dropdown-item">{{ ('Your friend Michael is in town')
                                            }}</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" class="nav-item dropdown-item">{{ ('Another notification') }}</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" class="nav-item dropdown-item">{{ ('Another one') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="photo">
                                        <img src="{{ asset('white') }}/img/anime3.png" alt="{{ ('Profile Photo') }}">
                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                    <p class="d-lg-none">{{ ('Log out') }}</p>
                                </a>
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link">
                                        <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{
                                            ('Profile') }}</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" class="nav-item dropdown-item">{{ ('Settings') }}</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="nav-link">
                                        <a href="{{ route('logout') }}" class="nav-item dropdown-item"
                                            onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{
                                            ('Log out') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog"
                aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <input type="text" class="form-control" id="inlineFormInputGroup"
                                placeholder="{{ ('SEARCH') }}">
                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ ('Close') }}">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog"
                aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#" class="btn btn-sm btn-primary">Add user</a>
                    </div>
                </div>
                {{--
            </div> --}}
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
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-id="{{ $d->id }}" data-name="{{ $d->name }}" data-email="{{ $d->email }}">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
  
            <!-- Modal Structure -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form method="post" action="{{ route('user.edit')}}" autocomplete="off">
                                <div class="card-body">
                                    @csrf
                                    @method('put')

                                    @include('alerts.success')

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label>{{ ('Nama') }}</label>
                                        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label>{{ ('Alamat Email') }}</label>
                                        <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">{{ ('Simpan') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>

    <footer class="footer">
        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item">
                    <a href="https://creative-tim.com" target="blank" class="nav-link">
                        Creative Tim
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://updivision.com" target="blank" class="nav-link">
                        Updivision
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Blog
                    </a>
                </li>
            </ul>
            <div class="copyright">
                © 2020 made with <i class="tim-icons icon-heart-2"></i> by
                <a href="https://creative-tim.com" target="_blank">Creative Tim</a> &amp;
                <a href="https://updivision.com" target="_blank">Updivision</a> for a better web.
            </div>
        </div>
    </footer>
    </div>
    </div>
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
        @csrf
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title"> Sidebar Background</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="badge-colors text-center">
                                <span class="badge filter badge-primary active" data-color="primary"></span>
                                <span class="badge filter badge-info" data-color="blue"></span>
                                <span class="badge filter badge-success" data-color="green"></span>
=======
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
                                <button type="button" class="dropdown-item" data-toggle="modal"
                                    data-target="#editUser" data-id="{{ $d->id }}" data-name="{{ $d->name }}"
                                    data-email="{{ $d->email }}">
                                    Edit
                                </button>
>>>>>>> d0bfa52f85edae119c84e7a872aff10f544d8200
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
                    @include('alerts.success')

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
                            placeholder="{{ __('Email address') }}" value="{{ old('email')}}">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('user.update', ['user' => 0]) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-user-id" name="id">
                    <div class="form-group">
                        <label for="edit-name">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#editUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var userName = button.data('name');
        var userEmail = button.data('email');

        var modal = $(this);
        modal.find('#edit-user-id').val(userId);
        modal.find('#edit-name').val(userName);
        modal.find('#edit-email').val(userEmail);
        modal.find('form').attr('action', '{{ route('user.update', '') }}/' + userId);
    });
</script>


@endsection