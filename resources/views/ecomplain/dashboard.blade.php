@extends('layout.main')
@section('container')
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"> Dashboard </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">

                <ul class="navbar-nav ml-auto">
                    @if (!$hideActions)
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
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <span class="no-icon">Log out</span>
                        </a>
                    </li>
                </ul>
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
                                <img src="/../assets/img/puskesmas.jpg" class="img-puskesmas img-fluid" />
                                <img src="/../assets/img/puskesmas2.jpg" class="img-puskesmas img-fluid" />
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
            @if (auth()->user()->jenisuser_id === 'Pasien')
                @php
                    $user_email = auth()->user()->email;
                    $userId = auth()->user()->id;
                @endphp
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Data Puskesmas</h4>
                            </div>
                            <div class="card-body ">
                                <div class="legend">
                                    <p style="font-size:14px;">
                                        <i class="nc-icon nc-square-pin"></i> <a
                                            href="https://maps.app.goo.gl/KUoBwpGG7yFmt7Ft8">Jl. Kesehatan No.10, Dadok
                                            Tunggul
                                            Hitam, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586</a>
                                    </p>
                                    <p style="font-size:14px;"><i class="nc-icon nc-email-85"></i> <a
                                            href="mailto:puskesmas.dadok@gmail.com"
                                            class="email">puskesmas.dadok@gmail.com<a>
                                    </p>
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
                            @if (session()->has('pesan'))
                                <div id="alert-message" class="alert alert-success alert-sm" role="alert"
                                    style="right: 15px; top: 15px;width:50%;margin-right:2rem;">
                                    {{ session('pesan') }}
                                </div>
                                <script>
                                    setTimeout(function() {
                                        document.getElementById('alert-message').style.display = 'none';
                                    }, 3000);
                                </script>
                            @endif
                            <div class="card-header ">
                                <h4 class="card-title">Silahkan isi form complain</h4>
                            </div>
                            <div class="card-body " style="width: 100%; height: 100%;">
                                <form action="/ecomplain" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="user_id" id="user_id"
                                            aria-describedby="user_id" value="{{ $userId }}" hidden
                                            @if ($hasPending) disabled @endif>
                                        <label for="nama" class="form-label label-complain">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            aria-describedby="nama" @if ($hasPending) disabled @endif>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label label-complain">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            aria-describedby="email" value="{{ $user_email }}"
                                            @if ($hasPending) disabled @endif>
                                    </div>
                                    <div class="dropdown">
                                        <a id="jenisComplainDropdown" class="dropdown-toggle btn ml-1 mt-1 mb-3"
                                            type="button" href="http://example.com" id="navbarDropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            @if ($hasPending) disabled @endif
                                            @if ($hasPending) style="pointer-events: none; opacity: 0.6; cursor: not-allowed;" @endif>
                                            <span class="no-icon">Silahkan Pilih Jenis Complain</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach ($jeniscomplains as $jeniscomplain)
                                                <a class="dropdown-item" href="#"
                                                    data-value="{{ $jeniscomplain->jeniscomplain }}">{{ $jeniscomplain->jeniscomplain }}</a>
                                            @endforeach
                                        </div>
                                        <input type="hidden" id="hiddenJenisComplainInput" name="jeniscomplain_id"
                                            value="" @if ($hasPending) disabled @endif>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileUpload" class="form-label label-complain">Upload Bukti
                                        </label>
                                        <input class="form-control form-control-sm" type="file" id="fileUpload"
                                            name="image" @if ($hasPending) disabled @endif>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label label-complain">Tulis complain
                                            disini</label>
                                        <textarea type="text" class="form-control" name="complain" id="complain" aria-describedby="emailHelp"
                                            @if ($hasPending) disabled @endif></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary text-center" name="submit"
                                        id="submit">Laporkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title text-center">Review Complain</h4>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="/download-laporan" class="btn btn-primary mr-2">Download File
                                </a>
                            </div>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-lg" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal/Waktu</th>
                                            <th>Jenis Complain</th>
                                            <th>Complain</th>
                                            <th>Image</th>
                                            <th>Tanggapan Complain</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($reviewcomplain as $review)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $review->nama }}</td>
                                                <td>{{ $review->email }}</td>
                                                <td>{{ $review->created_at?->format('d M Y , H:i') ?? date('d-m-Y H:i') }}
                                                </td>
                                                <td>{{ $review->jeniscomplain_id }}</td>
                                                <td>{{ $review->complain }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $review->image) }}"
                                                        alt="Gambar Bukti" width="100">
                                                </td>
                                                <td>{{ $review->tanggapan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            @endif

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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            paging: true,
            pageLength: 10,
            lengthMenu: [
                [20, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            language: {
                info: false,
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Data Tidak Ditemukan",
                search: "Cari:",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            info: false
        });
        $('#myTable').parent().css('text-align', 'right');
        $('.dataTables_length label .form-select').css({
            'padding-right': '20px',
            'white-space': 'nowrap',
            'width': '30%'
        });
        $('#myTable_info').css({
            'font-family': 'Open Sans, sans-serif',
            'font-size': '12px'
        });
        $('.dataTables_paginate .pagination .active .page-link').css('color', 'white');
    });
</script>

