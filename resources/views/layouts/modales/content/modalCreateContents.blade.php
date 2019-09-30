<div class="modal fade" id="createContent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-user"></span> 
                        Crear Contenido
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('Contents.store')}}">
                    {{ csrf_field() }}
                    <input type="hidden" id="matter_id" value="" name="matter_id">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <input id="title" type="text" placeholder="Nombre de la title" class="form-control" name="title" autofocus required >
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <textarea id="content" type="text" placeholder="Nombre de la contenido" class="form-control" name="content" autofocus required> </textarea>
                        @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
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