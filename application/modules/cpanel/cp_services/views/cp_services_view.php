<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Todos los Servicios</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
				<div class="col-md-6"> <h6 class="m-0 font-weight-bold text-primary">Servicios</h6></div>
				<div class="col-md-6 text-right">
					<a class="btn btn-primary modal_trigger ladda-button" data-style="expand-right" href="javascript:void(0);" data-url="<?php echo base_url()?>cp_services/add" data-target="#add-cp-services" data-toggle="modal">
						<span class="ladda-label">Nuevo</span>
					</a>
				</div>
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
						<th>Telefono</th>
						<th>Celular</th>
						<th>Correo</th>
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
<div class="modal fade" id="add-cp-services" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog"></div>
</div>
