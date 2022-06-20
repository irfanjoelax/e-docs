<html>

<head>
    <title>LAPORAN DISPOSISI SURAT</title>
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
                <th>No.</th>
                <th>Surat Masuk</th>
                <th>Tujuan</th>
                <th>Isi</th>
                <th>Batas Waktu</th>
                <th>Sifat</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($disposisis as $disposisi)
            <tr>
                <th scope="row">
                    {{ $loop->iteration }}
                </th>
                <td>{{ $disposisi->surat_masuk->no_surat }}</td>
                <td>{{ $disposisi->tujuan }}</td>
                <td>{{ $disposisi->isi }}</td>
                <td>{{ $disposisi->batas_waktu }}</td>
                <td>{{ $disposisi->sifat }}</td>
                <td>{{ $disposisi->catatan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-danger">
                    Disposisi has been empty
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