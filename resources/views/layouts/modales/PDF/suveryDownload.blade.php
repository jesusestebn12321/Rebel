<div class="modal fade open" id="downloadEquivalencias">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-user"></span> 
                    Descargar contenidos
                    </h3>
                </div>
                    <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
                
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="GET" action="{{route('equivalencia',Auth::user()->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>Inicio Estudiantil:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name='start_student' class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label>Culminación Estudiantil:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="last_student" class="form-control" data-inputmask="'alias': 'yyy/mm/dd'" data-mask>
                        </div>
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