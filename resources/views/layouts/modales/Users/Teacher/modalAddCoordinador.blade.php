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
                    <div class="form-group"><font>Nombre: </font><label id="name"></label></div>
                    <div class="form-group"><font>Apellido: </font><label id="lastname"></label></div>
                    <div class="form-group"><font>E-mail: </font><label id="email"></label></div>

                    <div class="form-group{{ $errors->has('matter_id') ? ' has-error' : '' }}">

                         <select id="matter_id" name="matter_id" class='form-control' value='0' name="type" size='1'>       
                            <option>Tipo</option>
                            @foreach($matter as $item)
                                <option value="{{$item->id}}">{{$item->id}} - {{$item->matter}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('matter_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('matter_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12">
                             <button class='btn btn-primary btn-block'>Crear</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>