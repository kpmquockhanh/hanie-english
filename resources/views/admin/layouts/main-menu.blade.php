<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="{{ \Request::segment(2) == null ? 'active':''}}">
                        <a data-toggle="tab" href="#Home">
                            <i class="notika-icon notika-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="{{ \Request::segment(2) == 'teachers' ? 'active':''}}">
                        <a data-toggle="tab" href="#Teacher">
                            <i class="notika-icon notika-house"></i> Teachers
                        </a>
                    </li>
                    <li class="{{ \Request::segment(2) == 'phones' ? 'active':''}}">
                        <a data-toggle="tab" href="#Phone">
                            <i class="notika-icon notika-house"></i> Phones
                        </a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="Home" class="tab-pane in notika-tab-menu-bg animated flipInX
                        {{ \Request::segment(2) == null ? 'active':''}}">
                        <ul class="notika-main-menu-dropdown">
                            <li>
                                <a href="{{ route('admin.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.config') }}">Config landing page</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Teacher" class="tab-pane in notika-tab-menu-bg animated flipInX
                        {{ \Request::segment(2) == 'teachers' ? 'active':''}}">
                        <ul class="notika-main-menu-dropdown">
                            <li class="{{ \Request::segment(2) == 'teachers' ? 'active':''}}">
                                <a href="{{ route('teachers.index') }}">List of teachers</a>
                            </li>
                            <li>
                                <a href="{{ route('teachers.create') }}">Create a teacher</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Phone" class="tab-pane in notika-tab-menu-bg animated flipInX
                        {{ \Request::segment(2) == 'phones' ? 'active':''}}">
                        <ul class="notika-main-menu-dropdown">
                            <li class="{{ \Request::segment(2) == 'phones' ? 'active':''}}">
                                <a href="{{ route('phones.index') }}">List of phones</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
