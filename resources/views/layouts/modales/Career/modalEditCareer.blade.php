<div class="modal fade" id="editCareer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col">
                        <h3><span class="fa fa-edit"></span> 
                            Editar Carrera
                        </h3>
                    </div>
                    <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
                </div>
                <div class="modal-body">
                 <form class="form-horizontal" method="PUT" action="#">
                    {{ csrf_field() }}
                    <input  type="hidden" id='ModalId'>

                    <div class="form-group{{ $errors->has('career') ? ' has-error' : '' }} row">
                        <div class="col-4">
                            <label class="form-control-label"><i class='ni ni-hat-3'></i> Carrera:</label>
                        </div>
                        <div class="col-8">
                            <input id="ModalCareer" type="text" class="form-control" name="career" autofocus required >
                            @if ($errors->has('career'))
                            <span class="help-block">
                                <strong>{{ $errors->first('career') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('modalidad') ? ' has-error' : '' }} row">
                        <div class="col-4">
                            <label class="form-control-label"><i class="ni ni-ruler-pencil"></i> Modalidad:</label>
                        </div>
                        <div class="col-8">
                            <input id="ModalModalidad" type="text" placeholder="Modalidad de la carrera" class="form-control" name="modalidad" autofocus required >
                            @if ($errors->has('modalidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('modalidad') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }} row">
                        <div class="col-4">
                            <label class="form-control-label"><i class='ni ni-building'></i> Area:</label>
                        </div>
                        <div class="col-8">
                            <select id="ModalArea" class='form-control' value='0' name="area_id" size='1'>
                                @foreach($area as $item)
                                <option value="{{$item->id}}">{{$item->id}} - {{$item->area}}</option>
                                @endforeach                   
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12">
                                 <a href="#" class='btn btn-primary btn-block' id='btnEdit'>Editar</a>
                            </div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>