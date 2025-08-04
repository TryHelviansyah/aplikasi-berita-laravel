<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
            --muted-text: #6c757d;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
            line-height: 1.8;
        }
        
        .article-header {
            margin-bottom: 3rem;
        }
        
        .article-title {
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--dark-text);
        }
        
        .article-meta {
            color: var(--muted-text);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }
        
        .article-image {
            border-radius: 12px;
            margin: 2rem 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .article-image:hover {
            transform: scale(1.01);
        }
        
        .article-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--dark-text);
        }
        
        .article-content p {
            margin-bottom: 1.5rem;
        }
        
        .back-button {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .back-button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }
        
        .back-button i {
            margin-right: 8px;
        }
        
        .container-article {
            max-width: 800px;
            background-color: white;
            border-radius: 12px;
            padding: 3rem;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        
        @media (max-width: 768px) {
            .container-article {
                padding: 2rem;
                margin-top: 1.5rem;
            }
            
            .article-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container container-article">
        <article>
            <header class="article-header">
                <h1 class="article-title">{{ $article->title }}</h1>
                <div class="article-meta">
                    <i class="far fa-calendar-alt me-1"></i> 
                    Dipublikasikan pada: {{ $article->created_at->format('d F Y') }}
                </div>
                
                <img src="{{ $article->image_url ?? 'https://via.placeholder.com/800x400?text=Article' }}" 
                     class="img-fluid article-image" 
                     alt="Gambar Artikel">
            </header>

            <div class="article-content">
                {!! nl2br(e($article->content)) !!}
            </div>
            
            <div class="text-center mt-5">
                <a href="{{ route('articles.index') }}" class="btn back-button">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Artikel
                </a>
            </div>
        </article>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>