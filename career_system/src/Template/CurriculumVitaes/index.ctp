<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <?php foreach ($curriculumVitaes as $curriculumVitae): ?>
                <div class="col-md-3 col-xs-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <?= $this->Html->image(
                                __('template_img/' . $curriculumVitae->curriculum_vitae_template->curriculum_vitae_template_image),
                                [
                                    'url' => ['action' => 'edit', $curriculumVitae->id],
                                    'class' => 'img-responsive'
                                ]
                            ); ?>
                        </div>
                    </div>
                    <h2 class="text-primary row-centered"><?= $curriculumVitae->curriculum_vitae_name ?></h2>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="fab_wrapper">
        <?= $this->Html->link(
            '<button class="btn btn_fab btn-primary"><i class="fa fa-plus"></i></button>',
            ['action' => 'add'],
            ['escape' => false]) ?>
    </div>
</div>