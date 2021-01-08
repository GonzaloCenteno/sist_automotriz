@extends('layouts.app')

@section('content-login')
<div class="content pt-5 mt-2">
    <div class="col-12 col-md-6 col-lg-4 offset-md-3 offset-lg-4">
        <div class="card">
            <div class="card-header card-header-primary text-center" style="background: #383d81">
                <img src="{{ asset('img/logo.png') }}" class="img-fluid py-4">
            </div>
            <div class="card-body">
                <p class="card-category text-center">Completar los datos para Iniciar Sesion</p>
                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group @error('email') label-floating has-danger @enderror">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                            <i class="material-icons">email</i>
                                        </button>
                                    </span>
                                    <input id="email" aria-describedby="email_text" type="email" placeholder="Correo Electronico..." class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" autofocus>
                                    @error('email')
                                        <span class="material-icons form-control-feedback">clear</span>
                                    @enderror
                                </div>
                                @error('email')<span id="email_text" class="form-text text-muted text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group @error('password') label-floating has-danger @enderror">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                            <i class="material-icons">lock_outline</i>
                                        </button>
                                    </span>
                                    <input id="password" type="password" aria-describedby="password_text" placeholder="Contraseña..." class="form-control" name="password">

                                    @error('password')
                                        <span class="material-icons form-control-feedback">clear</span>
                                    @enderror
                                </div>
                                @error('password')<span id="password_text" class="form-text text-muted text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-round btn-lg btn-primary pull-right text-center">INGRESAR</button>
                        </div>
                    </div>
                    <div class="form-group has-danger has-error has-feedback">
                        <h3 class="invalid-feedback"><b>{{ $errors->has('message') ? $errors->first('message',':message') : '' }}</b></h3>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
