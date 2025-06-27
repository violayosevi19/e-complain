<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CETAK TOKO CVBRV</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> -->
    <style type="text/css">
        header .nohp,
        header h1 {
            text-align: center;
            line-height: 0.5rem
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        /* Add this CSS rule for the No column */
        .small-col,
        .small-col {
            width: 5%;
        }

        .kode-col,
        .harga-col {
            width: 20%;
        }

        .stok-col {
            width: 40%;
        }

        .harga-col {
            width: 15%;
        }

        /* Rest of the CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        h1,
        h2,
        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:last-child {
            background-color: #ddd;
        }

        th,
        td {
            width: 25%;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .subtitle {
            font-size: 18px;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        .date-range {
            margin-bottom: 10px;
        }

        .total-stock {
            text-align: center;
        }

        .kopsurat {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #000;
        }

        .image {
            flex-basis: 25%;
            /* Bagian gambar akan mengambil 25% lebar kontainer */
            padding-right: 20px;
            /* Tambahkan padding agar ada jarak antara gambar dan teks */
        }

        .image img {
            max-width: 100%;
            height: auto;
        }

        .title {
            flex-basis: 75%;
            /* Bagian judul dan teks akan mengambil 75% lebar kontainer */
        }

        .title h2 {
            font-size: 24px;
            margin: 0;
        }

        .nohp {
            font-size: 16px;
            margin: 5px 0;
        }

        .title p {
            font-size: 16px;
            margin: 0;
            line-height: 1.2;
        }
    </style>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <div class="container">
            <h1>Daftar Complain</h1>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal/Waktu</th>
                    <th>Jenis Complain</th>
                    <th>Complain</th>
                    <th>Image</th>
                    <th>Tanggapan Complain</th>
                </tr>
                @php
                    $index = 1;
                @endphp
                @foreach ($datas as $item)
                    <tr>
                        <td class="small-col">{{ $index }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->created_at?->format('d M Y , H:i') ?? date('d-m-Y H:i') }}</td>
                        <td>{{ $item->jeniscomplain_id }}</td>
                        <td>{{ $item->complain }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar Bukti" width="100">
                        </td>
                        <td>{{ $item->tanggapan }}</td>
                    </tr>
                    @php

                        $index++; // Increment index for the next row
                    @endphp
                @endforeach
            </table>
        </div>
    </section>
</body>

</html>
<script type="text/javascript">
    window.print(); // Memicu fungsi pencetakan bawaan browser
</script>
