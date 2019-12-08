@extends('layouts.appDashboard')
@section('title','| Contenidos ')
@section('nameTitleTemplate','Existe mas de un contenido para la materia')

@section('content')
<div class="container-fluid mt--8">
      <div class="row">
        @forelse($content as $item)
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="card card-profile shadow">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">

              
                <form action="{{route('content.vigente',$item->matters->id)}}">
                <button type="submit" class=" btn btn-sm btn-success float-right">Verificar como vigente</button>
                @foreach($content as $items)
                  @if($items->id!=$item->id)
                    <input type="hidden" value="{{$items->id}}" name="{{$items->id}}">
                  @endif
                @endforeach
               <h1> </h1>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3>
                  {!!$item->title!!}
                </h3>
                <hr class="my-4">
                <label>Introduccion</label>
                <p>{!!  $item->introdution!!}</p>
                <label>Contenido</label>
                {!!  $item->content!!}</p>
              </div>
            </div>
            </form>
          </div>
        </div>
    @empty
      <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="card bg-info card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3 class="text-white">
                  No hay contenido para esta unidad curricular
                </h3>
              </div>
            </div>
          </div>
        </div>
    @endforelse
      </div>
    </div>
@endsection