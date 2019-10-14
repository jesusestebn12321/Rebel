@extends('layouts.appDashboard')
@section('title','| Unidad Curricular '. $matter->matter)
@section('nameTitleTemplate','Unidad Curricular '. $matter->matter)

@section('content')
<div class="container-fluid mt--8">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3>
                  Unidad Curricular
                </h3>
                <div class="h5 font-weight-300">
                  <form class='form-horizontal' method="PUT" action="{{route('Matters.up_date', $matter->slug)}}">

                  <div class="col-12">
                    <input class='form-control' type="text" name="matter" value="{{$matter->matter}}" placeholder="{{ $matter->matter }}">
                  </div><hr>      
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>
                  <h5>Versión</h5>
                  <div class="col-12">
                    <input class='form-control' type="text" name="version" value='{{$matter->version}}' placeholder="{{ $matter->version }}">
                  </div><hr>      
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Carrera
                  <select class='form-control' name="career_id" size='1'>
                    <option value="{{$matter->career_id}}">{{$matter->career->career}}</option>
                    @forelse($career as $item)
                    <option value="{{$item->id}}">{{$item->id}} - {{$item->career}}</option>
                    @empty

          
                        <font class='center'>No existen registros</font>
                     
                   @endforelse                  
                  </select> 
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Unidad Curricular - 
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class='btn btn-block btn-primary' type="submit">Editar</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xl-8 order-xl-1">
          <div class='row'>
        	@forelse($content as $item)
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="card card-profile shadow">
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                <form class="form-horizontal" action="{{route('Contents.up_date',$item->slug)}}">
                  
                  <a href="{{route('Contents.delete',$item->slug)}}" class="btn btn-sm btn-danger mr-4">Borrar</a>
                  <button type="submit" class="btn btn-sm btn-info float-ri ght">Editar</button>
                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                        <span class="heading">Titulo</span>
                        <span class="description">
                         <input type="text" name="title" value="{{$item->title}}" class="form-control"> 
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3>
                    Contenido
                  </h3>
                  <div class="h5 font-weight-300">
                    <p>
                    <textarea value='{{$item->content}}' name="content" class='form-control' placeholder="{{$item->content}}">{{$item->content}}</textarea>
                    </p>
                </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  		 @empty

          
              <font class='center'>No existen registros</font>
           
         @endforelse
        </div>
      </div>
    </div>
  </div>
@endsection