@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @if(session()->has('status'))
                    <div class="alert alert-success">
                    {!! session('status') !!}
                    </div>


                @endif
                @if(session()->has('statuserror'))
                    <div class="alert alert-danger">
                    {!! session('statuserror') !!}
                    </div>
                @endif
             <div class="card-header">{{ __('Update Password') }}</div>


            <div class="card">


                <div class="card-body">

                    <form method="POST" action="{{ route('update.password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="old_pass" class="col-sm-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="old_pass" type="password" class="form-control{{ $errors->has('old_pass') ? ' is-invalid' : '' }}" name="old_pass" value="{{ old('old_pass') }}" required autofocus>

                                @if ($errors->has('old_pass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('old_pass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirm_pass" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirm_pass" type="password" class="form-control{{ $errors->has('confirm_pass') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
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
