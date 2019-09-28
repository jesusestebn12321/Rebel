<div class="modal fade" id="addMatter">
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
                @if(Auth::user()->hasRole(0))
                <form class="form-horizontal" method="POST" action="{{route('Matters.store')}}">
                @elseif(Auth::user()->hasRole(1))
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

                    <div class="form-group">
                        <div class="row">
                        
                            <div class='col-9'>
                                <input id="numberContent" type="number" placeholder="Nombre de la Universidad" class="form-control" name="numberContent" autofocus required > 
                            </div>
                            <div class="col-3">
                                <a href="#" class='btn btn-block btn-info' onclick="contentNumber()">click</a>
                            </div>
                        </div>
                        
                    </div>

                    <div id="contentMatters"></div>
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