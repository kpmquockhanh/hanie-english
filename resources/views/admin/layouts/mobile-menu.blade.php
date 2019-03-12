<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li>
                                <a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="{{ route('admin.index') }}">Home</a></li>
                                    <li><a href="{{ route('admin.config') }}">Config</a></li>
                                </ul>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#Charts" href="#">Teachers</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="{{ route('teachers.index') }}">List of teachers</a></li>
                                    <li><a href="{{ route('teachers.create') }}">Create a teacher</a></li>
                                </ul>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#Charts" href="#">Phones</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="{{ route('phones.index') }}">List of phones</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->