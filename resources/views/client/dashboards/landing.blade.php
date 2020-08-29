@extends('client.layouts.homer')


@section('content')
    <div class="alert alert-info alert-dismissible" id="the_alert" style="display: none;">
        <a href="#" onclick="$('#the_alert').hide()" class="close"  aria-label="close">&times;</a>
        <p><strong>Success!</strong> Indicates a successful or positive action.</p>
    </div>

    <div class="cards-container">

        @if ($appraisal)
            @if ($appraisal->status == 'Completed' || $appraisal->status == 'Disapproved')
                <a href='/intro'>
                    <div class="card">
                        <div class="card-header">
                            Self Appraisal
                        </div>
                        <div class="card-body">
                            <h2 class="number" style="color: #76ff03">&#10141;</h2>
                        </div>
                        <div class="card-footer text-muted" style="background-color:#76ff03; height: 30px">
                        </div>
                    </div>
                </a>
            @endif
        @else
            <a href='/intro'>
                <div class="card">
                    <div class="card-header">
                        Self Appraisal
                    </div>

                    <div class="card-body">
                        <h2 class="number" style="color: #76ff03">&#10141;</h2>
                    </div>

                    <div class="card-footer text-muted" style="background-color:#76ff03; height: 30px">
                    </div>
                </div>
            </a>

        @endif

        <a href={{route('client.approved')}} class="link">
            <div class="card">
                <div class="card-header">
                    Completed Appraisals
                </div>
                <div class="card-body">
                    <h2 class="number">{{$approved}}</h2>
                </div>
                <div class="card-footer text-muted" style="background-color: #2196f3; height: 30px">
                </div>
            </div>
        </a>


        <a href={{route('client.pending')}}>
            <div class="card">
                <div class="card-header">
                    Pending Evaluation
                </div>
                <div class="card-body">
                    <h2 class="number">
                        {{$pendingEvaluation}}
                    </h2>

                </div>
                <div class="card-footer text-muted" style="background-color:#ea80fc ; height: 30px">
                </div>
            </div>
        </a>

        <a href={{route('client.approval')}} >
            <div class="card">
                <div class="card-header">
                    Pending Your Approval
                </div>
                <div class="card-body">
                    <h2 class="number">
                        {{$pendingMyApproval}}
                    </h2>
                </div>
                <div class="card-footer text-muted" style="background-color: yellow; height: 30px">
                </div>
            </div>
        </a>

            @if(count(Auth::user()->employees) > 0)
                <a href={{ route('client.sup_appraise.index')}} >
                    <div class="card">
                        <div class="card-header">
                            Employees To Appraise
                        </div>
                        <div class="card-body">
                            <h2 class="number">
                                {{$newToEval}}
                            </h2>
                        </div>
                        <div class="card-footer text-muted" style="background-color: #e91e63; height: 30px">
                        </div>
                    </div>
                </a>
            @endif


    </div>

@endsection
