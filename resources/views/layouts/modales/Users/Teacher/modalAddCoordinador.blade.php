<div class="modal fade" id="addCoordinador">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-edit"></span> 
                        Editar Teacher
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post " action="{{route('coordinador.add')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                        <input id="dni" type="number" placeholder="Cedula del profesor" class="form-control" name="dni" autofocus required >
                        @if ($errors->has('dni'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dni') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('career') ? ' has-error' : '' }}">

                       <select id="career" class='form-control' value='0' size='1'>       
                        <option>Carrera</option>
                        @foreach($career as $item)
                        <option value="{{$item->id}}">{{$item->id}} - {{$item->career}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('career'))
                    <span class="help-block">
                        <strong>{{ $errors->first('career') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="d-none form-group{{ $errors->has('matter') ? ' has-error' : '' }}" id="div_matter">
                    <select id="matter" class='form-control' value='0' name="matter_id" size='1'></select>
                    @if ($errors->has('matter'))
                    <span class="help-block">
                        <strong>{{ $errors->first('matter') }}</strong>
                    </span>
                  @endif

              </div>
          </div>
          <div class="modal-footer"> 
            <div class='container'>
                <div class="row">        
                    <div class="col-12">
                       <button id='button' class='d-none btn btn-primary btn-block'>Crear</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>
</div>
</div>