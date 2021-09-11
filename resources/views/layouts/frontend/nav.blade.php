<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ set_active('blog.home') }}" href="{{ route('blog.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ set_active('blog.about') }}" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link {{ set_active('blog.contact') }}" href="#!">Contact</a></li>
                <li class="nav-item"><a class="nav-link {{ set_active('blog.content') }}" aria-current="page" href="{{ route('blog.content') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link {{ set_active('blog.category') }}" aria-current="page" href="{{ route('blog.category') }}">Category</a></li>
            </ul>
        </div>
    </div>
</nav>
