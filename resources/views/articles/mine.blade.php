@extends('./../layouts/app');

@section('page-content')
<ul class="list-group mt-5">
        <h4>Articles disponibles</h4>
        @forelse ($myArticles as $article)
            <li class="list-group-item">
                <a href="{{ route('articles.show', $article->id) }}" class="title">{{ $article->titre}}</a>
                <div class="description">{{ $article->description}}</div>
            </li>
        @empty
            <p class="text text-info">Aucun article trouvé.</p>
        @endforelse
    </ul>
@endsection