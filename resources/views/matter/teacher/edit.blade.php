@extends('layouts.appDashboard')
@section('title','| Unidad Curricular '. $matter->matter)
@section('nameTitleTemplate','Unidad Curricular '. $matter->matter)
@section('js')
<script type="text/javascript">
  $('textarea').wysihtml5({
        toolbar: { fa: true }
      });
</script>
@endsection
@section('content')
<div class="container-fluid mt--8">
      <div class="row">
        <div class="col-xl order-xl-2 mb-5 mb-xl-0">
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
                  <h5>Sementre</h5>
                  <div class="col-12">
                    <input class='form-control' type="text" name="semester" value='{{$matter->semester}}' placeholder="{{ $matter->semester }}">
                  </div><hr>      
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>
                  <h5>Credito</h5>
                  <div class="col-12">
                    <input class='form-control' type="text" name="credit" value='{{$matter->credit}}' placeholder="{{ $matter->credit }}">
                  </div><hr>      
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>
                  <h5>Horas</h5>
                    <div class="row">
                        
                      <div class="col">
                        <label>HT</label>
                        <input class='form-control' type="text" name="ht" value='{{$matter->ht}}' placeholder="{{ $matter->ht }}">
                      </div><hr> 
                      <div class="col">
                        <label>HP</label>
                        <input class='form-control' type="text" name="hp" value='{{$matter->hp}}' placeholder="{{ $matter->hp }}">
                      </div><hr> 
                      <div class="col">
                        <label>HL</label>
                        <input class='form-control' type="text" name="hl" value='{{$matter->hl}}' placeholder="{{ $matter->hl }}">
                      </div> 
                    </div>
                </div><hr>
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
              </div>
            </div>
            <div class="card-footer">
              <button class='btn btn-block btn-primary' type="submit">Editar</button>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection