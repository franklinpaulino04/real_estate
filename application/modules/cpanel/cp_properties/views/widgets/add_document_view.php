<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-cloud-upload"></i> Subir Documento<span class="title-input"></span> <span class="title-input-p"></span></h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
    <form action="<?php echo base_url('cp_properties/save_files/'.$propertyId)?>" id="form" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
             <div class="row">
                 <div class="col-md-12">
                     <input type="file" name="file[]" id="filer_example1" multiple="multiple">
                 </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="button" type="button" class="btn btn-primary ladda-button" data-dismiss="modal" data-style="expand-left">
                <span class="ladda-label">Cerrar</span>
            </button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $("#filer_example1").filer({
            limit: 5,
            maxSize: null,
            extensions: null,
            changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Arrastrar y soltar archivos aquí</h3> <span style="display:inline-block; margin: 15px 0">o</span></div><a class="jFiler-input-choose-btn btn btn-custom">Subir Archivos</a></div></div>',
            showThumbs: true,
            theme: "dragdropbox",
            templates: {
                box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
                item: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li>{{fi-progressBar}}</li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: false,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-items-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action'
                }
            },
            dragDrop: {
                dragEnter: null,
                dragLeave: null,
                drop: null
            },
            uploadFile: {
                url: "<?php echo base_url('cp_properties/save_files/'.$propertyId)?>",
                data: null,
                type: 'POST',
                enctype: 'multipart/form-data',
                beforeSend: function(){},
                success: function(data, el){
                    var parent = el.find(".jFiler-jProgressBar").parent();
                    el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                        $("<div class=\"jFiler-item-others text-success\"><i class=\"fa fa-plus\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                    });

					$.ajax({
						url: "<?php echo base_url('cp_properties/get_all_documents/'.$propertyId)?>",
						type: 'get',
						success: function (data) {
							var response = JSON.parse(data);
							$('#properties-documents').html(response.view);
						}
					})
                },
                error: function(el){
                    var parent = el.find(".jFiler-jProgressBar").parent();
                    el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                        $("<div class=\"jFiler-item-others text-error\"><i class=\"fa fa-minus\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
                    });
                },
                statusCode: null,
                onProgress: null,
                onComplete: null
            },
            addMore: false,
            clipBoardPaste: true,
            excludeName: null,
            beforeRender: null,
            afterRender: null,
            beforeShow: null,
            beforeSelect: null,
            onSelect: null,
            afterShow: null,
            onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
                // var file = file.name;
                // $.post('assets/plugins/jquery.filer/php/remove_file.php', {file: file});
            },
            onEmpty: null,
            options: null,
            captions: {
                button: "Buscar Archivo",
                feedback: "Elija un archivo para subir",
                feedback2: "archivos fueron elegidos",
                drop: "Drop file here to Upload",
                removeConfirmation: "Estas seguro que quieres eliminar este archivo?",
                errors: {
                    filesLimit: "Solo {{fi-limit}} archivos estan permitidos para ser subido al mismo tiempo.",
                    filesType: "Only Images are allowed to be uploaded.",
                    filesSize: "{{fi-name}} es muy grande! Por favor solo suba archivos de {{fi-maxSize}} MB. o menos",
                    filesSizeAll: "Los archivos que haz elegido son muy grandes! Por favor solo suba archivos de {{fi-maxSize}} MB o menos."
                }
            }
        });
    });
</script>
