@extends('layout.main')
@section('container')
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"> Review Complain </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">

                @if (!$hideActions)
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="notifDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell fa-lg"></i>

                                @if (count($notifications ?? []) > 0)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-size: 0.6rem; min-width: 18px; height: 18px; padding: 4px;">
                                        {{ count($notifications) }}
                                    </span>
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifDropdown">
                                @forelse ($notifications as $notif)
                                    <a href="{{ route('review-complain.read', $notif->id) }}"
                                        class="dropdown-item notif-link" data-id="{{ $notif->id }}">
                                        <strong>{{ $notif->nama }} baru saja menambahkan complain</strong><br>
                                        <small>{{ Str::limit($notif->complain, 40) }}</small><br>
                                        <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                                    </a>

                                @empty
                                    <span class="dropdown-item text-muted">Tidak ada notifikasi</span>
                                @endforelse
                            </div>
                        </li>
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
                <div class="col-md-12">
                    @if (session()->has('pesan'))
                        <div class="alert alert-danger" role="alert" id="alert">
                            {{ session('pesan') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title text-center">Review Complain</h4>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/laporan" class="btn btn-primary mr-2">Download File
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <th>No</th>
                                    <th>Tanggal/Waktu</th>
                                    <th>Jenis Complain</th>
                                    <th>Complain</th>
                                    <th>Tanggapan Complain</th>
                                    @if (!$hideActions)
                                        <th>Aksi</th>
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach ($reviewcomplain as $review)
                                        <tr>
                                            <td>{{ $review->id }}</td>
                                            <td>{{ $review->created_at }}</td>
                                            <td>{{ $review->jeniscomplain_id }}</td>
                                            <td>{{ $review->complain }}</td>
                                            <td>{{ $review->tanggapan }}</td>
                                            @if (!$hideActions)
                                                <td>
                                                    <a href="/review-complain/{{ $review->id }}/edit"
                                                        class="btn btn-warning">Berikan Tanggapan</a>
                                                    <form class="d-inline" action="/ecomplain/{{ $review->id }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger ml-2"
                                                            onclick="return confirm('Yakin ingin menghapus data ?')">Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="/../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#alert").fadeOut("slow");
        }, 3000);
    });
</script>
