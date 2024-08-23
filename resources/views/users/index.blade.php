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
    </div>
</div>
@endsection
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
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="button-container">
                        <a href="https://www.creative-tim.com/product/white-dashboard-laravel" target="_blank"
                            class="btn btn-primary btn-block btn-round">Download Now</a>
                        <a href="https://white-dashboard-laravel.creative-tim.com/docs/getting-started/introduction.html"
                            target="_blank" class="btn btn-default btn-block btn-round">
                            Documentation
                        </a>
                    </li>
                    <li class="header-title">Thank you for 95 shares!</li>
                    <li class="button-container text-center">
                        <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> · 45</button>
                        <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> ·
                            50</button>
                        <br>
                        <br>
                        <a class="github-button btn btn-round btn-default"
                            href="https://github.com/creativetimofficial/white-dashboard-laravel"
                            data-icon="octicon-star" data-size="large" data-show-count="true"
                            aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('white') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('white') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('white') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('white') }}/js/white-dashboard.js?v=1.0.0"></script>
        <script src="{{ asset('white') }}/js/theme.js"></script>

        @stack('js')

        <script>
            // $('#exampleModal').on('show.bs.modal', function (event) {
            //     var button = $(event.relatedTarget); // Tombol yang memicu modal
            //     var id = button.data('id'); // Ambil ID dari data-* atribut
            //     var name = button.data('name');
            //     var email = button.data('email');

            //     var modal = $(this);
            //     modal.find('.modal-body #name').val(name);
            //     modal.find('.modal-body #email').val(email);
            //     modal.find('.modal-body form').attr('action', '/user/' + name); // Menetapkan URL aksi
            // });

        
            // Event listener untuk tombol Save Changes
            // $('#saveChanges').on('click', function () {
            //     // Ambil data dari form
            //     var id = $('#userId').val();
            //     var name = $('#name').val();
            //     var email = $('#email').val();
                
            //     // Lakukan aksi yang diperlukan, misalnya mengirim data ke server
            //     console.log('ID:', id);
            //     console.log('Name:', name);
            //     console.log('Email:', email);
                
            //     // Contoh pengiriman data dengan AJAX (ganti URL dan data sesuai kebutuhan)
            //     $.ajax({
            //         url: 'user/edit', // Ganti dengan URL endpoint Anda
            //         method: 'PUT',
            //         data: {
            //             id: id,
            //             name: name,
            //             email: email
            //         },
            //         success: function(response) {
            //             // Tindakan setelah berhasil
            //             alert('Data updated successfully!');
            //             $('#exampleModal').modal('hide'); // Tutup modal
            //         },
            //         error: function(xhr, status, error) {
            //             // Tindakan jika ada kesalahan
            //             alert('An error occurred: ' + error);
            //         }
            //     });
            // });
        </script>
        

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }
                    });

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (white_color == true) {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').removeClass('white-content');
                            }, 900);
                            white_color = false;
                        } else {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').addClass('white-content');
                            }, 900);

                            white_color = true;
                        }
                    });

                    $('.light-badge').click(function() {
                        $('body').addClass('white-content');
                    });

                    $('.dark-badge').click(function() {
                        $('body').removeClass('white-content');
                    });
                });
            });

        </script>
        @stack('js')
</body>

</html>
