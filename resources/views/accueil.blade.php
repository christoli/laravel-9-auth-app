@extends('./layouts/app');

@section('page-content')

    @auth
        <div class="card mt-2">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <form action="/articles" method="POST" class="form-product">
                    @method('post')
                    @csrf

                    <h4>Enregistrer un Article</h4>
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" class="form-control" placeholder="Titre de l'article" name="titre" value={{ old('titre') }}>
                        @error('titre')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <textarea name="description" class="form-control mt-1" placeholder="Entrez la description"></textarea>
                        @error('description')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- <input type="text" placeholder="Email" name="email" value={{ old('email') }}> -->
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
        </div>
    @endauth
    <ul class="list-group mt-5">
        <h4>Articles disponibles</h4>
        @forelse ($articles as $article)
            <li class="list-group-item">
                <a href="{{ route('articles.show', $article->id) }}" class="title">{{ $article->titre}}</a>
                <div class="description">{{ $article->description}}</div>
            </li>
        @empty
            <p class="text text-info">Aucun article trouvé.</p>
        @endforelse
    </ul>
    <div class="mt-5">
        {{ $articles->links() }}
    </div>

@endsection