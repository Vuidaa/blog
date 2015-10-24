<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('admin') }}">Dashboard</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="{{ url('admin/category') }}">Categories</a>
                </li>
                <li>
                    <a href="{{ url('admin/post') }}">Posts</a>
                </li>
                <li>
                    <a href="{{ url('admin/tag') }}">Tags</a>
                </li>
                <li>
                    <a href="{{ url('admin/comment') }}">Comments</a>
                </li>
                <li>
                    <a href="{{ url('admin/user') }}">Users</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/') }}">Site</a>
                </li>
                <li>
                    <a href="{{ url('auth/logout') }}">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>