<div class="modal fade" id="editArea">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-edit"></span> 
                        Editar Area
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="PUT" action="#">
                    {{ csrf_field() }}
                    <input  type="hidden" id='ModalId'>

                    <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }} row">
                        <div class="col-4">
                            <label class="form-control-label" ><i class="fa fa-tv"></i> Area: </label>
                        </div>
                        <div class="col-8">
                            <input id="ModalArea" type="text" class="form-control" name="area" autofocus required >
                            @if ($errors->has('area'))
                            <span class="help-block">
                                <strong>{{ $errors->first('area') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('university_id') ? ' has-error' : '' }} row">
                        <div class="col-4">
                            <label class="form-control-label"><i class='fa fa-university'></i> Universidad: </label>
                        </div>
                        <div class="col-8">
                            <select id="ModalUniversity_id" class='form-control' value='0' name="university_id" size='1'>
                                @foreach($university as $item)
                                <option value="{{$item->id}}">{{$item->id}} - {{$item->university}}</option>
                                @endforeach                   
                            </select>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('address_id') ? ' has-error' : '' }} row">
                        <div class="col-4">
                            <label class="form-control-label"><i class='fa fa-map'></i> Localizacion:</label>
                        </div>
                        <div class="col-8">
                            <select id="Modaladdress_id" class='form-control' value='0' name="address_id" size='1'>
                                @foreach($address as $item)
                                <option value="{{$item->id}}">{{$item->id}} - {{$item->addres}}</option>
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