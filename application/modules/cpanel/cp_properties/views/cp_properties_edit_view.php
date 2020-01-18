<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- form -->
	<form id="form" action="<?php echo base_url()?>cp_properties/update/<?php echo $row->propertyId?>" method="post" enctype="multipart/form-data" role="form">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Propiedad/</h6>
			</div>
			<div class="response"></div>
			<div class="card-body">
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Nombre</label>
					<div class="col-md-5"><input type="text" name="name_properies" class="form-control" value="<?php echo $row->name;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Descripción</label>
					<div class="col-md-5"><textarea name="description" rows="3" class="form-control"><?php echo $row->description;?></textarea></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Categoria</label>
					<div class="col-md-5">
						<?php echo form_dropdown('categoryId', $this->category, set_value('categoryId', 3),"id='categoryId' data-placeholder='Seleccione una Opción' class='form-control chosen-select'");?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Tamaño de propiedad</label>
					<div class="col-md-5"><input type="text" name="property_size" class="form-control numeric currency" value="<?php echo $row->property_size;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Propiedad grande</label>
					<div class="col-md-5"><input type="text" name="property_big" class="form-control numeric currency" value="<?php echo $row->property_big;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Propiedad pequeña</label>
					<div class="col-md-5"><input type="text" name="property_small" class="form-control numeric currency" value="<?php echo $row->property_small;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Precio</label>
					<div class="col-md-5"><input type="text" name="price" class="form-control numeric currency" value="<?php echo $row->price;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Habitaciones</label>
					<div class="col-md-5"><input type="text" name="rooms" class="form-control numeric currency" value="<?php echo $row->rooms;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Video</label>
					<div class="col-md-5"><input type="text" name="video" class="form-control" value="<?php echo $row->video;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Baños</label>
					<div class="col-md-5"><input type="text" name="bathrooms" class="form-control numeric currency" value="<?php echo $row->bathrooms;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Disponible desde</label>
					<div class="col-md-5"><input type="text" name="available_from" class="form-control date" readonly value="<?php echo $row->available_from;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Estatus</label>
					<?php $chk_status = ($row->status == 1)? 'checked' : ''; ?>
					<div class="col-md-5">
						<input type="checkbox" name="status" value="1" <?php echo $chk_status;?>>
					</div>
				</div>
				<hr>
				<div class="row form-group">
					<label class="col-md-3 text-right" for="">Imagenes</label>
					<div class="col-md-5">
						<input type="file" name="file[]" class="form-control" multiple="multiple">
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button class="btn btn-primary" type="submit" id="submit">Guardar</button>
			</div>
		</div>
	</form>
	<!-- / form -->
</div>
<!-- /.container-fluid -->
