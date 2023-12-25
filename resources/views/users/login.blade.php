@extends('./../layouts/app')

@section('page-content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        <form action="{{route('login')}}" method="POST" class="form-product">
                            @method('post')
                            @csrf

                            <h4>Connectez-vous</h4>
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
                            <button type="submit" class="btn btn-success">Connexion</button>
                        </form>
                        <p class="mt-1">Aucun compte ? <a href="{{route('registration')}}">Inscrivez-vous</a></p>
                    </div>
                </div>
        </div>
        <div class="col-md-4"></div>
    </div>

@endsection