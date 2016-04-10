<div id="cvdata" class="hidden" cvcs-data='<?= $curriculumVitae->curriculum_vitae_data ?>'></div>
<div id="applicantdata" class="hidden" applicant-data='<?= $applicantInfo ?>'></div>
<div class="row">
    <div class="col-lg-12" id="cvcs-container"></div>
</div>
 
<?= $this->Html->script('cv') ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#cvcs-container').load(
        "<?= $this->Url->build('/template/' . $curriculumVitae->curriculum_vitae_template->curriculum_vitae_template_url); ?>",
        function() {
        var applicant_data = $.parseJSON($('#applicantdata').attr('applicant-data'));
        ApplicantPut(applicant_data);
        var data = $.parseJSON($('#cvdata').attr('cvcs-data'));
        CVPut(data.cvdata);
    });
});

</script>