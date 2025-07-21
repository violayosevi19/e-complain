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
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title text-center">Review Complain</h4>
                        </div>
                        <div class="card-body table-responsive p-4">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th style="border: none;">No</th>
                                        <th style="border: none;">Nama</th>
                                        <th style="border: none;">Email</th>
                                        <th style="border: none;">Tanggal/Waktu</th>
                                        <th style="border: none;">Jenis Complain</th>
                                        <th style="border: none;">Complain</th>
                                        <th style="border: none;">Image</th>
                                        <th style="border: none;">Tanggapan Complain</th>
                                        <th style="border: none;">Status</th>
                                        <th style="border: none;">Aksi</th>
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
                                            <td>{{ $review->created_at?->format('d M Y , H:i') ?? date('d-m-Y H:i') }}</td>
                                            <td>{{ $review->jeniscomplain_id }}</td>
                                            <td>{{ $review->complain }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $review->image) }}" alt="Gambar Bukti"
                                                    width="100">
                                            </td>
                                            <td>{{ $review->tanggapan }}</td>
                                            <td>
                                                @if ($review->status == 'Belum Diproses')
                                                    <span class="badge badge-secondary">Belum Diproses</span>
                                                @elseif($review->status == 'Sedang Dikerjakan')
                                                    <span class="badge badge-warning">Sedang Dikerjakan</span>
                                                @else
                                                    <span class="badge badge-success">Sudah Selesai Dikerjakan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="flex flex-col gap-4">
                                                    <a href="/review-complain/{{ $review->id }}/edit"
                                                        class="btn btn-warning">Tanggapi</a>
                                                    <form class="d-inline" action="/review-complain/{{ $review->id }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger ml-2"
                                                            onclick="return confirm('Yakin ingin menghapus data ?')">Delete
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
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
