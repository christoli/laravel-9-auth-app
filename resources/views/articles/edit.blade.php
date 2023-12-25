@extends('./../layouts/app');

@section('page-content')
    <div class="row mt-2">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card-body">
                <h4>Editer un article</h4>
                <form action="{{ route('articles.update', $article->id) }}" method = "POST">
                    @csrf
                    @method('put')

                    <input type="text" name="titre" value="{{ $article->titre }}" class="form-control">

                    <textarea name="description" class="form-control mt-1">
                        {{ $article->description }}
                    </textarea>

                    <div class="buttons">
                        <button type="submit" class="btn btn-success mt-1">Actualiser</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection