<div class="modal fade" id="editStudent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-edit"></span> 
                        Editar Estudiantes
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="PUT " action="{{route('Student.up_date',Auth::user()->slug)}}">
                    
                    {{ csrf_field() }}

                    <input  type="hidden" id='ModalId' name="id">

                    <div class="form-group row">
                        <div class="col-3">
                            <label class="font-italic form-control-label">Cedula: </label>
                        </div>
                        <div class="col-9">
                            <input id="ModalDni" type="number" class="form-control" name="dni" autofocus required > 
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="font-italic form-control-label">Nombre: </label>
                        </div>
                        <div class="col-9">
                            <input id="ModalName" type="text" class="form-control" name="name" autofocus required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="font-italic form-control-label">Apellido: </label>
                        </div>
                        <div class="col-9">
                            <input id="ModalLastname" type="text" class="form-control" name="lastname" autofocus required >
                        </div>
                    </div>

                </div>
                <div class="modal-footer"> 
                    <div class='container'>
                        <div class="row">        
                            <div class="col-12">
                             <button href="#" class='btn btn-primary btn-block' id='btnEdit'>Editar</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>