@extends('layout.main')
@section('container')
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">COMPLAIN</a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">

                @if (!$hideActions)
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
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">BERI TANGGAPAN</h4>
                        </div>
                        <div class="card-body " style="width: 100%; height: 100%;">
                            <form action="/review-complain/{{ $complains->id }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label label-complain">Beri tanggapan
                                        disini</label>
                                    <textarea type="text" class="form-control" name="tanggapan" id="tanggapan" aria-describedby="emailHelp"
                                        style="height:50vh;">{{ $complains->tanggapan ? $complains->tanggapan : '' }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary text-center" name="submit"
                                    id="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
