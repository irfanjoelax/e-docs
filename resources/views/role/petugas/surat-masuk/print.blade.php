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
        <tr>
            <td colspan="6" align="center">
                <h6>LEMBAR DISPOSISI</h6>
            </td>
        </tr>
        <tr>
            <td>
                Tanggal Surat
            </td>
            <td colspan="4">{{ $disposisi->surat_masuk->tgl_surat }}</td>
            <td rowspan="2">Kode : <br> <b>{{ $disposisi->surat_masuk->klasifikasi->kode }}</b></td>
        </tr>
        <tr>
            <td>
                Nomor Surat
            </td>
            <td colspan="4">{{ $disposisi->surat_masuk->no_surat }}</td>
        </tr>
        <tr>
            <td>
                Asal Surat
            </td>
            <td colspan="5"> {{ $disposisi->surat_masuk->asal_surat }}</td>
        </tr>
        <tr>
            <td>
                Perihal
            </td>
            <td colspan="5"> {{ $disposisi->surat_masuk->perihal }}</td>
        </tr>
        <tr>
            <td>
                Diterima Tanggal
            </td>
            <td colspan="5">{{ $disposisi->surat_masuk->tgl_masuk }}<br>
            </td>
        </tr>
        <tr>
            <td>
                Diteruskan Kepada
            </td>
            <td colspan="5">
                {{ $disposisi->tujuan }}<br>
            </td>
        </tr>
        <tr>
            <td>
                Isi Disposisi
            </td>
            <td colspan="5">
                {{ $disposisi->isi }}<br>
            </td>
        </tr>
        <tr>
            <td>
                Batas Waktu
            </td>
            <td colspan="5">
                {{ $disposisi->batas_waktu }}<br>
            </td>
        </tr>
        <tr>
            <td>
                Sifat
            </td>
            <td colspan="5">
                {{ $disposisi->sifat }}<br>
            </td>
        </tr>
        <tr>
            <td>
                Catatan
            </td>
            <td colspan="5">
                {{ $disposisi->catatan }}<br>
            </td>
        </tr>
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