@extends('layout.main')
@section('container')
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">COMPLAIN</a>
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
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                <div class="row">
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Data Puskesmas</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="legend">
                                        <p style="font-size:14px;">
                                            <i class="nc-icon nc-square-pin"></i> <a href="https://maps.app.goo.gl/KUoBwpGG7yFmt7Ft8">Jl. Kesehatan No.10, Dadok Tunggul Hitam, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586</a>
                                        </p>
                                        <p style="font-size:14px;"><i class="nc-icon nc-email-85"></i> <a href="mailto:puskesmas.dadok@gmail.com" class="email">puskesmas.dadok@gmail.com<a></p>
                                        <p style="font-size:14px;"> <i class="fa fa-phone"></i> - </p>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card ">
                                 @if(session()->has('pesan'))
                                <div id="alert-message" class="alert alert-success alert-sm" role="alert" style="right: 15px; top: 15px;width:50%;margin-right:2rem;">
                                    {{ session('pesan') }}
                                </div>
                                <script>
                                    setTimeout(function() {
                                        document.getElementById('alert-message').style.display = 'none';
                                    }, 3000); 
                                </script>
                                @endif
                                <div class="card-header ">
                                    <h4 class="card-title">PUSKESMAS  DADOK TUNGGUL HITAM</h4>
                                </div>
                                <div class="card-body " style="width: 100%; height: 100%;">
                                <form action="/ecomplain" method="post">
                                    @csrf
                                <div class="dropdown">
                                <a id="jenisComplainDropdown" class="dropdown-toggle btn ml-1 mt-1 mb-3" type="button" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Jenis Complain</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach($jeniscomplains as $jeniscomplain)
                                    <a class="dropdown-item" href="#" data-value="{{ $jeniscomplain->jeniscomplain }}">{{$jeniscomplain->jeniscomplain}}</a>
                                    @endforeach
                                </div>
                                <input type="hidden" id="hiddenJenisComplainInput" name="jeniscomplain_id" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label label-complain">Tulis complain disini</label>
                                    <textarea type="text" class="form-control" name="complain" id="complain" aria-describedby="emailHelp"></textarea>
                                </div>
                                    <button type="submit" class="btn btn-primary text-center" name="submit" id="submit">Submit</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endsection