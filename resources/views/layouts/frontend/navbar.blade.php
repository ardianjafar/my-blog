<nav class="navbar navbar-default  navbar-fixed-top" color-on-scroll="200">
    <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a href="{{ route('blog.index') }}" class="navbar-brand">
                As-SyuruqTv
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-uppercase">
                <li>
                    <a href="{{ route('blog.index') }}">Home</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
                <li>
                    <a href="{{ route('blog.content') }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('blog.category') }}">Category</a>
                </li>
                <li class="dropdown">
                    <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-share-alt"></i> Share
                    </a>
                    <ul class="dropdown-menu dropdown-danger">
                        <li>
                            <a href="#">Facebook</a>
                        </li>
                        <li>
                            <a href="#"> Twitter</a>
                        </li>
                        <li>
                            <a href="#"> Instagram</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
