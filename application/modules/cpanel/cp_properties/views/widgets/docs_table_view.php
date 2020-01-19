<?php if(count($docs) > 0):?>
    <div class="col-md-12 mg-t-16">
        <span class="pull-right">
			<a href="javascript:void(0)" class="btn btn-primary btn-sm btn-doc modal_trigger ladda-button" data-style="expand-right" data-url="<?php echo base_url('cp_properties/add_documents/'.$clientId)?>" data-toggle="modal" data-target="#doc_modal">
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
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($docs AS $doc):?>
                    <tr>
						<td><img src="<?php echo base_url('assets/storage/files/properties/'.$doc->name);?>" alt="<?php echo $doc->original_name?>" width="100px" height="100px" class="img-thumbnail"></td>
                        <td><?php echo number_format($doc->size/1024,0);?>KB</td>
                        <td><a role="button" href="javascript:void(0)" data-url="<?php echo base_url('cp_properties/unlink_files/'.$doc->docId);?>" class="btn btn-danger unlink-file"><i class="fas fa-times"></i></a></td>
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
                <a href="javascript:void(0)" class="btn btn-primary btn-doc modal_trigger" data-url="<?php echo base_url('cp_properties/add_documents/'.$clientId);?>" data-toggle="modal" data-target="#doc_modal"><i class="fas fa-cloud-upload" aria-hidden="true"></i> Buscar Archivo</a>
            </div>
        </div>
    </div>
<?php endif;?>
