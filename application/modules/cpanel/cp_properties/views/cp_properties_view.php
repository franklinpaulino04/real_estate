<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Todas las Propiedades</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
				<div class="col-md-6"> <h6 class="m-0 font-weight-bold text-primary">Propiedades</h6></div>
				<div class="col-md-6 text-right"><a class="btn btn-primary redirect ladda-button" data-style="expand-right" href="javascript:void(0);" data-url="<?php echo base_url('cp_properties/add');?>">Nuevo</a></div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="list" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th></th>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Categoria</th>
						<th>Tipo</th>
						<th>Precio</th>
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
