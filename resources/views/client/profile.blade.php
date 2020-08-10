@extends('client.layouts.homer')


@section('content')
    <div class="profile">
        <div class="profile-image">
                 <img  style="margin: 0 auto" src={{asset('images/faces/face-0.jpg')}} alt="" class="avatar">
        </div>

        <div class="bio-info">
            <div class="bio-info-details">
            <table class="table borderless">
                <tr>
                    <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-circle-09"></i> Name</td>
                    <td style="font-weight: 200">{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-circle-09"></i> Staff Number</td>
                    <td style="font-weight: 200">{{Auth::user()->staff_number}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold ;padding-left: 10px"> <i class="nc-icon nc-paper-2"></i> BirthDate:</td>
                    <td style="font-weight: 200">{{ \Carbon\Carbon::parse( Auth::user()->birth_date)->isoFormat('MMMM, DD YYYY')}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-refresh-02"></i> Status:</td>
                    <td style="font-weight: 200">{{Auth::user()->status }}</td>
                </tr>
            </table>
            </div>


            <div class="bio-info-details">
                <table class="table borderless">
                    <tr>
                        <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-bank"></i> Department</td>
                        <td style="font-weight: 200">{{Auth::user()->department->name}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-pin-3"></i>  Location</td>
                        <td style="font-weight: 200">{{Auth::user()->location->name}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-paper-2"></i> Date of First Appointment:</td>
                        <td style="font-weight: 200">{{ \Carbon\Carbon::parse( Auth::user()->date_first_appointment)->isoFormat('MMMM, DD YYYY')}}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-paper-2"></i> Date of Last Promotion:</td>
                        <td style="font-weight: 200">
                            @if(Auth::user()->date_last_promotion)
                              {{ \Carbon\Carbon::parse( Auth::user()->date_last_promotion)->isoFormat('MMMM, DD YYYY')}}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="bio-info-details">
                <table class="table borderless">
                    <tr>
                        <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-badge"></i> Qualification</td>
                        <td style="font-weight: 200">{{Auth::user()->qualification->name}}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-bag"></i> Grade</td>
                        <td style="font-weight: 200">{{Auth::user()->grade->name}}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold ;padding-left: 10px"><i class="nc-icon nc-settings-tool-66"></i> Job</td>
                        <td style="font-weight: 200">{{Auth::user()->job->name}}</td>
                    </tr>
                </table>
            </div>


            <div class="bio-info-details">
                <table class="table borderless">
                    <tr>
                        <td style="font-weight: bold"><i class="nc-icon nc-email-85"></i> Email</td>
                        <td style="font-weight: 200">{{Auth::user()->email}}</td>
                    </tr>
                </table>
                <div class="bio-content">
                    <i class="nc-icon  nc-key-25"></i><button style="margin-left: 10px" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginAvatar">Change Password</button>


                    <!--Modal: Login with Avatar Form-->
                    <div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                            <!--Content-->
                            <div class="modal-content">

                                <!--Body-->
                                <div class="modal-body text-center mb-1">

                                    {!! Form::open(['route' => 'change_password','method' => 'patch'] ) !!}

                                    <div class="md-form ml-0 mr-0">
                                        {!! Form::label('password', 'New Password:') !!}
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                        @if ($errors->has('password'))
                                            <span class="error-block">
                                                 <strong>{{ $errors->first('password') }}</strong>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="md-form ml-0 mr-0">
                                        {!! Form::label('password_confirmation', 'Confirm Password:') !!}
                                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                        @if ($errors->has('password_confirmation'))
                                            <span class="error-block">
                                                     <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-success mt-1">Submit</button>
                                    </div>


                                    {!! Form::close() !!}
                                </div>

                            </div>
                            <!--/.Content-->
                        </div>
                    </div>


                    <!--Modal: Login with Avatar Form-->

                </div>
            </div>
        </div>
    </div>


@endsection
