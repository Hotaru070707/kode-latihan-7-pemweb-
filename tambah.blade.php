<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Pegawai - LP3I</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e8f0fe 0%, #f8f9fa 60%, #e3f2fd 100%);
      min-height: 100vh;
      font-family: 'Inter', sans-serif;
    }

    .page-header h2 {
      font-weight: 700;
      color: #1a73e8;
    }

    .card {
      border: none;
      border-radius: 18px;
      box-shadow: 0 8px 30px rgba(13, 110, 253, 0.08);
      overflow: hidden;
    }

    .card-header-custom {
      background: linear-gradient(135deg, #0d6efd, #0a58ca);
      padding: 20px 28px;
      color: white;
      border-radius: 18px 18px 0 0;
    }

    .card-header-custom h5 {
      margin: 0;
      font-weight: 600;
      font-size: 1.1rem;
    }

    .card-body-custom {
      padding: 28px;
      background: white;
    }

    .form-label {
      font-weight: 600;
      color: #495057;
      margin-bottom: 6px;
    }

    .form-control, .form-select {
      border-radius: 10px;
      border: 1.5px solid #dee2e6;
      padding: 10px 14px;
      font-size: 0.95rem;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.12);
    }

    .input-group-text {
      border-radius: 0 10px 10px 0;
      background-color: #f0f4ff;
      color: #0d6efd;
      font-weight: 600;
      border: 1.5px solid #dee2e6;
      border-left: none;
    }

    .input-group .form-control {
      border-radius: 10px 0 0 10px;
    }

    .btn-save {
      border-radius: 10px;
      padding: 12px 30px;
      font-weight: 600;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #0d6efd, #0a58ca);
      border: none;
    }

    .btn-save:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(13, 110, 253, 0.35);
    }

    .btn-back {
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s;
    }

    .btn-back:hover {
      transform: translateX(-2px);
    }

    .icon-circle {
      width: 40px;
      height: 40px;
      background: rgba(255,255,255,0.2);
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
    }

    .form-divider {
      border: none;
      border-top: 1.5px dashed #e9ecef;
      margin: 20px 0;
    }
  </style>
</head>
<body>

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <!-- Page Header -->
        <div class="page-header mb-4">
          <a href="/pegawai" class="btn btn-sm btn-outline-secondary btn-back mb-3">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
          </a>
          <h2><i class="bi bi-person-plus-fill me-2"></i>Tambah Pegawai</h2>
          <p class="text-muted">Isi formulir di bawah untuk menambahkan data pegawai baru ke sistem LP3I.</p>
        </div>

        <!-- Form Card -->
        <div class="card">
          <div class="card-header-custom">
            <h5>
              <span class="icon-circle"><i class="bi bi-clipboard-plus"></i></span>
              Formulir Data Pegawai
            </h5>
          </div>

          <div class="card-body-custom">
            <form action="/pegawai/store" method="post">
              {{ csrf_field() }}

              <!-- Nama -->
              <div class="mb-3">
                <label class="form-label">
                  <i class="bi bi-person me-1 text-primary"></i> Nama Lengkap
                </label>
                <input type="text"
                       class="form-control"
                       id="nama"
                       name="nama"
                       required="required"
                       placeholder="Masukkan nama lengkap pegawai">
              </div>

              <!-- Jabatan -->
              <div class="mb-3">
                <label class="form-label">
                  <i class="bi bi-briefcase me-1 text-primary"></i> Jabatan
                </label>
                <input type="text"
                       class="form-control"
                       id="jabatan"
                       name="jabatan"
                       required="required"
                       placeholder="Contoh: Manager, Staff, Supervisor">
              </div>

              <hr class="form-divider">

              <!-- Umur -->
              <div class="row">
                <div class="col-md-5 mb-3">
                  <label class="form-label">
                    <i class="bi bi-calendar me-1 text-primary"></i> Umur
                  </label>
                  <div class="input-group">
                    <input type="number"
                           class="form-control"
                           id="umur"
                           name="umur"
                           required="required"
                           min="17"
                           max="70"
                           placeholder="Contoh: 25">
                    <span class="input-group-text">Thn</span>
                  </div>
                </div>
              </div>

              <!-- Alamat -->
              <div class="mb-4">
                <label class="form-label">
                  <i class="bi bi-geo-alt me-1 text-primary"></i> Alamat Lengkap
                </label>
                <textarea class="form-control"
                          id="alamat"
                          name="alamat"
                          required="required"
                          rows="3"
                          placeholder="Masukkan alamat domisili pegawai"></textarea>
              </div>

              <!-- Submit Button -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-save">
                  <i class="bi bi-check-circle me-2"></i> Simpan Data Pegawai
                </button>
              </div>

            </form>
          </div>
        </div>

        <p class="text-center mt-4 text-muted small">&copy; 2026 LP3I Digital Learning - Project CRUD Laravel</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
