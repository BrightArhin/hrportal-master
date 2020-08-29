@extends('client.layouts.welcomer')


@section('content')

    <div class="bio-heading">
        <div>
            <img class="home-images" src="{{asset('images/cocobod.jpg')}}" alt="">
        </div>
        <div style="margin-right: 70px; margin-top: 10px">
        <h2 style="text-align: center ;margin:0; font-weight: bold">GHANA COCOA BOARD</h2>
        <h3 style="text-align: center ;margin:0; font-weight: bold">PERFORMANCE APPRAISAL SYSTEM</h3>
        </div>

    </div>


    <div class="personal-info">
        <h4 style="text-align: center">PERSONAL INFORMATION</h4>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="width:200px; font-weight: bold">NAME</td>
                <td style="width:200px">{{strtoupper(Auth::user()->name)}}</td>
                <td style="width:200px; font-weight: bold">DATE OF BIRTH</td>
                <td style="width:200px">{{ strtoupper(\Carbon\Carbon::parse( Auth::user()->birth_date)->isoFormat('MMMM D, YYYY'))}}</td>
                <td style="font-weight:bold; text-align: center">AGE</td>
                <td>{{\Carbon\Carbon::parse(Auth::user()->birth_date)->diff(\Carbon\Carbon::now())->format('%y')}}</td>
            </tr>

            <tr>
                <td style="width:200px; font-weight: bold">CURRENT QUALIFICATION</td>
                <td style="width:200px">
                    @if(Auth::user()->qualification)
                        {{strtoupper(Auth::user()->qualification->name)}}
                        @else
                        {{''}}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold">JOB TITLE</td>
                <td style="">{{strtoupper(Auth::user()->job->name)}}</td>
                <td style="width:200px; font-weight: bold">GRADE</td>
                <td style="width:200px">{{strtoupper(Auth::user()->grade->name)}}</td>
            </tr>
            <tr>
                <td style="width:200px; font-weight: bold">DEPARTMENT/DIVISION</td>
                <td style="width:200px">{{strtoupper(Auth::user()->department->name)}}</td>
                <td style="width:200px; font-weight: bold">LOCATION</td>
                <td style="width:200px">{{strtoupper(Auth::user()->location->name)}}</td>
            </tr>

            <tr>
                <td style="width:200px; font-weight: bold">DATE OF FIRST APPOINTMENT</td>
                <td style="width:200px">{{strtoupper (\Carbon\Carbon::parse( Auth::user()->date_first_appointment)->isoFormat('MMMM DD, YYYY'))}}</td>
                <td style="width:200px; font-weight: bold">DATE OF LAST PROMOTION</td>
                <td style="width:200px">
                    @if(Auth::user()->date_last_promotion)
                    {{strtoupper (\Carbon\Carbon::parse( Auth::user()->date_last_promotion)->isoFormat('MMMM DD, YYYY'))}}
                    @endif
                </td>
            </tr>

            <tr>
                <td style="width:200px; font-weight: bold">REVIEW PERIOD FROM</td>
                <td style="width:200px">1ST OCTOBER {{\Carbon\Carbon::now()->subYear()->format('Y')}}</td>
                <td style="width:200px; font-weight: bold">TO</td>
                <td style="width:200px">30TH SEPTEMBER {{Carbon\Carbon::now()->year}}</td>
            </tr>

            <tr>
                <td style=" font-weight: bold">REVIEW CARRIED OUT BY</td>
                <td style="width:200px">
                    @if($supervisor)
                        {{strtoupper($supervisor->name)}}
                    @endif
                </td>
            </tr>

            <tr>
                <td style="font-weight: bold">REVIEWER'S JOB TITLE</td>
                <td>
                    @if($supervisor)
                        {{strtoupper($supervisor->job->name)}}
                        @endif
                </td>
            </tr>

            <tr>
                <td style="width:200px; font-weight: bold">DATE</td>
                <td style="width:200px">
                    {{strtoupper(\Carbon\Carbon::now()->isoFormat('MMMM DD, YYYY'))}}
                </td>
            </tr>


            </tbody>
        </table>

    </div>

    <div class="container-fluid" style="margin-top: 32px">
        <p style="text-align: justify; text-justify: inter-word;">
            The purpose of this Performance Appraisal is to promote the effective use of our staffing<br>
            resources. The essential requirement in the process is to review duties and performance levels,<br>
            Identify development needs and objectives for the coming year and to reward performance.
        </p>
         <h3 style=""><strong>AIM</strong></h3>
          <p >The aim of the Performance Appraisal and Development Plan is to:</p>
        <ol type="a" >
            <li>Encourage meaningful communication between the employee and supervisor</li>
            <li>Inform employees of their level of performance</li>
            <li>Identify skills and aptitudes for development</li>
            <li>Challenge the employee to continually improve performance and personal effectiveness</li>
        </ol>
    </div>

    <div style="display: flex; justify-content: space-between">
        <a href="/intro"><button  class="btn btn-warning" >Back </button></a>
        <a href="client/emp_appraise"><button  class="btn btn-success" >Next &#10141;</button></a>
    </div>
@endsection


