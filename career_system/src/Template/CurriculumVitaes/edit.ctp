<div id="cvdata" class="hidden" cvcs-data='<?= $curriculumVitae->curriculum_vitae_data ?>'></div>
<div id="applicantdata" class="hidden" applicant-data='<?= $applicantInfo ?>'></div>
<div class="row">
    <div class="col-lg-12 visible-lg visible-md row-centered">
        <div class="row">
            <div class="col-lg-12">
                <button id="cvcsSave" type="button" class="btn ink-reaction btn-floating-action btn-lg btn-success">
                    <i class="fa fa-save"></i>
                    <?= $this->Html->image(
                        _('spinner.png'),
                        ['class' => 'fab-image', 'style' => 'display: none']
                    );?>
                </button>
                <?= $this->Html->link(
                    __('<i class="fa fa-eye"></i>'),
                    ['action' => 'view', $curriculumVitae->id],
                    ['class' => 'btn ink-reaction btn-floating-action btn-lg btn-warning', 'target' => '_blank', 'escape' => false]
                ) ?>
                <button id="cvcsTemplate" type="button" class="btn ink-reaction btn-floating-action btn-lg btn-accent" data-toggle="modal" data-target="#templateModal">
                    <i class="fa fa-file-o"></i>
                    <?= $this->Html->image(
                        _('spinner.png'),
                        ['class' => 'fab-image', 'style' => 'display: none']
                    );?>
                </button>
                <hr/>
            </div>
        </div>
    </div>
    <div class="col-lg-12 visible-lg visible-md row-centered">
        <div class="row">
            <div class="col-xs-12 text-lg" contenteditable="true" id="cv-name"><?= $curriculumVitae->curriculum_vitae_name ?></div>
        </div>
        <hr/>
    </div>
    <div class="col-lg-12 visible-lg visible-md" id="cvcs-container"></div>
    <div class="col-xs-12 hidden-lg hidden-md">
        <div class="alert alert-callout alert-danger">View CV is not support your screen size.</div>
    </div>
</div>

<div id="templateModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary cvcs-model-title">Choose another template</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php foreach ($curriculumVitaeTemplates as $curriculumVitaeTemplate): ?>
                        <div class="col-lg-4 col-md-6" data-dismiss="modal">
                            <?= $this->Html->image(
                                __('template_img/' . $curriculumVitaeTemplate->curriculum_vitae_template_image),
                                [
                                    'class' => 'border-gray img-responsive cvcs-template',
                                    'template-id' => $curriculumVitaeTemplate->id,
                                    'cv-id' => $curriculumVitae->id
                                ]
                            ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?= $this->Html->script('cv') ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#cvcs-container').load(
        "<?= $this->Url->build('/template/' . $curriculumVitae->curriculum_vitae_template->curriculum_vitae_template_url); ?>",
        function() {
            var applicant_data = $.parseJSON($('#applicantdata').attr('applicant-data'));
            ApplicantPut(applicant_data);
            var cv_data = $.parseJSON($('#cvdata').attr('cvcs-data'));
            CVPut(cv_data.cvdata);
            CVPutExample();
            genEditor();
        }
    );

    $('#cvcsSave').click(function(){
        var cv_data = CVGet();
        var data = {
            "curriculum_vitae_name": $('#cv-name').text(),
            "curriculum_vitae_data": cv_data
        };
        var dataJSON = JSON.stringify(data);
        $.ajax({
            type: 'PUT',
            url: "<?= $this->Url->build('/api/curriculum_vitaes/' . $curriculumVitae->id); ?>",
            contentType: 'application/json',
            dataType: 'json',
            data: dataJSON,
            beforeSend: function( xhr ) {
                $('#cvcsSave').find('.fab-image').css({'display': 'inherit'});
            },
            success: function(responce){
                setTimeout(function(){
                    $('#cvcsSave').find('.fab-image').css({'display': 'none'});
                    $('#cvcsSave').find('i.fa').removeClass('fa-save').addClass('fa-check');
                }, 500);
            },
            error: CVError
        });
    });
});
</script>