<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <!-- Hero Section -->
        <header class="mb-5 p-5 bg-primary text-white rounded-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4 fw-bold mb-3">Artikel Kami</h1>
                    <p class="lead mb-4 opacity-75">Kumpulan artikel menarik yang kami tulis untuk Anda</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="/" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </header>
        
        <!-- Search Form -->
        <div class="mb-5">
            <form action="{{ route('articles.index') }}" method="GET">
                <div class="input-group shadow-lg rounded-pill overflow-hidden">
                    <input type="text" name="keyword" value="{{ request('keyword') }}" 
                           class="form-control form-control-lg border-0" 
                           placeholder="Cari artikel berdasarkan judul...">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Articles Grid -->
        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <img src="{{ $article->image_url ?? 'https://via.placeholder.com/400x250?text=Article' }}" 
                                 class="card-img-top object-fit-cover" 
                                 alt="Gambar Artikel">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-2 text-muted">
                                <i class="bi bi-calendar me-2"></i>
                                <small>{{ $article->created_at->format('d M Y') }}</small>
                            </div>
                            <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                            <p class="card-text text-muted mb-3">
                                {{ $article->summary }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ route('articles.show', $article->id) }}" 
                                   class="btn btn-outline-primary w-100">
                                    Baca Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card shadow-sm border-0 text-center py-5">
                        <div class="card-body">
                            <i class="bi bi-search text-muted display-4 mb-3"></i>
                            <h4 class="fw-bold mb-3">Tidak ada artikel yang ditemukan</h4>
                            <p class="text-muted mb-4">Coba dengan kata kunci yang berbeda</p>
                            <a href="{{ route('articles.index') }}" class="btn btn-primary px-4">
                                Lihat Semua Artikel
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>