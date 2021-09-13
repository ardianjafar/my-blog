@extends('layouts.frontend.fix')

@section('title')
    Home
@endsection

@section('content')
<div class="section section-header">
    <div class="parallax filter filter-color-red">
        <div class="image"
            style="background-image: url('/img/header-1.jpeg')">
        </div>
        <div class="container">
            <div class="content">
                <div class="title-area">
                    <p>Lembaga Dakwah</p>
                    <h1 class="title-modern">As-SyuruqTv</h1>
                    <h3>Lembaga Dakwah dan Berita Islami</h2>
                    <div class="separator line-separator">♦</div>
                </div>

                <div class="button-get-started">
                    <a href="#" class="btn btn-white btn-fill btn-lg ">
                        Tentang Kami
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="title-area">
                <h2>Tentang Kami</h2>
                <div class="separator separator-danger">✻</div>
                <p class="description">We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best looking clothes.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-graph1"></i>
                    </div>
                    <h3>Sales</h3>
                    <p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-note2"></i>
                    </div>
                    <h3>Content</h3>
                    <p class="description">We create a persona regarding the multiple wardrobe accessories that we provide..</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-music"></i>
                    </div>
                    <h3>Music</h3>
                    <p class="description">We like to present the world with our work, so we make sure we spread the word regarding our clothes.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-our-team-freebie">
    <div class="parallax filter filter-color-black">
        <div class="image" style="background-image:url('/img/header-2.jpeg')">
        </div>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="title-area">
                        <h2>Who We Are</h2>
                        <div class="separator separator-danger">✻</div>
                        <p class="description">We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best looking clothes.</p>
                    </div>
                </div>

                <div class="team">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                <img alt="..." class="img-circle" src="/img/faces/face_1.jpg"/>
                                            </div>
                                            <div class="description">
                                                <h3 class="title">Tina</h3>
                                                <p class="small-text">CEO / Co-Founder</p>
                                                <p class="description">I miss the old Kanye I gotta say at that time I’d like to meet Kanye And I promise the power is in the people and I will use the power given by the people to bring everything I have back to the people.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                <img alt="..." class="img-circle" src="/img/faces/face_4.jpg"/>
                                            </div>
                                            <div class="description">
                                                <h3 class="title">Andrew</h3>
                                                <p class="small-text">Product Designer</p>
                                                <p class="description">I miss the old Kanye I gotta say at that time I’d like to meet Kanye And I promise the power is in the people and I will use the power given by the people to bring everything I have back to the people.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                <img alt="..." class="img-circle" src="/img/faces/face_3.jpg"/>
                                            </div>
                                            <div class="description">
                                                <h3 class="title">Michelle</h3>
                                                <p class="small-text">Marketing Hacker</p>
                                                <p class="description">I miss the old Kanye I gotta say at that time I’d like to meet Kanye And I promise the power is in the people and I will use the power given by the people to bring everything I have back to the people.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-our-clients-freebie">
    <div class="container">
        <div class="title-area">
            <h5 class="subtitle text-gray">Tentang Kami</h5>
            <h2>As - SyuruqTv</h2>
            <div class="separator separator-danger">∎</div>
        </div>

        <ul class="nav nav-text" role="tablist">
            <li class="active">
                <a href="#testimonial1" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." class="img-circle" src="/img/faces/face_5.jpg"/>
                    </div>
                </a>
            </li>
            <li>
                <a href="#testimonial2" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." class="img-circle" src="/img/faces/face_6.jpg"/>
                    </div>
                </a>
            </li>
            <li>
                <a href="#testimonial3" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." class="img-circle" src="/img/faces/face_2.jpg"/>
                    </div>
                </a>
            </li>
        </ul>


        <div class="tab-content">
            <div class="tab-pane active" id="testimonial1">
                <p class="description">
                    And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color... Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all!
                </p>
            </div>
            <div class="tab-pane" id="testimonial2">
                <p class="description">Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all! And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color...
                </p>
            </div>
            <div class="tab-pane" id="testimonial3">
                <p class="description"> I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. The 'Gaia' team did a great work while we were collaborating. They provided a vision that was in deep connection with our needs and helped us achieve our goals.
                </p>
            </div>

        </div>

    </div>
</div>


<div class="section section-small section-get-started">
    <div class="parallax filter">
        <div class="image"
            style="background-image: url('/img/office-1.jpeg')">
        </div>
        <div class="container">
            <div class="title-area">
                <h2 class="text-white">Do you want to work with us?</h2>
                <div class="separator line-separator">♦</div>
                <p class="description"> We are keen on creating a second skin for anyone with a sense of style! We design our clothes having our customers in mind and we never disappoint!</p>
            </div>

            <div class="button-get-started">
                <a href="#gaia" class="btn btn-danger btn-fill btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css-external')
    <link href="/css/app.css" rel="stylesheet" />
    <link href="/css/gaia.css" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
@endpush

@push('js-external')
        <!--   core js files    -->
        <script src="/js/jquery.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.js" type="text/javascript"></script>
    
        <!--  js library for devices recognition -->
        <script type="text/javascript" src="/js/modernizr.js"></script>
    
        <!--  script for google maps   -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    
        <!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
        <script type="text/javascript" src="/js/gaia.js"></script>
@endpush