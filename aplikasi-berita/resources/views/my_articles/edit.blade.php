<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

    <div class="container my-5">
        <h1 class="display-5 fw-bold mb-4">Edit Artikel</h1>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('my-articles.update', $article->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Judul Artikel:</label>
                        <input type="text" name="title" id="title" class="form-control form-control-lg" value="{{ old('title', $article->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label fw-bold">Ringkasan:</label>
                        <textarea name="summary" id="summary" rows="3" class="form-control" required>{{ old('summary', $article->summary) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label fw-bold">URL Gambar (Opsional):</label>
                        <input type="url" name="image_url" id="image_url" class="form-control" value="{{ old('image_url', $article->image_url) }}" placeholder="https://contoh.com/gambar.jpg">
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-bold">Konten Lengkap:</label>
                        <textarea name="content" id="content" rows="10" class="form-control" required>{{ old('content', $article->content) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg">
                        Update Artikel
                    </button>
                    <a href="{{ route('my-articles.index') }}" class="btn btn-link">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>