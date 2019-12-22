<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Todas las Categorias</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
				<div class="col-md-6"> <h6 class="m-0 font-weight-bold text-primary">Categorias</h6></div>
				<div class="col-md-6 text-right"><a class="btn btn-primary modal_trigger" href="javascript:void(0);" data-url="<?php echo base_url()?>cp_categories/add" data-target="#add-cp-categories" data-toggle="modal">Nuevo</a></div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="list" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th></th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>loading...</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="add-cp-categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog"></div>
</div>
