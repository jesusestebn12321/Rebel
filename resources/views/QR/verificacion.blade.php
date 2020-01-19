@extends('layouts.appDashboard')
@section('title','| Dashboard')
@section('nameTitleTemplate','Dashboard')
@section('content')
<div class="row">
	<div class="col-xl-12">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">PDF</h6>
                  <h2 class="mb-0">{{$matter_user->user->name.' '.$matter_user->user->lastname .' C.I.:'.$matter_user->user->dni }}</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <embed src='{{asset("plugins/pdf.pdf")}}' type="application/pdf" width="800" height="600"></embed>
            </div>
          </div>
        </div>
</div>

@endsection
