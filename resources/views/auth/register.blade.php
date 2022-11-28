@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('S\'Inscrire') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addresse Email ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Service -->
                        <div class="row mb-3">
                                     <label for="" class="col-md-4 col-form-label text-md-end">
                                     Niveau Centrale
                                    </label>
                                <div class="col-md-6">
                                    <select  id="niveauplanification_id" class="form-select form-select-lg mb-3 @error('niveauplanification_id') is-invalid @enderror" name="niveauplanification_id">
                                        <option value="">Choisissez un Niveau de Planification</option>
                                        @foreach ($niveauplanification as $niveauplanification)
                                            <option value="{{ $niveauplanification->id }}">{{ $niveauplanification->name_niveauplanification }}</option>
                                        @endforeach
            
                                    </select>
                                    @error('niveauplanification_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                            <div class="row mb-3">
                             
                                     <label for="" class="col-md-4 col-form-label text-md-end">
                                     Direction Centrale
                                     </label>
                                <div class="col-md-6">
                                     <select name="directioncentrale_id" id="directioncentrale_id" class="form-select form-select-lg mb-3 @error('directioncentrale_id') is-invalid @enderror">
            
                                     </select>
                                     @error('directioncentrale_id')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                        <label for="" class="col-md-4 col-form-label text-md-end">
                                            Direction
                                        </label>
                                <div class="col-md-6">

                                    <select name="sousdirection_id" id="sousdirection_id" class="form-select form-select-lg mb-3 @error('sousdirection_id') is-invalid @enderror">
                                    </select>
            
                                    @error('directioncentrale_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
         
                            <div class="row mb-3">
                                             <label for="" class="col-md-4 col-form-label text-md-end">
                                             Service
                                             </label>
                                    <div class="col-md-6">
                                         <select name="service_id" id="service_id" class="form-select form-select-lg mb-3">
                                            <option value="">Choisir un Service</option>
                                         </select>
         
                                         @error('service_id')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                    </div>
                            </div>
                        
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="is_admin">
                                {{__('Role')}}</label>
                                <div class="col-md-6">
                                    <select name="is_admin" id="is_admin" class="form-select form-select-lg mb-3 @error('is_admin') is-invalid @enderror">
                                        <option value="">Choisir un Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Utilisateur">Utilisateur</option>
                                    </select>
                                    @error('is_admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="is_admin">
                                {{__('Niveau')}}</label>
                                <div class="col-md-6">
                                    <select name="niveau" id="niveau" class="form-select form-select-lg mb-3" @error('niveau') is-invalid @enderror">
                                        <option value="">Choisir un Niveau</option>
                                        <option value="DG">DG</option>
                                        <option value="DR">DR</option>
                                        <option value="Chef">Chef</option>                                    </select>
                                    @error('niveau')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de Pass') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer le Mot de Passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('S\'Inscrire') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
