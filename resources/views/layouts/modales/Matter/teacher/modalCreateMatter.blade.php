<div class="modal fade" id="createMatter">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col">
                        <h3><span class="fa fa-user"></span> 
                            Crear Unidad Curricular
                        </h3>
                    </div>
                </div>
                <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('University.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
                        <input id="version" type="text" placeholder="Version de la Unidad Curricular" class="form-control" name="version" autofocus required >
                        @if ($errors->has('version'))
                            <span class="help-block">
                                <strong>{{ $errors->first('version') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <input id="slug" type="text" placeholder="Codigo de la Unidad Curricular" class="form-control" name="slug" autofocus required >
                        @if ($errors->has('slug'))
                            <span class="help-block">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('matter') ? ' has-error' : '' }}">
                        <input id="matter" type="text" placeholder="Nombre de la Unidad Curricular" class="form-control" name="matter" autofocus required >
                        @if ($errors->has('matter'))
                            <span class="help-block">
                                <strong>{{ $errors->first('matter') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('content_1_id') ? ' has-error' : '' }}">
                        <input id="content_1_id" type="text" placeholder="Nombre de la Universidad" class="form-control" name="content_1_id" autofocus required >
                        @if ($errors->has('content_1_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content_1_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('content_2_id') ? ' has-error' : '' }}">
                        <input id="content_2_id" type="text" placeholder="Nombre de la Universidad" class="form-control" name="content_2_id" autofocus required >
                        @if ($errors->has('content_2_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content_2_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('content_3_id') ? ' has-error' : '' }}">
                        <input id="content_3_id" type="text" placeholder="Nombre de la Universidad" class="form-control" name="content_3_id" autofocus required >
                        @if ($errors->has('content_3_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content_3_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('content_4_id') ? ' has-error' : '' }}">
                        <input id="content_4_id" type="text" placeholder="Nombre de la Universidad" class="form-control" name="content_4_id" autofocus required >
                        @if ($errors->has('content_4_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content_4_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('content_5_id') ? ' has-error' : '' }}">
                        <input id="content_5_id" type="text" placeholder="Nombre de la Universidad" class="form-control" name="content_5_id" autofocus required >
                        @if ($errors->has('content_5_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content_5_id') }}</strong>
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