@extends('layouts.appp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: darkred">NBTS LOGIN</div>

                

                <div class="card-body">
                <form method="POST" action="{{ route('nbts.login.submit')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Employee id</label>

                            <div class="col-md-6">
                                <input id="username" type="number" class="form-control @error('id') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

                            <div class="col-md-6">
                                <select id="position"  class="form-control @error('position') is-invalid @enderror" name="position" >

                                    <option value="exec">System Executive</option>
                                    <option value="zonaldir">Zone Director</option>
                                    <option value="nbtsdir">Center Director</option>
                                    <option value="nbtslab">Center lab technician</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="station" class="col-md-4 col-form-label text-md-right">Station id</label>

                            <div class="col-md-6">
                                <input id="station_id" type="number" class="form-control @error('station_id') is-invalid @enderror" name="station" required autocomplete="current-station">

                                @error('station_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right   return true;   return true;ight">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn text-white" style="background-color: darkred">
                                    Login
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
