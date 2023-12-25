@extends('./../layouts/app')

@section('page-content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="{{route('registration')}}" method="POST" class="form-product">
                            @method('post')
                            @csrf

                            <h4>Nouvel utilisateur</h4>
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" placeholder="Nom de l'utilisateur" name="nom" value={{ old('nom') }}>
                                @error('nom')
                                    <div class="text text-danger">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email"  class="form-control" placeholder="Email" name="email" value={{ old('email') }}>
                                @error('email')
                                    <div class="text text-danger">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mot de passe</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <div class="text text-danger">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Inscription</button>
                        </form>
                        <p class="mt-1">Deja un compte ? <a href="{{route('login')}}">Connectez-vous</a></p>
                    </div>
                </div>
        </div>
        <div class="col-md-4"></div>
    </div>

@endsection