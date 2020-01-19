<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-cloud-upload"></i> <?php echo $row->name;?></h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
    <div class="modal-body">
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
                    <?php if(count($docs) > 0):?>
                        <?php foreach($docs AS $doc):?>
                            <tr>
                                <td><img src="<?php echo base_url('assets/storage/files/properties/'.$doc->name);?>" alt="<?php echo $doc->original_name?>" width="100px" height="100px" class="img-thumbnail"></td>
                                <td><?php echo number_format($doc->size/1024,0);?>KB</td>
                                <td class="text-center"><a role="button" href="javascript:void(0)" data-url="<?php echo base_url('clients/unlink_files/'.$doc->docId);?>" class="btn btn-danger unlink-file"><i class="fas fa-times"></i></a></td>
                            </tr>
                        <?php endforeach;?>
                    <?php else:?>
                        <tr>
                            <td colspan="3" class="text-center not-docs-color">No hay Documentos Para Mostrar...</td>
                        </tr>
                    <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
