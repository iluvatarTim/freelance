@extends('layout')

@section('content')
    <section class="services wrapper">
        <ul class="clearfix">
            <li class="animated wow fadeInDown">
                <img class="icon" src="img/icon1.png" alt=""/>
                <span class="separator"></span>
                <h2>Officia Deserunt Mollit</h2>
                <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua voluptate velit esse
                    cillum dolore.</p>
            </li>
            <li class="animated wow fadeInDown"  data-wow-delay=".2s">
                <img class="icon" src="img/icon2.png" alt=""/>
                <span class="separator"></span>
                <h2>Culpa Killum Dolore</h2>
                <p>aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </li>
            <li class="animated wow fadeInDown"  data-wow-delay=".4s">
                <img class="icon" src="img/icon3.png" alt=""/>
                <span class="separator"></span>
                <h2>Elit Tempor Incididunt</h2>
                <p>nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat enim ad minim veniam.</p>
            </li>
        </ul>
    </section><!--  End services  -->


    <section class="video">
        <img src="img/video_logo.png" alt="" class="video_logo animated wow fadeInDown"/>
        <h3 class="animated wow fadeInDown">who we are & what we do</h3>
        <a href="http://www.youtube.com/embed/cBJyo0tgLnw" id="play_btn" class="fancybox animated wow flipInX" data-wow-duration="2s"></a>
    </section><!--  End video  -->


    <section class="testimonials wrapper">
        <div class="title animated wow fadeIn">
            <h2>Testimonials</h2>
            <h3>what clients are saying about us</h3>
            <hr class="separator"/>
        </div>

        <ul class="clearfix">
            <li class="animated wow fadeInDown">
                <p><img src="img/quotes.png" alt="" class="quotes"/>Dolor sit amet consectetur isicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam quis nostrud laboris.
                    <span class="triangle"></span>
                </p>
                <div class="client">
                    <img src="img/client1.jpg" class="avatar"/>
                    <div class="client_details">
                        <h4>John Doe</h4>
                        <h5>CEO</h5>
                    </div>
                </div>
            </li>
            <li class="animated wow fadeInDown"  data-wow-delay=".2s">
                <p><img src="img/quotes.png" alt="" class="quotes"/>Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sunt in culpa officia deserunt mollit anim laborum sint occaecat.
                    <span class="triangle"></span>
                </p>
                <div class="client">
                    <img src="img/client2.jpg" class="avatar"/>
                    <div class="client_details">
                        <h4>Alex Martin</h4>
                        <h5>UI Designer</h5>
                    </div>
                </div>
            </li>
            <li class="animated wow fadeInDown"  data-wow-delay=".4s">
                <p><img src="img/quotes.png" alt="" class="quotes"/>Aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse slum dolore eu fugiat nulla pariatursint occaecat.
                    <span class="triangle"></span>
                </p>
                <div class="client">
                    <img src="img/client3.jpg" class="avatar"/>
                    <div class="client_details">
                        <h4>Linda Doe</h4>
                        <h5>Developer</h5>
                    </div>
                </div>
            </li>
        </ul>
    </section><!--  End testimonials  -->


    <section class="blog_posts">
        <div class="wrapper">
            <div class="title animated wow fadeIn">
                <h2>Recent Posts</h2>
                <h3>the most recent posts from our blog</h3>
                <hr class="separator"/>
            </div>

            <ul class="clearfix">
                <li class="animated wow fadeInDown">
                    <div class="media">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">Jun</span>
                        </div>
                        <a href="#">
                            <img src="img/blog_post1.jpg" alt=""/>
                        </a>
                    </div>
                    <a href="#">
                        <h1>Sed do eiusmod tempor incididunt.</h1>
                    </a>
                </li>

                <li class="animated wow fadeInDown" data-wow-delay=".2s">
                    <div class="media">
                        <div class="date">
                            <span class="day">11</span>
                            <span class="month">May</span>
                        </div>
                        <a href="#">
                            <img src="img/blog_post2.jpg" alt=""/>
                        </a>
                    </div>
                    <a href="#">
                        <h1>Velit esse cillum dollore fugiat nulla.</h1>
                    </a>
                </li>

                <li class="animated wow fadeInDown" data-wow-delay=".4s">
                    <div class="media">
                        <div class="date">
                            <span class="day">13</span>
                            <span class="month">Feb</span>
                        </div>
                        <a href="#">
                            <img src="img/blog_post3.jpg" alt=""/>
                        </a>
                    </div>
                    <a href="#">
                        <h1>Officia deserunt mollit est anim laborum.</h1>
                    </a>
                </li>

                <li class="animated wow fadeInDown" data-wow-delay=".6s">
                    <div class="media">
                        <div class="date">
                            <span class="day">10</span>
                            <span class="month">Jan</span>
                        </div>
                        <a href="#">
                            <img src="img/blog_post4.jpg" alt=""/>
                        </a>
                    </div>
                    <a href="#"><h1>Culpa qui officia deserunt
                            mollit ani
                            m.</h1>
                    </a>
                </li>
            </ul>
        </div>
    </section><!--  End blog_posts  -->
@endsection