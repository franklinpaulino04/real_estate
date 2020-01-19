<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuarios</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form id="form" action="<?php echo base_url('cp_register/insert');?>" method="post" enctype="multipart/form-data">
			<div class="response"></div>
            <div class="row">
                <div class="col-md-8 solid-black">
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
					<div class="row form-group">
						<div class="col-md-3 text-right"><label class="" for="active">Activo:</label></div>
						<div class="col-md-7">
							<label class="checkbox">
								<input type="checkbox" id="active" name="active"  value="1" placeholder="">
								<span class="check"></span>
							</label>
						</div>
					</div>
                </div>
                <div class="col-md-4">
					<div class="row form-group">
						<div class="col-md-9">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px; text-align: center">
									<img src="<?php echo base_url('assets/sb_admin/img/images_empty.png')?>"  alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
								<div class="file-buttons">
									<span class="btn btn-outline-secondary btn-file"><span class="fileinput-new"><i class="fas fa-cloud-upload-alt"></i></span><span class="fileinput-exists">Cambiar</span><input type="file" name="file"></span>
									<a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remover</a>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="submit" data-target="#add-cp-register">Guardar</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    </div>
</div>
