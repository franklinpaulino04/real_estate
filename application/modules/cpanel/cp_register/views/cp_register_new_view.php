<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuarios</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form id="form" action="<?php echo base_url('cp_register/insert');?>" method="post">
            <div class="row">
                <div class="response"></div>
                <div class="col-md-8">
                    <div class="row form-group">
                        <div class="col-md-3 text-right mg-t-5"><label class="" for="name-category">Nombre:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" id="first_name" name="first_name" placeholder=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-right mg-t-5"><label class="" for="name-category">Apellido:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" id="last_name" name="last_name" placeholder=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-right mg-t-5"><label class="" for="name-category">Usuario:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" id="email" name="email" placeholder=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 text-right mg-t-5"><label class="" for="name-category">Contraseña:</label></div>
                        <div class="col-md-7"><input type="password" class="form-control" id="password" name="password"  placeholder=""></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row"><img src="<?php echo base_url('assets/sb_admin/img/images_empty.png');?>" height="100px" width="100px" alt=""></div>
                    <div class="row"><input type="file" name="files" id="files" class="form-control"></div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="submit" data-target="#add-cp-register">Guardar</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    </div>
</div>
