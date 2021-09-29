@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-info text-white" href="{{route('users.index')}}">< Back to Users</a>
            <div class="card mt-2">

                <div class="card-header">Edit UserProfile</div>

                <div class="card-body">
                         @include('alert-notification')

                    <form method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class=" text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

                                @error('email')
                                    <span class=" text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea name="address" id="address" cols="5" rows="5" class="form-control  @error('address') is-invalid @enderror">{{ ($user->profile) ? $user->profile->address : ''}}</textarea>
                                @error('address')
                                    <span class=" text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_no" class="col-md-4 col-form-label text-md-right">{{ __('Contact No') }}</label>

                            <div class="col-md-6">
                                <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ ($user->profile) ? $user->profile->contact_no: ''  }}"   autocomplete="contact_no">

                                @error('contact_no')
                                    <span class=" text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                            <div class="col-md-6">
<p class="text-info">(Please upload -100x100 image)</p>
                                @if ($user->profile && $user->profile->profile_image)
                                   <img style="width: 50%;height: 50%;" class="thumbnail" src="{{asset('storage/images/users/'.$user->profile->profile_image)}}" alt="" srcset="">
                                @endif
                                <input type="file" name="profile_image" id="profile_image" class="form-control">
                                @error('profile_image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="Upload & Update">
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
