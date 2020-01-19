<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- form -->
	<form id="form" action="<?php echo base_url()?>cp_properties/update/<?php echo $row->propertyId?>" method="post" enctype="multipart/form-data" role="form">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-md-8">
						<h6 class="m-0 font-weight-bold text-primary">Propiedad / <?php echo ($row->number == 0)? '0000' : $row->number;?></h6>
					</div>
					<div class="col-md-4 text-right">
						<a href="javascript:void(0)" class="cancel_document" data-redirect="<?php echo base_url('cp_properties')?>">
							<i class="far fa-times-circle" style="font-size: 25px!important; color: #f96262"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="response"></div>
			<div class="card-body">
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Nombre</label>
					<div class="col-md-5"><input type="text" name="name_properies" class="form-control" value="<?php echo $row->name;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Descripción</label>
					<div class="col-md-5"><textarea name="description" rows="3" class="form-control"><?php echo $row->description;?></textarea></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Categoria</label>
					<div class="col-md-5">
						<?php echo form_dropdown('categoryId', $this->category, set_value('categoryId', $row->categoryId),"id='categoryId' data-placeholder='Seleccione una Opción' class='form-control chosen-select'");?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Tipo:</label>
					<div class="col-md-5">
						<?php echo form_dropdown('typeId', $this->typeId, set_value('typeId', $row->typeId),"id='typeId' data-placeholder='Seleccione una Opción' class='form-control chosen-select'");?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Precio</label>
					<div class="col-md-5"><input type="text" name="price" class="form-control numeric currency" value="<?php echo $row->price;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Habitaciones</label>
					<div class="col-md-5"><input type="text" name="rooms" class="form-control numeric currency" value="<?php echo $row->rooms;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Video</label>
					<div class="col-md-5"><input type="text" name="video" class="form-control" value="<?php echo $row->video;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Baños</label>
					<div class="col-md-5"><input type="text" name="bathrooms" class="form-control numeric currency" value="<?php echo $row->bathrooms;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Habitaciones</label>
					<div class="col-md-5"><input type="text" name="rooms" class="form-control numeric currency" value="<?php echo $row->rooms;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Garage</label>
					<div class="col-md-5"><input type="text" name="garage" class="form-control numeric currency" value="<?php echo $row->garage;?>"></div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-right mg-t-5" for="">Comodidades</label>
					<div class="col-md-5"><input type="text" name="amenities" class="form-control tags" value="<?php echo $row->amenities;?>"></div>
				</div>
				<div class="row form-group">
					<div class="col-md-3 text-right mg-t-5"><label class="" for="statusId">Activo:</label></div>
					<div class="col-md-5">
						<label class="checkbox">
							<input type="checkbox" id="statusId" name="statusId"  value="1" placeholder="">
							<span class="check"></span>
						</label>
					</div>
				</div>
				<div class="card-body alpha omega">
					<div class="row">
						<div class="col-md-12">
							<div class="card mb-3">
								<div id="properties-documents">
									<?php if(count($docs) > 0):?>
										<div class="col-md-12 mg-t-16">
											<span class="pull-right">
												<a href="javascript:void(0)" class="btn btn-primary btn-sm btn-doc modal_trigger ladda-button" data-style="expand-right" data-url="<?php echo base_url('cp_properties/add_documents/'.$row->propertyId)?>" data-toggle="modal" data-target="#doc_modal">
													<i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
													<span class="ladda-label">Subir Documentos</span>
												</a>
											</span>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="docs" class="table table-bordered display dataTable no-footer" style="width:100%">
													<thead>
													<tr>
														<th>Nombre</th>
														<th>Peso</th>
														<th class="text-center">Acci&oacute;n</th>
													</tr>
													</thead>
													<tbody>
													<?php foreach($docs AS $doc):?>
														<tr>
															<td>
																<img src="<?php echo base_url('assets/storage/files/properties/'.$doc->name);?>" alt="<?php echo $doc->original_name?>" width="100px" height="100px" class="img-thumbnail">
<!--																<a href="--><?php //echo base_url('assets/storage/files/properties/'.$doc->name);?><!--" target="_blank">--><?php //echo $doc->original_name?><!--</a>-->
															</td>
															<td><?php echo number_format($doc->size/1024,0);?>KB</td>
															<td class="text-center"><a role="button" href="javascript:void(0)" data-url="<?php echo base_url('cp_properties/unlink_files/'.$doc->docId)?>" class="btn btn-danger unlink-file"><i class="fas fa-times"></i></a></td>
														</tr>
													<?php endforeach;?>
													</tbody>
												</table>
											</div>
										</div>
									<?php else:?>
										<div class="card-body alpha omega">
											<div class="col-md-12">
												<div class="new-documents">
													<a href="javascript:void(0)" class="btn btn-primary btn-doc modal_trigger" data-url="<?php echo base_url('cp_properties/add_documents/'.$row->propertyId)?>" data-toggle="modal" data-target="#doc_modal"><i class="fas fa-cloud-upload" aria-hidden="true"></i> Subir Archivo</a>
												</div>
											</div>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button class="btn btn-primary ladda-button" data-style="expand-right" type="submit" id="submit">Guardar</button>
			</div>
		</div>
	</form>
	<!-- / form -->
</div>
<!-- /.container-fluid -->

<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="doc_modal" aria-hidden="true" id="doc_modal">
	<div class="modal-dialog"></div>
</div>widgets
