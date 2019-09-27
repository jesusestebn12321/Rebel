<div class="modal fade" id="addMatterTeacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-user"></span> 
                        Añadir Profesor
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('MattersTeacher.add')}}">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <input id="dniTeacher" type="number" placeholder="Cedula Del Profesor" class="form-control"> 
                        <input type="hidden" value="{{$matter->id}}"> 
                    </div>
                    <div id="teacherContent">
                    
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