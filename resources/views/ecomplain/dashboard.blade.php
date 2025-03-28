@extends('layout.main')
@section('container')
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        
                        @if(!$hideActions)
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title text-center">PUSKESMAS DADOK TUNGGUL HITAM</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="puskesmas text-center">
                                    <img src="/../assets/img/puskesmas.jpg" class="img-puskesmas img-fluid"/>
                                    <img src="/../assets/img/puskesmas2.jpg" class="img-puskesmas img-fluid"/>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <p class="card-category">
                                            Puskesmas Dadok Tunggul Hitam, terletak di Tunggul Hitam, Padang, Sumatera Barat
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection