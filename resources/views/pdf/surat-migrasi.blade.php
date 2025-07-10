<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Ijin Migrasi</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.7;
            font-size: 14px;
            padding: 30px;
        }
        .kop {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop h2, .kop h3 {
            margin: 0;
            line-height: 1.4;
        }
        .kop p {
            margin: 4px 0;
            font-size: 12px;
        }
        .judul {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
            text-decoration: underline;
        }
        .nomor {
            text-align: center;
            margin-bottom: 25px;
        }
        .ttd-section {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
        }
        .ttd {
            text-align: center;
            width: 30%;
        }
        .footer-ttd {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <div style="display: flex; align-items: center; margin-bottom: 20px;">
        <img src="{{ public_path('images/kop_surat_kecil.png') }}" style="width: 130px; height: auto; margin-right: 15px;" alt="Logo">
        
        <div style="text-align: center; flex: 1;">
            <h3 style="margin: 0; font-size: 16px;">PEMERINTAH KABUPATEN BREBES</h3>
            <h2 style="margin: 2px 0; font-size: 18px;">KECAMATAN BULAKAMBA</h2>
            <h1 style="margin: 2px 0; font-size: 20px;">DESA PRAPAG LOR</h1>
            <p style="margin: 0; font-size: 12px;">Jl. Prapag Raya No. 1, Bulakamba, Brebes</p>
        </div>
    </div>

    <div class="judul">SURAT IJIN SUAMI/ISTRI/ORANG TUA</div>
    <div class="nomor">No: 300 / 30 / VII / {{ \Carbon\Carbon::now()->year }}</div>

    <p>Yang bertanda tangan di bawah ini:</p>
    <ul>
        <li><strong>Nama:</strong> {{ $pengajuan->nama_relasi }}</li>
        <li><strong>Tempat/Tgl Lahir:</strong> {{ $pengajuan->tempat_lahir_relasi }}, {{ \Carbon\Carbon::parse($pengajuan->tanggal_lahir_relasi)->translatedFormat('d F Y') }}</li>
        <li><strong>NIK:</strong> {{ $pengajuan->nik_relasi }}</li>
        <li><strong>Alamat:</strong> {{ $pengajuan->alamat_relasi }}</li>
    </ul>

    <p>Dengan ini menyatakan dengan sebenar-benarnya bahwa saya sebagai <strong>{{ $pengajuan->kerabat }}</strong>, memberikan izin kepada <strong>{{ $pengajuan->relasi }}</strong> saya:</p>

    <ul>
        <li><strong>Nama:</strong> {{ $pengajuan->nama }}</li>
        <li><strong>Tempat/Tgl Lahir:</strong> {{ $pengajuan->tempat_lahir }}, {{ \Carbon\Carbon::parse($pengajuan->tanggal_lahir)->translatedFormat('d F Y') }}</li>
        <li><strong>NIK:</strong> {{ $pengajuan->nik }}</li>
        <li><strong>Jenis Kelamin:</strong> {{ ucfirst($pengajuan->jenis_kelamin) }}</li>
        <li><strong>Status:</strong> {{ ucfirst($pengajuan->status_perkawinan) }}</li>
        <li><strong>Alamat:</strong> {{ $pengajuan->alamat_ktp }}</li>
    </ul>

    <p>Untuk bekerja di <strong>{{ $pengajuan->nama_perusahaan }}</strong>, {{ $pengajuan->tempat_tujuan }}, {{ $pengajuan->negara_tujuan }} selama masa kontrak kerja sesuai ketentuan yang berlaku.</p>

    <p>Demikian surat ijin ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>

    <div class="ttd-section">
        <div class="ttd">
            <p>Yang diberi ijin</p>
            <div class="footer-ttd">
                <p>{{ $pengajuan->nama }}</p>
            </div>
        </div>
        <div class="ttd">
            <p>Prapag Lor, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Yang memberi ijin</p>
            <div class="footer-ttd">
                <p>{{ $pengajuan->nama_relasi }}</p>
            </div>
        </div>
        <div class="ttd">
            <p>Mengetahui</p>
            <p>Kepala Desa Prapag Lor</p>
            
            <img src="{{ public_path('images/ttd_kades.png') }}" alt="TTD Kades" class="signed-img">


            <div class="footer-ttd">
                <p><strong><u>FAKHRUDDIN ANDES RAKA, SH</u></strong></p>
            </div>
        </div>
    </div>
</body>
</html>
