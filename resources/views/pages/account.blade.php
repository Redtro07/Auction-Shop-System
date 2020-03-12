@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">User Account</div>
            <div class="card-body">
                {!! Form::open(['url' => 'foo/bar', 'method' => 'put']) !!}
                <a href="#" data-toggle="modal" data-target="#changeprofile" style="color: black;">
                    {{-- <img src="/storage/user_profile/{{$userInfo->profile}}" height="120px" width="125px" style="float: left; border-radius: 50%!important;" alt=""> --}}
                  </a>
                  <br>
                  <div class="modal fade" id="changeprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Change Profile</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            {{FORM::file('profile')}}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="padding-top: 120px">
                    <small class="badge badge-warning">if you change your profile picture, click your picture</small>
                  <br>
                {{FORM::label('title', 'Full Name',['class' => 'label'])}}
                {{FORM::text('name', $users->name, ['class' => 'form-control', 'placeholder' => 'Insert your Full name.'])}}
                {{FORM::label('title', 'Phone')}}<br>
                <small>If you want remove some Numbers Just <b>"click"</b> the number. </small>
                {{-- {{FORM::text('title', $userInfo->phone, ['class' => 'form-control', 'placeholder' => 'Insert new Number.'])}} --}}
                <br>
                @if (count($usersConNumbers) > 0)
                  @foreach ($usersConNumbers as $usersConNumber)
                      <div class="badge badge-success">
                      <a href="/account/{{$usersConNumber->id}}" style="color: #fff;">{{$usersConNumber->phone_number}}</a>
                      </div>
                  @endforeach
                @else
                      <div class="badge badge-danger" style="text-align: center;">
                        {{FORM::label('title', 'No Phone Number')}}
                      </div>
                @endif
                <div class="badge badge-warning">
                  <a href="#" data-toggle="modal" data-target="#exampleModal" style="color: black;"><i class="fas fa-plus"></i></a>
                  </div>
                <br>
                <hr>
                <br>
                  <div class="text-center">
                    <a href="{{url('/change-password')}}">
                      {{FORM::label('title', 'Change Your Password?')}}
                    </a>
                  </div>
              </div>
                {{FORM::submit('Submit', ['class' => 'btn btn-primary'])}}
                {!! FORM::close() !!}
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Number</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {!! FORM::open(['action' => 'phoneController@store','method' => 'post']) !!}

                    <div class="form-group">
                        {{FORM::text('number','',['class' => 'form-control', 'placeholder' => '+63'])}}
                        <br>
                        {{Form::select('type', ['Mobile' => 'Mobile', 'Telephone' => 'Telephone'], 'Mobile')}}
                      </div>
                        {{FORM::submit('submit',['class' => 'btn btn-success'])}}
                    {!! FORM::close() !!}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
    </div>
@endsection
