<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Data Pegawai - LP3I</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <style>
    body { background-color: #f8f9fa; }
    .card { border: none; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .table thead { background-color: #0d6efd; color: white; }
    .btn-tambah { border-radius: 8px; transition: 0.3s; }
    .btn-tambah:hover { transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
  </style>
</head>
<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-11">

        <div class="text-center mb-4">
          <h2 class="fw-bold text-primary">Belajar Laravel LP3I</h2>
          <p class="text-muted">Manajemen Data Pegawai Digital</p>
        </div>

        <div class="card p-4">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold"><i class="bi bi-people-fill me-2"></i>Daftar Pegawai</h4>
            <a href="/pegawai/tambah" class="btn btn-primary btn-tambah">
              <i class="bi bi-plus-lg me-1"></i> Tambah Pegawai Baru
            </a>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th class="py-3 px-4">Nama</th>
                  <th>Jabatan</th>
                  <th class="text-center">Umur</th>
                  <th>Alamat</th>
                  <th class="text-center">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pegawai as $p)
                <tr>
                  <td class="px-4 fw-medium text-dark">{{ $p->pegawai_nama }}</td>
                  <td><span class="badge bg-light text-primary border border-primary-subtle px-3 py-2">{{ $p->pegawai_jabatan }}</span></td>
                  <td class="text-center">{{ $p->pegawai_umur }} Thn</td>
                  <td class="text-muted">{{ $p->pegawai_alamat }}</td>
                  <td class="text-center">
                    <div class="btn-group" role="group">
                      <a href="pegawai/edit/{{ $p->pegawai_id }}" class="btn btn-sm btn-outline-warning mx-1">
                        <i class="bi bi-pencil-square"></i> Edit
                      </a>
                      <a href="pegawai/hapus/{{ $p->pegawai_id }}" class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="bi bi-trash"></i> Hapus
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          @if($pegawai->isEmpty())
          <div class="alert alert-info text-center mt-3">
            Belum ada data pegawai tersedia.
          </div>
          @endif

        </div>

        <p class="text-center mt-4 text-muted small">&copy; 2026 LP3I Digital Learning - Project CRUD Laravel</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
