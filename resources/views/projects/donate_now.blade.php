@extends('layout.app')

@section('styles')
<style>
    .btn_choices {
        margin-top: 20px;
    }
    .btn-outline-primary {
        border-color: #00715d;
        background-color: #f9f4e8;
    }

    .btn-check:active+.btn-outline-primary,
    .btn-check:checked+.btn-outline-primary,
    .btn-outline-primary:active {
        background-color: #fbd45a;
        border-color: #00715d;
    }

    .card {
        border-color: #00715d;
        background-color: white;
        height: 80px;
        padding: 5px;
        cursor: pointer;
    }

    .card:hover {
        border: solid 3px #2d3748;
    }
    .card.active {
        border: solid 3px #2d3748;
    }

</style>
@endsection

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{url(asset('assets/img/projects/pictures') . '/' . $project->picture_url)}}); opacity: 0.3;">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><span>/</span></li>
                    <li class="active">Wakaf Sekarang</li>
                </ul>
                <h2>{{$project->name}}</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Donate Now Start-->
    <section class="donate-now">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="donate-now__left">
                        <div class="donate-now__enter-donation">
                            <h3 class="donate-now__title">Nominal Wakaf</h3>
                            <div class="donate-now__enter-donation-input">
                                <select class="selectpicker">
                                    <option>Rp. </option>
                                </select>
                                <input type="text" name="donation-money" id="donation_amount">
                            </div>
                            <div class="row btn_choices">
                                <div class="btn-group col" role="group" aria-label="Pilih nominal wakaf">
                                    <input type="radio" class="btn-check" name="choice_amount" id="first_choice" value="{{$project->first_choice_amount}}" value="3000" autocomplete="off">
                                    <label class="btn_amount_choice btn thm-btn btn-outline-primary" for="first_choice">Rp. {{number_format($project->first_choice_amount, 0, 0, ".")}}</label>

                                    <input type="radio" class="btn-check" name="choice_amount" id="second_choice" value="{{$project->second_choice_amount}}" autocomplete="off">
                                    <label class="btn_amount_choice btn thm-btn btn-outline-primary" for="second_choice">Rp. {{number_format($project->second_choice_amount, 0, 0, ".")}}</label>

                                    <input type="radio" class="btn-check" name="choice_amount" id="third_choice" value="{{$project->third_choice_amount}}" autocomplete="off">
                                    <label class="btn_amount_choice btn thm-btn btn-outline-primary" for="third_choice">Rp. {{number_format($project->third_choice_amount, 0, 0, ".")}}</label>

                                    <input type="radio" class="btn-check" name="choice_amount" id="fourth_choice" value="{{$project->fourth_choice_amount}}" autocomplete="off">
                                    <label class="btn_amount_choice btn thm-btn btn-outline-primary" for="fourth_choice">Rp. {{number_format($project->fourth_choice_amount, 0, 0, ".")}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="donate-now__personal-info-box">
                            <h3 class="donate-now__title">Dana tambahan</h3>
                            <div class="row">
                                <div class="col-6">
                                    <div class="h4">
                                        Dana aplikasi: <span class="fw-bold">Rp. <span id="maintenance_fee">{{$project->maintenance_fee}}</span></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="h4">
                                        Dana transaksi: <span class="fw-bold">Rp. <span id="transaction_fee"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="donate-now__personal-info-box">
                            <h3 class="donate-now__title">Metode Pembayaran: <span id="payment_method_name"></span></h3>
                            <h4 class="mb-3">1. Virtual Account</h4>
                            <div class="row mb-5">
                                @foreach($payment_methods['Virtual Account'] as $method)
                                    <div class="col-sm-3">
                                        <div class="card mb-3" data-code="{{$method->code}}" data-display="{{$method->display_text}}">
                                            <div class="card-content">
                                                <div class="image-box">
                                                    <img class="img-fluid" src="{{$method->icon_url}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <h4 class="mb-3">2. Ritel</h4>
                            <div class="row mb-5">
                                @foreach($payment_methods['Ritel'] as $method)
                                    <div class="col-sm-3">
                                        <div class="card mb-3" data-code="{{$method->code}}" data-display="{{$method->display_text}}">
                                            <div class="card-content">
                                                <img class="img-fluid" src="{{$method->icon_url}}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="donate-now__personal-info-box">
                        <h3 class="donate-now__title">Total Pembayaran: Rp. <span id="total_payment"></span></h3>
                    </div>
                    <div class="donate-now__personal-info-box">
                            <h3 class="donate-now__title">Data Diri</h3>
                            <form class="donate-now__personal-info-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" placeholder="Nama awal" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" placeholder="Nama akhir" name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="donate-now__personal-info-input">
                                            <input type="email" placeholder="Alamat email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" placeholder="Phone" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="donate-now__personal-info-input">
                                            <textarea name="address" placeholder="Alamat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div
                                            class="donate-now__personal-info-input donate-now__personal-info-message-box">
                                            <textarea name="comment" placeholder="Tulis pesanmu"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="donate-now__payment-info-box">
                        <div class="donate-now__payment-info-btn-box">
                            <button type="submit" class="thm-btn donate-now__payment-info-btn">Bayar Wakaf</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="donate-now__right">
                        <div class="causes-one__single">
                            <div class="causes-one__img">
                                <img src="{{asset('assets/img/projects/pictures') . '/' .$project->picture_url}}" alt="">
                                <div class="causes-one__cat">
                                    <p>{{$project->category->category}}</p>
                                </div>
                            </div>
                            <div class="causes-one__content">
                                <h3 class="causes-one__title"><a href="{{url('/projects', $project->id)}}">{{$project->title}}</a>
                                </h3>
                                <p class="causes-one__text">{{$project->caption}}</p>
                                <div class="causes-one__progress">
                                    <div class="causes-one__progress-shape"
                                         style="background-image: url({{url('assets/images/shapes/causes-one-progress-shape-1.png')}});">
                                    </div>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="{{$project->percentage_amount_collected == 0 ? "0" : number_format($project->percentage_amount_collected)}}%">
                                            <div class="count-text">{{$project->percentage_amount_collected == 0 ? "0" : number_format($project->percentage_amount_collected)}}%</div>
                                        </div>
                                    </div>
                                    <div class="causes-one__goals">
                                        <p><span>Rp. {{$project->amount_collected == 0 ? "0" : number_format($project->amount_collected, 0, 0, '.')}}</span></p>
                                        <p><span>Rp. {{number_format($project->target_amount, 0, 0, '.')}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="donation-details__organizer">
                            <div class="sidebar-shape-1"
                                 style="background-image: url({{asset('assets/images/shapes/sidebar-shape-1.png')}});"></div>
                            <div class="donation-details__organizer-content">
                                <p class="donation-details__organizer-date">Dipost {{$project->created_at->format('d/m/Y')}}</p>
                                <p class="donation-details__organizer-name">Tim iSalam Wakaf</p>
                                <ul class="list-unstyled donation-details__organizer-list">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-tag"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{$project->category->category}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-map-marker-alt"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{$project->location}}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Donate Now End-->

@endsection

@section('scripts')
<script src="{{asset('assets/js/donate_now.js')}}"></script>
@endsection
