<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Categoria / <?php echo $row->name;?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <form id="form" action="<?php echo base_url('cp_categories/update/'.$row->categoryId)?>" method="post">
           <div class="row">
               <div class="response"></div>
               <div class="col-md-12">
                   <div class="row form-group">
					   <input type="hidden" name="categoryId" value="<?php echo $row->categoryId;?>">
                       <div class="col-md-3 text-right mg-t-5"><label class="" for="name-category">Nombre:</label></div>
                       <div class="col-md-7"><input type="text" class="form-control" id="name_category" name="name_category" value="<?php echo $row->name;?>" placeholder=""></div>
                   </div>
				   <div class="row form-group">
					   <div class="col-md-3 text-right mg-t-5"><label class="" for="name-category">Descripción:</label></div>
					   <div class="col-md-7"><textarea name="description" rows="3" class="form-control"><?php echo $row->description;?></textarea></div>
				   </div>
				   <div class="row form-group">
					   <div class="col-md-3 text-right mg-t-5"><label class="" for="name-category">Estatus:</label></div>
					   <?php $chk_valid = ($row->status == 1)? 'checked' : '';?>
					   <div class="col-md-7"><input type="checkbox" <?php echo $chk_valid;?>  name="active" id="active" value="1"></div>
				   </div>
               </div>
           </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="submit" data-target="#add-cp-categories">Guardar</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    </div>
</div>
