<div class="modal fade" id="editUniversity">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-edit"></span> 
                        Editar Universidad
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" method="PUT" action="#">
                {{ csrf_field() }}
                <input  type="hidden" id='ModalId'>
                <div class="form-group{{ $errors->has('university') ? ' has-error' : '' }}">
                    <input id="Modaluniversity" type="text" placeholder="Nombre de la Universidad" class="form-control" name="university" autofocus required >
                    @if ($errors->has('university'))
                    <span class="help-block">
                        <strong>{{ $errors->first('university') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('address_id') ? ' has-error' : '' }}">
                    <select id="Modaladdress_id" class='form-control' value='0' name="address_id" size='1'>
                        @foreach($address as $item)
                        <option value="{{$item->id}}">{{$item->id}} - {{$item->addres}}</option>
                        @endforeach                   
                    </select>
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