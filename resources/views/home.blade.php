@extends('layouts.main')

@section('content')
<main id="page-home">
    <section id="home-main">
        <div class="container mt-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-video-container">
                        <div class="cover">
                        </div>
                        <h1>Tristan Tuckler: TRT</h1>
                        <div class="geo">Worlwide</div>
                        <div class="meta">
                            <time datetime="2021-06-12">12 JUNE 2021</time>
                            <a href="#">NEWS</a>
                        </div>
                        
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 60 60" class="play-button" xml:space="preserve">
                            <g>
                                <path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30
                                    c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15
                                    C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"/>
                            </g>
                        </svg>
                    </div>
                    <div class="header-links-container align-items-center max-xs-text-center">
                        <a class="link"><i class="far fa-calendar-plus"></i> Add to Calendar</a>
                        <a class="link"><i class="far fa-envelope"></i> Remind me</a>
                        <a href="#" class="btn btn-lg md-right md-mr-1 mt-1_2 md-right max-md-block">SUBSCRIBE TO H&C+</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 header-video-description">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                    </p>
                    <div class="widget-newsletter">
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <form id="subscription_form" action="{{ route('api.subscribe') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input id="email" name="email" type="email"/>
                                <input type="submit" class="btn btn-primary" value="SUBMIT"/>
                            </div>
                            <div class="form-group">
                                <ul class="messages">
                                </ul>
                            </div>
                        </form>
                    </div>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                    </p>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. <a href="#">Add to Calendar?</a>
                    </p>
                    <p class="text-center">
                        Not yet a subscriber? Subscribe to H&C+ today to watch!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="sliders">
        <div class="container-fluid">
            @if (count($sliders))
                @php ($i = 1)
                @foreach ($sliders as $slider)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="glider-contain">
                                <div class="glider">
                                    @foreach ($slider as $video)
                                        <div>
                                            <div class="img">
                                                <a href="{{ $video['permalink'] }}"><img src="{{ $video['videoImageUrl'] }}" alt="{{ $video['title'] }}"></a>
                                            </div>
                                            <p>
                                                <a href="{{ $video['permalink'] }}">{{ $video['title'] }}</a>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                                <button aria-label="Previous" class="glider-prev glider-prev-{{ $i }}"><i class="fas fa-chevron-left"></i></button>
                                <button aria-label="Next" class="glider-next glider-next-{{ $i }}"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    @php ($i++)
                @endforeach
            @endif
        </div>
    </section>
    <section id="sliders">
        <div class="container-subscriptions">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Choose the <span class="text-highlight"><strong>H&C+</strong></span> plan that's rigth for you</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 tabs align-center">
                    <ul class="tabs-menu">
                        <li>SUBSCRIPTIONS</li>
                        <li>ONE-OFF PASS</li>
                    </ul>
                    <div class="tab event active">
                        <div class="heading">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et.
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="/images/event.png" alt="lorem ipsum"/>
                                    <h3>At vero eos et accusamus et iusto odio</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul class="pass-type">
                                        <li>
                                            <span class="type">Event Pass</span>
                                            <span class="price text-highlight"><strong>£57.99</strong></span>
                                        </li>
                                        <li>
                                            <span class="type">Day Pass</span>
                                            <span class="price text-highlight"><strong>£7.99</strong></span>
                                        </li>
                                    </ul>
                                    <hr>
                                    <a href="#" class="btn btn-lg display-block">PURCHASE</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="/images/event.png" alt="lorem ipsum"/>
                                    <h3>Nam libero tempore, cum soluta nobis est</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul class="pass-type">
                                        <li>
                                            <span class="type">Event Pass</span>
                                            <span class="price text-highlight"><strong>£49.99</strong></span>
                                        </li>
                                        <li>
                                            <span class="type">Day Pass</span>
                                            <span class="price text-highlight"><strong>£6.99</strong></span>
                                        </li>
                                    </ul>
                                    <hr>
                                    <a href="#" class="btn btn-lg display-block">PURCHASE</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="/images/event.png" alt="lorem ipsum"/>
                                    <h3>Temporibus autem quibusdam et aut officiis</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul class="pass-type">
                                        <li>
                                            <span class="type">Event Pass</span>
                                            <span class="price text-highlight"><strong>£80.00</strong></span>
                                        </li>
                                    </ul>
                                    <hr>
                                    <a href="#" class="btn btn-lg display-block">PURCHASE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab table">
                        <div class="heading">
                            <i class="fas fa-check text-highlight"></i> Watch on TV, Computer, Mobile & Table
                        </div>
                        <select class="options-selector">
                            <option value="monthly">Monthly</option>
                            <option value="annual" selected>Annual</option>
                            <option value="gold-annual">Gold Annual</option>
                        </select>
                        <ul class="options">
                            <li>
                                <a><span class="title">Monthly</span></a>
                            </li>
                            <li>
                                <a class="selected"><span class="title">Annual</span></a>
                                
                            </li>
                            <li>
                                <a>Gold Annual</a>
                            </li>
                        </ul>
                        <div class="tabs-content">
                            <div class="row">
                              <div class="col-md-12 description">
                                    <p>Plan cost</p>
                                </div>
                                <div class="col-md-4">
                                    <strong>£5.99</strong> <small>/ year</small>
                                </div>
                                <div class="col-md-4 selected">
                                    <strong>£59.99</strong> <small>/ year</small>
                                </div>
                                <div class="col-md-4">
                                    <strong>£144.99</strong> <small>/ year</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 description">
                                    <p>Thousands of hours of video</p>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="col-md-4 selected">
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 description">
                                    <p>Thousands of hours of video</p>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="col-md-4 selected">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection




                
