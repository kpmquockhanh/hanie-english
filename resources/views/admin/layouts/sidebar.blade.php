<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->avatar ? asset(\Illuminate\Support\Facades\Auth::guard('admin')->user()->url_avatar) : asset('dist/img/user2-160x160.jpg') }}"
                     class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
    {{--        <form action="#" method="get" class="sidebar-form">--}}
    {{--            <div class="input-group">--}}
    {{--                <input type="text" name="q" class="form-control" placeholder="Search...">--}}
    {{--                <span class="input-group-btn">--}}
    {{--              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
    {{--              </button>--}}
    {{--            </span>--}}
    {{--            </div>--}}
    {{--        </form>--}}
    <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ !request()->segment(2)?'active':'' }}"><a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span></a>

            <li class="header">CONFIG SYSTEM</li>
            <li class="{{ request()->segment(2)==='config'?'active':'' }}">
                <a href="{{ route('admin.config') }}">
                    <i class="fa fa-gear"></i>
                    <span>Config landingpage</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='advisories'?'active':'' }}">
                <a href="{{ route('advisories.index') }}">
                    <i class="fa fa-question"></i>
                    <span>Advisories</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='recruitment'?'active':'' }}">
                <a href="{{ route('recruitment.index') }}">
                    <i class="fa fa-gear"></i>
                    <span>Job</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='feedback'?'active':'' }}">
                <a href="{{ route('feedback.index') }}">
                    <i class="fa fa-feed"></i>
                    <span>Feedbacks</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='levels'?'active':'' }}">
                <a href="{{ route('levels.index') }}">
                    <i class="fa fa-book"></i>
                    <span>Lesson levels</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='education-programs'?'active':'' }}">
                <a href="{{ route('education-programs.index') }}">
                    <i class="fa fa-product-hunt"></i>
                    <span>Education programs</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='teachers'?'active':'' }}">
                <a href="{{ route('teachers.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Teachers</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='phones'?'active':'' }}">
                <a href="{{ route('phones.index') }}">
                    <i class="fa fa-phone"></i>
                    <span>Phones</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='test-link'?'active':'' }}">
                <a href="{{ route('test-link.index') }}">
                    <i class="fa fa-link"></i>
                    <span>Test links</span>
                </a>
            </li>
            <li class="{{ request()->segment(2)==='commands'?'active':'' }}">
                <a href="{{ route('command.index') }}">
                    <i class="fa fa-terminal"></i>
                    <span>Commands</span>
                </a>
            </li>
            <li class="header">COURSE SYSTEM</li>
            <li class="{{ request()->segment(2)==='courses'?'active':'' }}">
                <a href="{{ route('courses.index') }}"><i class="fa fa-book"></i><span>Courses</span></a>
            </li>
            <li class="{{ request()->segment(2)==='categories'?'active':'' }}">
                <a href="{{ route('categories.index') }}"><i class="fa fa-file"></i>Categories</a>
            </li>
            <li class="{{ request()->segment(2)==='lessons'?'active':'' }}">
                <a href="{{ route('lessons.index') }}"><i class="fa fa-graduation-cap"></i>Lessons</a>
            </li>
            <li class="{{ request()->segment(2)==='questions'?'active':'' }}">
                <a href="{{ route('questions.index') }}"><i class="fa fa-question"></i>Questions</a>
            </li>
            <li class="{{ request()->segment(2)==='answers'?'active':'' }}">
                <a href="{{ route('answers.index') }}"><i class="fa fa-reply"></i>Answers</a>
            </li>
            <li class="{{ request()->segment(2)==='users'?'active':'' }}">
                <a href="{{ route('users.index') }}"><i class="fa fa-user"></i>Users</a>
            </li>
            <li class="{{ request()->segment(2)==='examinations'?'active':'' }}">
                <a href="{{ route('examinations.index') }}"><i class="fa fa-send"></i>Examinations</a>
            </li>
            <li class="{{ request()->segment(2)==='scores'?'active':'' }}">
                <a href="{{ route('scores.index') }}"><i class="fa fa-pencil-square-o"></i>Scores</a>
            </li>
            <li class="{{ request()->segment(2)==='histories'?'active':'' }}">
                <a href="{{ route('histories.index') }}"><i class="fa fa-pencil-square-o"></i>Histories</a>
            </li>
            {{--            <li class="treeview">--}}
            {{--                <a href="#">--}}
            {{--                    <i class="fa fa-book"></i>--}}
            {{--                    <span>Course system</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--                        <i class="fa fa-angle-left pull-right"></i>--}}
            {{--                    </span>--}}
            {{--                </a>--}}
            {{--                <ul class="treeview-menu">--}}

            {{--                </ul>--}}
            {{--            </li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#">Link in level 2</a></li>--}}
            {{--<li><a href="#">Link in level 2</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
