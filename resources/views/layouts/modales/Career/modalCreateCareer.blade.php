<div class="modal fade" id="createCareer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-plus"></span> 
                        Crear Carrera
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('Careers.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('career') ? ' has-error' : '' }}">
                        <input id="career" type="text" placeholder="Nombre de la Carrera" class="form-control" name="career" autofocus required >
                        @if ($errors->has('career'))
                        <span class="help-block">
                            <strong>{{ $errors->first('career') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('modalidad') ? ' has-error' : '' }}">
                        <input id="modalidad" type="text" placeholder="Modalidad de la carrera" class="form-control" name="modalidad" autofocus required >
                        @if ($errors->has('modalidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('modalidad') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
                        <select id="area_id" class='form-control' value='0' name="area_id" size='1'>
                            <option value="0">Area</option>

                            @foreach($area as $item)
                            <option value="{{$item->id}}">{{$item->id}} - {{$item->area}}</option>
                            @endforeach                   
                        </select>
                    </div>

                </div>
                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12">
                               <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>