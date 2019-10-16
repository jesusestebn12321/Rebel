<div class="modal fade" id="addMatterTeacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-user"></span> 
                        Añadir Profesor
                    </h3>
                </div>
                    <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
                
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('MattersTeacher.add')}}">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <input id="dniTeacher" name="user_id" type="number" placeholder="Cedula Del Profesor" class="form-control"> 
                        <input type="hidden" name="matter_id" value="{{$matter->id}}"> 
                    </div>
                    <div id="teacherContent">
                    
                    </div>
                    <div class="form-group">
                         <select id="university_id" class='form-control' value='1' name="type" size='1'>       
                            <option>Tipo</option>
                            <option value="0">Coordinador</option>
                            <option value="1">Profesor</option>
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