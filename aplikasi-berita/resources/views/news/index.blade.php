<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <header class="mb-5 p-4 p-md-5 bg-primary text-white rounded-3">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4 fw-bold mb-3">{{ $pageTitle }}</h1>
                    <p class="lead mb-0 opacity-75">Berita terkini dari seluruh dunia.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="/my-articles" class="btn btn-outline-light">
                        <i class="bi bi-journal-text me-1"></i> Kelola Artikel Saya
                    </a>
                </div>
            </div>
        </header>

        <div class="mb-5">
            <form action="{{ route('news.index') }}" method="GET">
                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                    <span class="input-group-text bg-white border-0"><i class="bi bi-search"></i></span>
                    <input type="text" name="keyword" value="{{ request('keyword') }}" 
                           class="form-control form-control-lg border-0" 
                           placeholder="Cari berita...">
                    <button type="submit" class="btn btn-primary px-4">Cari</button>
                </div>
            </form>
        </div>

        @if (isset($error))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle me-2"></i>
                <strong>Oops!</strong> {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <img src="{{ $article['urlToImage'] ?? 'https://via.placeholder.com/400x250?text=No+Image' }}" 
                                 class="card-img-top object-fit-cover" 
                                 alt="Gambar Berita">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-2 text-muted small">
                                <i class="bi bi-calendar me-2"></i>
                                <span>{{ date('d M Y', strtotime($article['publishedAt'] ?? now())) }}</span>
                            </div>
                            <h5 class="card-title fw-bold">{{ $article['title'] }}</h5>
                            <p class="card-text text-muted mb-3">
                                {{ Str::limit($article['description'], 100) }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ $article['url'] }}" target="_blank" 
                                   class="btn btn-outline-primary w-100">
                                    <i class="bi bi-newspaper me-1"></i> Baca Selengkapnya
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
                            <h4 class="fw-bold mb-3">Tidak ada berita yang ditemukan</h4>
                            <p class="text-muted mb-4">Coba dengan kata kunci yang berbeda</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>