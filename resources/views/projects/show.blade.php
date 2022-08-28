@extends('layout.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{asset('assets/img/projects/featured_pictures') . '/' . $project->featured_picture_url}}); opacity: 0.3">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><span>/</span></li>
                    <li class="active">Detail Wakaf</li>
                </ul>
                <h2>{{$project->name}}</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Donation Details Start-->
    <section class="donation-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="donation-details__left">
                        <div class="donation-details__top">
                            <div class="donation-details__img">
                                <img src="{{asset('assets/img/projects/pictures') . '/' . $project->picture_url}}" alt="">
                                <div class="donation-details__date">
                                    <p>{{$project->category->category}}</p>
                                </div>
                            </div>
                            <div class="donation-details__content">
                                <h3 class="donation-details__title">{{$project->title}}</h3>
                                <p class="donation-details__text">{{$project->caption}}</p>
                            </div>
                        </div>
                        <div class="donation-details__donate">
                            <div class="donation-details__donate-shape"
                                 style="background-image: url({{asset('assets/images/shapes/donation-details-donate-shape.png')}});">
                            </div>
                            <div class="donation-details__donate-left">
                                <ul class="list-unstyled donation-details__donate-list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-solidarity"></span>
                                        </div>
                                        <div class="text">
                                            <span>Terkumpul</span>
                                            <p>Rp. {{number_format($project->amount_collected, 0, 0, ".")}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-target-1"></span>
                                        </div>
                                        <div class="text">
                                            <span>Target</span>
                                            <p>Rp. {{number_format($project->target_amount, 0, 0, ".")}}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="donation-details__donate-btn">
                                <a href="{{url('/projects', $project) . '/donate_now'}}" class="thm-btn text-center">Wakaf <br/> Sekarang</a>
                            </div>
                        </div>
                        <div class="donation-details__summary">
                            <h3 class="donation-details__summary-title">Story</h3>
                            <p class="donation-details__summary-text-1">Lorem Ipsum has been the industry's standard
                                dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                scrambled it to make a type simen book.</p>
                            <ul class="list-unstyled donation-details__summary-list">
                                <li>
                                    <div class="icon">
                                        <span class="fa fa-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>Nsectetur cing do not elit.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="fa fa-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>Suspe ndisse suscipit sagittis in leo.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="fa fa-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>Entum estibulum dignissim lipsm posuere.</p>
                                    </div>
                                </li>
                            </ul>
                            <p class="donation-details__summary-text-2">Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. orem Ipsum has been the industry's standard dummy
                                text ever since the when an unknown printer took a galley of type and scrambled it
                                to make a type specimen book.</p>
                        </div>
                        <div class="donation-details__recent-donation">
                            <h3 class="donation-details__recent-donation-title">Recent donors</h3>
                            <div class="list-unstyled donation-details__recent-donation-inner">
                                <div class="donation-details__recent-donation-shape"
                                     style="background-image: url({{asset('assets/images/shapes/recent-donation-shape-1.png')}});">
                                </div>
                                <ul class="list-unstyled donation-details__recent-donation-list">
                                    @foreach($project->get_backers() as $backer)
                                    <li>
                                        <div class="donation-details__recent-donation-img">
                                            <img src="{{asset('assets/images/resources/recent-donation-img-1.jpg')}}" alt="">
                                        </div>
                                        <div class="donation-details__recent-donation-content">
                                            <p>{{$backer['name']}}</p>
                                            <span>Rp. {{number_format($backer['amount'], 0, 0, '.')}}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="comment-one">
                            <h3 class="comment-one__title">{{count($project->comments) == 0 ? "Belum ada komentar" : count($project->comments) . " komentar"}}</h3>
                            @if(count($project->comments) > 0)
                                @foreach($project->comments as $comment)
                                <div class="comment-one__single">
                                    <div class="comment-one__image">
                                        <img src="{{asset('assets/img/bios/avatars') . '/' . $comment->user->bio->avatar_url}}" alt="">
                                    </div>
                                    <div class="comment-one__content">
                                        <h3>{{$comment->username}}</h3>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">Tinggalkan komentar</h3>
                            <form action="{{url('/projects', $project->id) . '/comments'}}" class="comment-one__form contact-form-validated"
                                  novalidate="novalidate" method="post">
                                @csrf
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                                <input type="hidden" name="user_id" value="1">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input disabled type="text" placeholder="Nama Anda" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Alamat email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="comment" placeholder="Tuliskan komentar"></textarea>
                                        </div>
                                        <div class="comment-form__btn-box">
                                            <button type="submit" class="thm-btn comment-form__btn">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="donation-details__sidebar">
                        <div class="donation-details__organizer">
                            <div class="sidebar-shape-1"
                                 style="background-image: url({{asset('assets/images/shapes/sidebar-shape-1.png')}});"></div>
                            <div class="donation-details__organizer-img">
                                <img src="{{asset('assets/images/resources/donation-details-organizer-img.jpg')}}" alt="">
                            </div>
                            <div class="donation-details__organizer-content">
                                <p class="donation-details__organizer-date">Created 20 april, 2022</p>
                                <p class="donation-details__organizer-title">Organizer:</p>
                                <p class="donation-details__organizer-name">Jessica smith</p>
                                <ul class="list-unstyled donation-details__organizer-list">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-tag"></span>
                                        </div>
                                        <div class="text">
                                            <p>Education</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-map-marker-alt"></span>
                                        </div>
                                        <div class="text">
                                            <p>Westwood, Canada</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar__post">
                            <div class="sidebar-shape-1"
                                 style="background-image: url({{asset('assets/images/shapes/sidebar-shape-1.png')}});"></div>
                            <h3 class="sidebar__title">Latest posts</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/images/blog/lp-1-1.jpg')}}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                                <span class="sidebar__post-content-meta"><i
                                                        class="fas fa-user-circle"></i> By admin</span>
                                            <a href="news-details.html">Promoting the rights
                                                of children</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/images/blog/lp-1-2.jpg')}}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                                <span class="sidebar__post-content-meta"><i
                                                        class="fas fa-user-circle"></i> By admin</span>
                                            <a href="news-details.html">There are many variations of</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/images/blog/lp-1-3.jpg')}}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                                <span class="sidebar__post-content-meta"><i
                                                        class="fas fa-user-circle"></i> By admin</span>
                                            <a href="news-details.html">Bring to the table win-win survival</a>
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="donation-details__sidebar-shaare-cause">
                            <div class="sidebar-shape-1"
                                 style="background-image: url({{asset('assets/images/shapes/sidebar-shape-1.png')}});"></div>
                            <h3 class="donation-details__sidebar-shaare-cause-title">Share</h3>
                            <div class="donation-details__sidebar-shaare-cause-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Donation Details End-->
@endsection
