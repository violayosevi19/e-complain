@extends('layout.main')
@section('container')
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo">REVIEW COMPLAIN</a>
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
                                <div class="dropdown mb-3">
                                    <a id="jenisComplainDropdown" class="dropdown-toggle btn btn-secondary" type="button"
                                        href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="no-icon" id="selectedStatusLabel">
                                            @switch($complains->status)
                                                @case('Belum Diproses')
                                                    Belum Diproses
                                                @break

                                                @case('Sedang Dikerjakan')
                                                    Sedang Dikerjakan
                                                @break

                                                @case('Sudah Selesai Dikerjakan')
                                                    Sudah Selesai Dikerjakan
                                                @break

                                                @default
                                                    Pilih Status
                                            @endswitch
                                        </span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="jenisComplainDropdown">
                                        <a class="dropdown-item" href="#" data-value="Belum Diproses">Belum
                                            Diproses</a>
                                        <a class="dropdown-item" href="#" data-value="Sedang Dikerjakan">Sedang
                                            Dikerjakan</a>
                                        <a class="dropdown-item" href="#" data-value="Sudah Selesai Dikerjakan">Sudah
                                            Selesai Dikerjakan</a>
                                    </div>
                                    <input type="hidden" id="hiddenJenisComplainInput" name="status"
                                        value="{{ $complains->status }}">
                                </div>

                                @if ($complains->tanggapan !== null)
                                    <div class="mb-3">
                                        <p>
                                            <i class="fa-solid fa-circle-check text-success"></i> Tanggapan telah
                                            ditanggapi
                                        </p>

                                    </div>
                                @endif

                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary text-center" name="submit"
                                        id="submit">Simpan</button>
                                    <a href="/review-complain" class="btn btn-info text-center w-100"
                                        style="margin-left: 1rem;">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
