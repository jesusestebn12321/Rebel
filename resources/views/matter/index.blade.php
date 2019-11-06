@extends('layouts.appDashboard')
@if(Auth::user()->hasRole(2))
	@include('matter.teacher.index')
@elseif(Auth::user()->hasRole(1))
	@include('matter.admin.index')
@endif