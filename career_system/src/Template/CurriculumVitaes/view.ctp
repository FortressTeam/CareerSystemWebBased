<div class="row">
    <div class="col-lg-12" id="cv-container"></div>
</div>
 
<?= $this->Html->script('cv') ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#cv-container').load("<?= $this->Url->build('/template/' . 'template.cvtp'); ?>");
    $.ajax({
        'type': 'GET',
        'url': "<?= $this->Url->build('/api/applicants/' . '4'); ?>",
        'contentType': 'application/json',
        'dataType': 'json',
        success: function(responce){
            CVPut(responce);
        },
        error: CVError
    });
});

</script>