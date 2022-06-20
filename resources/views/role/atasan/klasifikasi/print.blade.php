<html>

<head>
    <title>REKAPITULASI KLASIFIKASI SURAT</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }

        footer {
            position: fixed;
            bottom: -40px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 9pt;

            /** Extra personal styles **/
            text-align: center;
            line-height: 35px;
        }

        .line {
            line-height: 50%;
        }
    </style>
</head>

<body>

    <table align="center">
        <tr>
            <td><img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo" width="120"> </td>
            <td>
                <center>
                    <font size="4"><b>{{ $instansi->nama }}</font></b><BR>
                    <font size="3">Alamat : {{ $instansi->alamat }} Telp. {{ $instansi->telepon }}</font><BR>
                    <font size="3"><i>Email : {{ $instansi->email }} </i></font>
                </center>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-active" bgcolor="#FFFFFF">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Klasifikasi</th>
                <th>Surat Masuk</th>
                <th>Surat Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($klasifikasis as $klasifikasi)
            <tr>
                <td>{{ $klasifikasi->kode }}</td>
                <td>{{ $klasifikasi->nama }}</td>
                <td>{{ $klasifikasi->surat_masuk->count() }}</td>
                <td>{{ $klasifikasi->surat_keluar->count() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <p align="right"> Kepala Badan<b> </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br><br> <u><b>{{ $instansi->pimpinan }}</b></u>
    </p>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>