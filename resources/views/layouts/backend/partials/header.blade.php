<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        {{-- <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown" id="mark-all">
                    <i class="icon-copy dw dw-notification"></i>
                    @if (auth()->user()->unreadNotifications->count())
                    <span class="badge notification-active"></span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            @if (!auth()->user()->notifications->count())
                            <li class="alert alert-danger">No Notifications</li>
                            @else
                            @foreach (auth()->user()->notifications->slice(0, 6) as $item)
                            <li class="alert @if ($item->read_at) alert-success @else alert-warning @endif">
                                <a href=" {{ route('admin.'.$item->data['type'] . '.show',$item->data['id']) }}">
                                    <img src="/b/vendors/images/img.jpg" alt="">
                                    <h3>{{$item->data['name']}}</h3>
                                    <p>{{$item->data['message']}}</p>
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        @if (!auth()->user()->profile or !auth()->user()->profile->img)
                            <img src="/b/vendors/images/default.bmp" alt="">
                        @else
                            <img src="{{ url('/storage/profile/' . auth()->user()->profile->img) }}" alt="">
                        @endif
                    </span>
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    @if (auth()->user()->type != 'admin')
                        <a class="dropdown-item" href="{{ route('admin.profile.index') }}"><i class="dw dw-user1"></i>
                            Profile</a>
                        <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout', []) }}"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                            class="dw dw-logout"></i> Log Out</a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg"
                    alt=""></a>
        </div>
    </div>
</div>
