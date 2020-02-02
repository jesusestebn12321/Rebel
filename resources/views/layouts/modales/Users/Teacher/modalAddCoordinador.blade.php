<div class="modal fade" id="addCoordinador">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col">
                    <h3><span class="fa fa-edit"></span> 
                        Editar Teacher
                    </h3>
                </div>
                <button class="close" aria-hidden="true" data-dismiss="modal" id='close'>&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="PUT " action="#">
                    
                    {{ csrf_field() }}

                    <input  type="hidden" id='ModalId'>

                    <div class="form-group">
                        <label><i class="fa fa-tv"></i>Cedula</label>
                        <input id="ModalDni" type="text" class="form-control" name="dni" autofocus required >
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-tv"></i>Nombre</label>
                        <input id="ModalName" type="text" class="form-control" name="name" autofocus required >
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-tv"></i>Apellido</label>
                        <input id="ModalLastname" type="text" class="form-control" name="lastname" autofocus required >
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