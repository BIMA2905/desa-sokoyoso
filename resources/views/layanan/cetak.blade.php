<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Surat - {{ strtoupper($pengajuan->jenis_layanan) }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; margin: 40px; color: #000; }
        .kop-surat { text-align: center; border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-surat h3, .kop-surat h4, .kop-surat p { margin: 2px 0; }
        .judul { text-align: center; font-weight: bold; text-decoration: underline; margin: 20px 0; font-size: 16px; }
        .content { margin-top: 20px; line-height: 1.6; }
        .table-data { width: 100%; margin-top: 15px; border-collapse: collapse; }
        .table-data td { padding: 5px 0; vertical-align: top; }
        .ttd { margin-top: 50px; float: right; text-align: center; width: 250px; }
        .btn-print { margin-bottom: 20px; }
        @media print {
            .btn-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="btn-print">
        <button onclick="window.print()" style="padding: 10px 20px; background: #28a745; color: #fff; border: none; cursor: pointer; font-size: 14px; border-radius: 5px;">🖨️ Cetak / Simpan ke PDF</button>
        <a href="{{ route('layanan.cek-form') }}" style="margin-left: 10px; text-decoration: none; color: #555;">Kembali</a>
    </div>

    <!-- Kop Surat Resmi Desa -->
    <div class="kop-surat">
        <h3>PEMERINTAH KABUPATEN ...</h3>
        <h3>KECAMATAN ...</h3>
        <h4>DESA SOKOYOSO</h4>
        <p><small>Jl. Raya Desa Sokoyoso No. 1, Kode Pos 543xx</small></p>
    </div>

    <!-- Judul Surat -->
    <div class="judul">
        SURAT KETERANGAN {{ strtoupper(str_replace('-', ' ', $pengajuan->jenis_layanan)) }}
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Sokoyoso, Kecamatan ..., Kabupaten ..., dengan ini menerangkan bahwa:</p>
        
        <table class="table-data">
            <tr>
                <td style="width: 200px;">Nama Lengkap</td>
                <td>: <strong>{{ $pengajuan->nama }}</strong></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $pengajuan->nik }}</td>
            </tr>
            @php $detail = json_decode($pengajuan->detail_data); @endphp
            @if($pengajuan->jenis_layanan == 'usaha')
                <tr>
                    <td>Nama Usaha</td>
                    <td>: {{ $detail->nama_usaha ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Bidang Usaha</td>
                    <td>: {{ $detail->jenis_usaha ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat Usaha</td>
                    <td>: {{ $detail->alamat_usaha ?? '-' }}</td>
                </tr>
            @elseif($pengajuan->jenis_layanan == 'domisili')
                <tr>
                    <td>Alamat Tempat Tinggal</td>
                    <td>: {{ $detail->alamat ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>: {{ $detail->keperluan ?? '-' }}</td>
                </tr>
            @elseif($pengajuan->jenis_layanan == 'pengaduan')
                <tr>
                    <td>Perihal Pengaduan</td>
                    <td>: {{ $detail->judul_pengaduan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Isi Laporan</td>
                    <td>: {{ $detail->isi_pengaduan ?? '-' }}</td>
                </tr>
            @endif
        </table>

        <p style="margin-top: 20px;">
            Berdasarkan data yang ada pada kami, benar bahwa nama tersebut di atas adalah warga Desa Sokoyoso yang mengajukan permohonan <strong>{{ $pengajuan->jenis_layanan }}</strong>. Surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <!-- Tanda Tangan Kepala Desa -->
    <div class="ttd">
        <p>Sokoyoso, {{ date('d F Y') }}</p>
        <p>Kepala Desa Sokoyoso</p>
        <br><br><br>
        <p><strong>( ........................................ )</strong></p>
    </div>

</body>
</html>