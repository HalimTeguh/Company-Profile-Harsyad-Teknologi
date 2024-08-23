<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ ('WD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ ('White Dashboard') }}</a>
        </div>
        <ul class="nav">
            
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ ('Dashboard') }}</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#user-menu" aria-expanded="true">
                    <i class="fas fa-circle-notch" ></i>
                    <span class="nav-link-text" >{{ ('User') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse {{ ($pageSlug == 'profile' || $pageSlug == 'User') ? 'show' : '' }}" id="user-menu">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active" @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ ('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'User') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ ('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li>
                <a data-toggle="collapse" href="#documentation" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ ('Documentation') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse {{ ($pageSlug == 'documentation') ? "show" : "" }}" id="documentation">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ ('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ ('User Management') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif >
                            <a href="{{ route('pages.icons') }}">
                                <i class="tim-icons icon-atom"></i>
                                <p>{{ ('Icons') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('pages.maps') }}">
                                <i class="tim-icons icon-pin"></i>
                                <p>{{ ('Maps') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('pages.notifications') }}">
                                <i class="tim-icons icon-bell-55"></i>
                                <p>{{ ('Notifications') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('pages.tables') }}">
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>{{ ('Table List') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('pages.typography') }}">
                                <i class="tim-icons icon-align-center"></i>
                                <p>{{ ('Typography') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
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
            </li>
        </ul>
    </div>
</div>
