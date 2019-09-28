<div class="modal fade" id="createUniversity">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-user"></span> 
                        Crear Universidad
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('University.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('university') ? ' has-error' : '' }}">
                        <input id="university" type="text" placeholder="Nombre de la Universidad" class="form-control" name="university" autofocus required >
                        @if ($errors->has('university'))
                        <span class="help-block">
                            <strong>{{ $errors->first('university') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address_id') ? ' has-error' : '' }}">
                        <select id="address_id" class='form-control' value='0' name="address_id" size='1'>   <option value="0">Direccriones</option>
                            @foreach($address as $item)
                            <option value="{{$item->id}}">{{$item->id}} - {{$item->addres}}</option>
                            @endforeach
                            <option value="{{sizeof($address)+1}}" id='otraAddress'>Otra</option>
                        </select>

                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <input id="address" type="text" placeholder="Otra Direccion" class="d-none form-control" name="address" autofocus>
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{$errors->first('address')}}</strong>
                        </span>
                        @endif
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