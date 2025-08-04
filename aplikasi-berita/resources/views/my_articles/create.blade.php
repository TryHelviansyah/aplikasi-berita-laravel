<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="display-5 fw-bold mb-4 text-center">Tambah Artikel Baru</h1>

                        <form action="{{ route('my-articles.store') }}" method="POST">
                            @csrf 

                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Judul Artikel</label>
                                <input type="text" name="title" id="title" 
                                       class="form-control form-control-lg" 
                                       placeholder="Masukkan judul artikel" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="summary" class="form-label fw-bold">Ringkasan</label>
                                <textarea name="summary" id="summary" rows="3" 
                                          class="form-control" 
                                          placeholder="Ringkasan singkat artikel" required></textarea>
                            </div>
                            
                            <div class="mb-4">
                                <label for="image_url" class="form-label fw-bold">URL Gambar (Opsional)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-image"></i></span>
                                    <input type="url" name="image_url" id="image_url" 
                                           class="form-control" 
                                           placeholder="https://contoh.com/gambar.jpg">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Konten Lengkap</label>
                                <textarea name="content" id="content" rows="10" 
                                          class="form-control" 
                                          placeholder="Tulis konten artikel Anda di sini" required></textarea>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('my-articles.index') }}" class="btn btn-outline-secondary me-md-2">
                                    <i class="bi bi-x-circle me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Simpan & Publikasikan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>