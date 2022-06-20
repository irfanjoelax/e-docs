<html>

<head>
    <title>LEMBAR DISPOSISI SURAT</title>
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
                <th scope="col">#</th>
                <th scope="col">No. Surat</th>
                <th scope="col">Kode</th>
                <th scope="col">Perihal</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Tgl Surat</th>
                <th scope="col">Tgl Keluar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suratKeluars as $suratKeluar)
            <tr>
                <th scope="row">
                    {{ $loop->iteration }}
                </th>
                <td>{{ $suratKeluar->no_surat }}</td>
                <td>{{ $suratKeluar->klasifikasi->kode }}</td>
                <td>{{ $suratKeluar->perihal }}</td>
                <td>{{ $suratKeluar->tujuan }}</td>
                <td>{{ $suratKeluar->tgl_surat }}</td>
                <td>{{ $suratKeluar->tgl_keluar }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center text-danger">
                    Surat keluar has empty or not found
                </td>
            </tr>
            @endforelse
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