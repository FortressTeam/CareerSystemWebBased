<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <header id="title">Choose a template to create a new CV</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($curriculumVitaeTemplates as $curriculumVitaeTemplate): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <?= $this->Html->image(
                                __('template_img/' . $curriculumVitaeTemplate->curriculum_vitae_template_image),
                                [
                                    'class' => 'border-gray img-responsive cvcs-template',
                                    'template-id' => $curriculumVitaeTemplate->id
                                ]
                            ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.cvcs-template').click(function(){
        var data = {
            "applicant_id": 4,
            "curriculum_vitae_template_id": $(this).attr('template-id')
        };
        var dataJSON = JSON.stringify(data);
        $.ajax({
            type: 'POST',
            url: "<?= $this->Url->build('/api/curriculum_vitaes'); ?>",
            contentType: 'application/json',
            dataType: 'json',
            data: dataJSON,
            beforeSend: function( xhr ) {
                $('#title').text('Creating....! Please wait a moment!');
            },
            success: function(responce){
                window.location.href =  "<?= $this->Url->build('/curriculum-vitaes'); ?>";
            },
            error: function(message){
                $('#title').text('Create CV error! Please refresh your browser and try again!');
            }
        });
    });
})
</script>
