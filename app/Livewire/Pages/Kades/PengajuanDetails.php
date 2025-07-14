<?php

namespace App\Livewire\Pages\Kades;

use Livewire\Component;
use App\Models\PengajuanMigrasi;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Livewire\Attributes\Layout;
#[Layout('layouts.kades')]

class PengajuanDetails extends Component
{
    public $pengajuan;

    public function mount($pengajuanId)
    {
        $this->pengajuan = PengajuanMigrasi::findOrFail($pengajuanId);
    }

    public function setujuiPengajuan()
    {
        $this->pengajuan->update(['status' => 'disetujui']);

        $this->generateSuratPDF_FPDI();


        session()->flash('success', 'Pengajuan disetujui dan surat PDF berhasil dibuat.');
    }

   public function generateSuratPDF_FPDI()
{
    $templatePath = storage_path('app/template/template_surat_migrasi_acro.pdf');
    $outputName = 'surat_' . uniqid() . '.pdf';
    $outputPath = storage_path('app/public/surat/' . $outputName);

    $pengajuan = $this->pengajuan;

    // Format tanggal
    $tanggalNow = \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y');
    $tanggalLahir = \Carbon\Carbon::parse($pengajuan->tanggal_lahir)->locale('id')->translatedFormat('d F Y');
    $tanggalLahirRelasi = \Carbon\Carbon::parse($pengajuan->tanggal_lahir_relasi)->locale('id')->translatedFormat('d F Y');

    // Mulai FPDI
    $pdf = new Fpdi();
    $pdf->AddPage();
    $pdf->setSourceFile($templatePath);
    $tplIdx = $pdf->importPage(1);
    $pdf->useTemplate($tplIdx, 0, 0);

    // Set font
    $pdf->SetFont('Times', '', 12);

    // Tulis data di posisi (x, y) sesuai lokasi kolom isian di template PDF kamu
    $pdf->SetXY(79, 78.5);  // Nama Relasi
    $pdf->Write(0, $pengajuan->nama_relasi);

    $pdf->SetXY(79, 84.5);  // Tempat/Tgl Lahir Relasi
    $pdf->Write(0, $pengajuan->tempat_lahir_relasi . ', ' . $tanggalLahirRelasi);

    $pdf->SetXY(79, 90);  // NIK Relasi
    $pdf->Write(0, $pengajuan->nik_relasi);

    $pdf->SetXY(79, 96);  // Alamat Relasi
    $pdf->Write(0, $pengajuan->alamat_relasi);

    $pdf->SetXY(160, 105);  // kerabat
    $pdf->Write(0, $pengajuan->kerabat);

    $pdf->SetXY(70, 110);  // relasi
    $pdf->Write(0, $pengajuan->relasi);

    $pdf->SetXY(79, 118);  // nama user
    $pdf->Write(0, $pengajuan->nama);
    
    $pdf->SetXY(79, 123.5);  // Tempat/Tanggal Lahir user
    $pdf->Write(0, $pengajuan->tempat_lahir . ', ' . $tanggalLahir);

    $pdf->SetXY(79, 129);  // NIK
    $pdf->Write(0, $pengajuan->nik);

    $pdf->SetXY(79, 134.5);  // Jenis kelamin
    $pdf->Write(0, ucfirst($pengajuan->jenis_kelamin));

    $pdf->SetXY(79, 140.5);  // Status perkawinan
    $pdf->Write(0, ucfirst($pengajuan->status_perkawinan));

    $pdf->SetXY(79, 146.5);  // Alamat KTP
    $pdf->Write(0, $pengajuan->alamat_ktp);

    $pdf->SetXY(60, 155);  // nama_perusahaan, tempat_tujuan, negara_tujuan
    $pdf->Write(0, $pengajuan->nama_perusahaan . ', ' . $pengajuan->tempat_tujuan . ', ' . $pengajuan->negara_tujuan);

    $pdf->SetXY(120, 179);  // Tanggal surat
    $pdf->Write(0, 'Prapag Lor, ' . $tanggalNow);

    $pdf->SetXY(40, 209);  // Nama user (yang diberi izin)
    $pdf->Write(0, $pengajuan->nama);

    $pdf->SetXY(120, 209);  // Nama relasi (yang memberi izin)
    $pdf->Write(0, $pengajuan->nama_relasi);

    // Simpan PDF
    $pdf->Output($outputPath, 'F');

    // Simpan path ke database
    $pengajuan->update([
        'surat_pdf' => 'surat/' . $outputName
    ]);
}

    public function render()
    {
        return view('livewire.pages.kades.pengajuan-detail');
    }
}
