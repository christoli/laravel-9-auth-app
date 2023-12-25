@extends('./../layouts/app');

@section('page-content')
    <div class="card">
        <div class="card-body">
            <a href="/accueil" class="btn btn-info">Retour</a>
            <div class="title mt-2">{{ $article->titre }}</div>
            <p>{{ $article->description }}</p>
        </div>

        @auth
            @if(Auth::user()->id == $article->user_id)
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-2">
                            <a href ="{{ route('articles.edit', $article->id) }}" class="btn btn-info">Editer</a>
                        </div>
                        <div class="col-md-2">
                        <form action="{{ route('articles.delete', $article->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            @endif
        @endauth
    </div>
@endsection