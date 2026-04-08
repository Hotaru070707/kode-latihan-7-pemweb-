<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Pegawai - LP3I</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body { background-color: #f8f9fa; }
    .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .form-label { fw-bold; color: #495057; }
    .btn-save { border-radius: 8px; padding: 10px 25px; transition: 0.3s; }
    .btn-save:hover { transform: translateY(-2px); box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3); }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="mb-4">
          <a href="/pegawai" class="btn btn-sm btn-outline-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
          <h2 class="fw-bold text-primary">Edit Pegawai</h2>
          <p class="text-muted">Perbarui informasi data pegawai LP3I di sini.</p>
        </div>

        <div class="card p-4">
          @foreach($pegawai as $p)
          <form action="/pegawai/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $p->pegawai_id }}">

            <div class="mb-3">
              <label class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text" class="form-control" required="required" name="nama" value="{{ $p->pegawai_nama }}" placeholder="Masukkan nama pegawai">
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Jabatan</label>
              <input type="text" class="form-control" required="required" name="jabatan" value="{{ $p->pegawai_jabatan }}" placeholder="Contoh: Manager, Staff, dll">
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Umur</label>
                <div class="input-group">
                  <input type="number" class="form-control" required="required" name="umur" value="{{ $p->pegawai_umur }}">
                  <span class="input-group-text">Thn</span>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">Alamat Lengkap</label>
              <textarea class="form-control" required="required" name="alamat" rows="3" placeholder="Masukkan alamat domisili">{{ $p->pegawai_alamat }}</textarea>
            </div>

            <div class="d-grid">
              <button type="button" id="btnUpdate" class="btn btn-primary btn-save">
                <i class="bi bi-check-circle me-1"></i> Simpan Perubahan Data
              </button>
            </div>
          </form>
          @endforeach
        </div>

        <p class="text-center mt-4 text-muted small">&copy; 2026 LP3I Digital Learning</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('btnUpdate').addEventListener('click', function () {
      const nama    = document.querySelector('input[name="nama"]').value.trim();
      const jabatan = document.querySelector('input[name="jabatan"]').value.trim();
      const umur    = document.querySelector('input[name="umur"]').value.trim();
      const alamat  = document.querySelector('textarea[name="alamat"]').value.trim();

      // Validasi semua field terisi
      if (!nama || !jabatan || !umur || !alamat) {
        Swal.fire({
          icon: 'warning',
          title: 'Data Belum Lengkap!',
          text: 'Harap isi semua kolom sebelum menyimpan perubahan.',
          confirmButtonColor: '#0d6efd',
          confirmButtonText: 'Oke, Mengerti'
        });
        return;
      }

      // Konfirmasi simpan perubahan
      Swal.fire({
        icon: 'question',
        title: 'Simpan Perubahan?',
        html: `Apakah Anda yakin ingin memperbarui data pegawai berikut?<br><br>
               <b>Nama&nbsp;&nbsp;&nbsp;:</b> ${nama}<br>
               <b>Jabatan :</b> ${jabatan}<br>
               <b>Umur&nbsp;&nbsp;&nbsp;:</b> ${umur} Tahun<br>
               <b>Alamat&nbsp;:</b> ${alamat}`,
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="bi bi-check-circle"></i> Ya, Perbarui!',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Memperbarui...',
            text: 'Mohon tunggu sebentar.',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => { Swal.showLoading(); }
          });
          document.querySelector('form').submit();
        }
      });
    });
  </script>
</body>
</html>
