<div class="modal fade" id="addMatter">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col">
                        <h3><span class="fa fa-plus"></span> 
                            Crear Unidad Curricular
                        </h3>
                    </div>
                    <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>

                </div>
                <div class="modal-body">
                @if(Auth::user()->hasRole(1))
                <form class="form-horizontal" method="POST" action="{{route('Matters.store')}}">
                @elseif(Auth::user()->hasRole(2))
                <form class="form-horizontal" method="POST" action="{{route('Matter.store')}}">
                @endif
                    {{ csrf_field() }}
                    <input type='hidden' value='{{$career->id}}' name="career_id">
                    <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
                        <input id="version" type="number" placeholder="Version de la Unidad Curricular" class="form-control" name="version" autofocus required >
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
                    <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                        <input id="semester" type="text" placeholder="Sementre" class="form-control" name="semester" autofocus required >
                        @if ($errors->has('semester'))
                            <span class="help-block">
                                <strong>{{ $errors->first('semester') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('credit') ? ' has-error' : '' }}">
                        <input id="credit" type="number" placeholder="Credito Unidad Curricular" class="form-control" name="credit" autofocus required >
                        @if ($errors->has('credit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('credit') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('ht') ? ' has-error' : '' }}">
                        <input id="ht" type="number" placeholder="HT" class="form-control" name="ht" autofocus required >
                        @if ($errors->has('ht'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ht') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('hl') ? ' has-error' : '' }}">
                        <input id="hl" type="number" placeholder="HL" class="form-control" name="hl" autofocus required >
                        @if ($errors->has('hl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hl') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                        <input id="hp" type="number" placeholder="HP" class="form-control" name="hp" autofocus required >
                        @if ($errors->has('hp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hp') }}</strong>
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