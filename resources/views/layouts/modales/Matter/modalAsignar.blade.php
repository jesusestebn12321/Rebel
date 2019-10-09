<div class="modal fade" id="asignarTeacher">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col">
                        <h3><span class="fa fa-user"></span> 
                            Asignar Unidad Curricular
                        </h3>
                    </div>
                </div>
                <div class="modal-body">
                <form class="form-horizontal" method="GET" action="{{route('Matter.asignar.teacher',$matter->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="matter_id" value="{{$matter->id}}"  autofocus required >
                    <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                        <input id="dni" type="number" placeholder="Cedula del profesor" class="form-control" name="dni" autofocus required >
                        @if ($errors->has('dni'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dni') }}</strong>
                            </span>
                        @endif
                    </div>
          
                    <div class="form-group"><label id="name"></label></div>
                    <div class="form-group"><label id="lastname"></label></div>
                    <div class="form-group"><label id="email"></label></div>
                </div>
                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12"><button type="submit" class="btn btn-primary btn-block">Asignar</button></div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>