<?php $__env->startSection('header'); ?>
    <title><?php echo trans('codercv.upload'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    <style>
        #actions .start , #actions .cancel { display: none; }
        div.table { display: table;}
        div.table .file-row { display: table-row; }
        div.table .file-row > div { display: table-cell;vertical-align: top;border-top: 1px solid #3c3c3c;padding: 8px; }
        div.table .file-row:nth-child(odd) { background: #3c3c3c; }
        div.table .file-row:nth-child(even) { background: #4f4f4f; }
        #total-progress { opacity: 0; transition: opacity 0.3s linear; }
        #previews .file-row.dz-success .progress { opacity: 0; transition: opacity 0.3s linear; }
        p.drop-file-here { padding: 20px; border: 1px dashed #CCC; }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php foreach($widgets as $widget): ?>
        <?php if($widget->location == 1): ?>
            <?php echo $widget->content; ?>

        <?php endif; ?>
    <?php endforeach; ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 center-block upload-form-div">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo trans('codercv.upload'); ?></div>
                    <div class="panel-body">
                        <div id="actions" class="row">
                            <div class="col-sm-9">
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span><?php echo trans('codercv.add_files'); ?></span>
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span><?php echo trans('codercv.start').' '.trans('codercv.upload'); ?></span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span><?php echo trans('codercv.cancel').' '.trans('codercv.upload'); ?></span>
                                </button>
                            </div>
                            <div class="col-sm-3">
                                <span class="fileupload-process">
                                  <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                      <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                  </div>
                                </span>
                            </div>
                        </div>

                        <div class="table table-striped files" id="previews">

                            <div id="template" class="file-row">
                                <div class="col-xs-4 col-sm-2">
                                    <span class="preview"><img data-dz-thumbnail /></span>
                                </div>
                                <div class="col-xs-8 col-sm-10">
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($widgets as $widget): ?>
        <?php if($widget->location == 2): ?>
            <?php echo $widget->content; ?>

        <?php endif; ?>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        var baseUrl = "<?php echo e(url('/')); ?>";
        var token = jQuery('meta[name=csrf-token]').attr('content');
        // Get the template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(document.body, {
            url: baseUrl + "/upload/files",
            params: { _token: token },
            paramName: "file",
            acceptedFiles : "image/*",
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            uploadMultiple: true,
            parallelUploads: 100,
            previewTemplate: previewTemplate,
            maxFilesize: <?php echo ( env('FILE_SIZE', 5120) ) / 1024; ?>,
            dictFileTooBig: '<?php echo trans('codercv.dictFileTooBig'); ?>',
            autoQueue: false,
            autoProcessQueue: false,
            previewsContainer: "#previews",
            clickable: ".fileinput-button"
        });

        myDropzone.on("addedfile", function(file) {
            jQuery('#actions .start').css('display', 'inline-block');
            jQuery('#actions .cancel').css('display', 'inline-block');
        });
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });
        myDropzone.on("sendingmultiple", function(file) {
            document.querySelector("#total-progress").style.opacity = "1";
        });
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0";
        });
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            myDropzone.processQueue();
        };
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true);
        };
        myDropzone.on("successmultiple", function(file, data){
            window.location.href='/<?php echo env('URL_NAME', 'post'); ?>/' + JSON.parse(data).post_id+'/<?php echo str_slug($settings->name); ?>';
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>