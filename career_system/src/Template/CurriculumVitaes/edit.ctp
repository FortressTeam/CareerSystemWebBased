<div class="row">
    <div class="col-lg-2 col-md-12 visible-lg visible-md">
        <div class="card">
            <div class="card-head"></div>
        </div>
    </div> 
    <div class="col-lg-10 col-md-12 visible-lg visible-md" id="cv-container"></div>
    <div class="col-xs-12 hidden-lg hidden-md">
        <div class="alert alert-callout alert-danger">View CV is not support your screen size.</div>
    </div>
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
            genButton();
        },
        error: CVError
    });
});

</script>