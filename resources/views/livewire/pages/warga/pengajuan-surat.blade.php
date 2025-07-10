<div class="flex min-h-screen bg-gray-100">
  <div class="flex-1 p-6">
    <div class="form-section max-w-4xl mx-auto">
      <h2>Formulir Pengajuan Migrasi</h2>

      <form wire:submit.prevent="submit" enctype="multipart/form-data" class="form-grid">

        <div class="full">
          <label>Nama</label>
          <input type="text" wire:model="nama" class="form-input" />
          @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>NIK</label>
          <input type="text" wire:model="nik" class="form-input" maxlength="16" />
          @error('nik') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>Jenis Kelamin</label>
          <select wire:model="jenis_kelamin" class="form-select">
            <option value="">--Pilih--</option>
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
          </select>
        </div>

        <div>
          <label>Tempat Lahir</label>
          <input type="text" wire:model="tempat_lahir" class="form-input" />
          @error('tempat_lahir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>Tanggal Lahir</label>
          <input type="date" wire:model="tanggal_lahir" class="form-input" />
          @error('tanggal_lahir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="full">
          <label>Alamat KTP</label>
          <textarea wire:model="alamat_ktp" class="form-textarea" rows="2"></textarea>
          @error('alamat_ktp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>Foto Diri (JPG/PNG)</label>
          <input type="file" wire:model="foto_diri" class="form-input" accept=".jpg,.jpeg,.png" />
          @error('foto_diri') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>Status Perkawinan</label>
          <select wire:model="status_perkawinan" class="form-select">
            <option value="">--Pilih--</option>
            <option value="kawin">Kawin</option>
            <option value="belum kawin">Belum Kawin</option>
          </select>
        </div>

    

        <h3 class="text-xl font-semibold mb-2">Data Relasi Keluarga</h3>

        <hr class="my-6 border-gray-300">

        <div>
            <label>Kerabat</label>
            <input type="text" wire:model="kerabat" class="form-input" placeholder="Contoh: Istri, Suami, Anak, Orang Tua" />
            @error('kerabat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Relasi kerabat dengan pemohon</label>
            <input type="text" wire:model="relasi" class="form-input" placeholder="Contoh: Anak dari Ibu" />
            @error('relasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Nama (Relasi)</label>
            <input type="text" wire:model="nama_relasi" class="form-input"/>
            @error('nama_relasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>


        <div>
            <label>Tempat Lahir (Relasi)</label>
            <input type="text" wire:model="tempat_lahir_relasi" class="form-input" />
            @error('tempat_lahir_relasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Tanggal Lahir (Relasi)</label>
            <input type="date" wire:model="tanggal_lahir_relasi" class="form-input" />
            @error('tanggal_lahir_relasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>NIK (Relasi)</label>
            <input type="text" wire:model="nik_relasi" maxlength="16" class="form-input" />
            @error('nik_relasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Alamat (Relasi)</label>
            <textarea wire:model="alamat_relasi" class="form-textarea" rows="2"></textarea>
            @error('alamat_relasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <h3 class="text-xl font-semibold mb-2">Data Migran</h3>

        <hr class="my-6 border-gray-300">


        <div>
          <label>Status PMI</label>
          <select wire:model="status_pmi" class="form-select">
            <option value="">--Pilih--</option>
            <option value="Calon PMI">Calon PMI</option>
            <option value="PMI">PMI</option>
            <option value="Purna PMI">Purna PMI</option>
          </select>
        </div>

        <div>
          <label>Tujuan Keluar Negeri</label>
          <input type="text" wire:model="tujuan_keluar_negeri" class="form-input" />
          @error('tujuan_keluar_negeri') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>Negara Tujuan</label>
          <input type="text" wire:model="negara_tujuan" class="form-input" />
          @error('negara_tujuan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>Kota Tempat Tujuan</label>
          <input type="text" wire:model="tempat_tujuan" class="form-input" />
          @error('tempat_tujuan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
          <label>Nama Perusahaan</label>
          <input type="text" wire:model="nama_perusahaan" class="form-input" />
          @error('nama_perusahaan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="full">
          <label>Upload Surat Penawaran Kerja (PDF/JPG/PNG)</label>
          <input type="file" wire:model="surat_penawaran_kerja" class="form-input" accept=".pdf,.jpg,.jpeg,.png" />
        </div>

        @if ($status_pmi === 'Purna PMI')
        <div class="full">
          <label>Pengalaman Kerja</label>
          <textarea wire:model="pengalaman_kerja" class="form-textarea"></textarea>
        </div>
        <div class="full">
          <label>Pengelolaan Upah</label>
          <textarea wire:model="pengelolaan_upah" class="form-textarea"></textarea>
        </div>
        <div class="full">
          <label>Ingin Kembali ke Luar Negeri?</label>
          <input type="text" wire:model="keinginan_kembali" class="form-input" />
        </div>
        @endif

        <div class="full text-right">
          <button type="submit" wire:loading.attr="disabled" class="bg-blue-600 text-white px-4 py-2 rounded">
                Ajukan
            </button>

        </div>
      </form>
    </div>
  </div>

  <!-- Modal -->
<div x-data="{ show: false }"
     x-on:form-success.window="show = true"
     x-show="show"
     wire:ignore.self
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-md text-center max-w-md w-full">
        <h3 class="text-2xl font-bold text-green-600 mb-2">Pengajuan Berhasil!</h3>
        <p>Pengajuan migrasi Anda telah dikirim.</p>
        <button @click="location.href = '/riwayat'" class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Tutup</button>
    </div>
</div>

