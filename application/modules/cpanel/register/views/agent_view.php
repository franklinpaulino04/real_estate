<div class="page-wrapper">
    <div class="container-fluid l-aside">
        <?php echo $config_menu;?>

        <div class="page-wrapper-scrollbar">

            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <nav class="breadcrumb-nav p-t-14" aria-label="breadcrumb">
                            <ol class="breadcrumb sm-breadcrumb">
                                <li class="breadcrumb-item"><?php echo $this->lang->line('modules');?></li>
                                <li class="breadcrumb-item"><?php echo $this->lang->line('taxes');?></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('void_type');?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 page-title">
                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><i class="icon-no-access"></i> </li>
                                <li class="breadcrumb-item active"><?php echo $this->lang->line('void_type');?></li>
                                <li class="breadcrumb-item filter-title" aria-current="page"><?php echo $this->lang->line('all_void_type');?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 text-right pr-6">
                        <button type="button" class="btn btn-info modal_trigger atm" data-route="annulment/add" data-toggle="modal" data-url="<?php echo base_url('annulment/add');?>" data-target="#annulment"><span><?php echo $this->lang->line('new');?></span></button>
                    </div>
                </div>
            </div>

            <div id="list-table" class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body card-datatable bg-white">
                            <table id="list" class="table no-bottom">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th><?php echo $this->lang->line('code');?></th>
                                        <th><?php echo $this->lang->line('type');?></th>
                                        <th><?php echo $this->lang->line('state');?></th>
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
        </div>
    </div>

    <!-- .modal -->
    <div id="annulment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"></div>
    </div>
    <!-- /.modal -->
