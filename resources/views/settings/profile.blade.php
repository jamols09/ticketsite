@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    {{-- @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif --}}
                <form method="POST" action="{{route('profile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Profile Image') }}</label>
                            <div class="col-md-7">
                                <input type="file" name="image">
                            @if(Auth::user()->profile)
                                <img src="{{asset('storage/profile-img/'.Auth::user()->profile)}}" alt="Profile Picture" width="75px;" height="75px;">
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Name') }}</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Country') }}</label>
                            <div class="col-md-7">
                                <select name="country" class="form-control" id="country">
                                    @foreach ($countries as $country)
                                    <option value="{{$country}}" @if($user->country == $country) selected="selected" @else "" @endif>{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Date Of Birth') }}</label>
                            <div class="col-md-7">
                            <input id="dateofbirth" type="date" class="form-control @error('dob') is-invalid @enderror" name="dateofbirth" value="{{$user->dateofbirth}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="submit" class="float-right" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">Settings</div>
                <div class="card-body">

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
