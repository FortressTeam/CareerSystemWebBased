<section>
    <div class="section-body contain-lg">
    	<div class="row">
    		<div class="col-md-8">
	            <div class="card">
	                <div class="card-body">
	                    <?php 
	                        echo $this->Form->create('', [
	                            'url' => ['controller' => 'Search', 'action' => 'index'],
	                            'class' => 'form',
	                            'templates' => [
	                            'formGroup' => '{{input}}{{label}}',
	                            'inputContainer' => '<div class="form-group has-primary">{{content}}</div>'
	                        ]
	                        ]); ?>
	                    <?= $this->Form->input('q', ['label' => '', 'class' => 'form-control', 'placeholder' => 'Enter keyword to search']); ?>
	                    <?= $this->Form->input('limit', ['type' => 'hidden', 'value' => 15]); ?>
	                    <div class="form-group public-search">
	                        <div class="row">
	                            <div class="col-md-6 col-lg-5">
	                                <div class="btn-group btn-block">
	                                    <button type="button" class="btn ink-reaction btn-raised btn-primary dropdown-toggle btn-block category-search-button" data-toggle="dropdown" aria-expanded="false">
	                                        What <i class="fa fa-caret-down"></i>
	                                    </button>
	                                    <ul class="dropdown-menu animation-expand dropdown-choose col-xs-12" role="menu">
	                                        <?php foreach ($categories as $index => $category): ?>
	                                            <li><a class="category-search-item" data-id=<?= $index ?>><?= $category ?></a></li>
	                                        <?php endforeach; ?>
	                                    </ul>
	                                    <?= $this->Form->input('category_id', ['type' => 'hidden']);?>
	                                </div>
	                            </div> 
	                            <!-- Category Button -->
	                            <div class="col-md-6 col-lg-5">
	                                <div class="btn-group btn-block">
	                                    <button type="button" class="btn ink-reaction btn-raised btn-primary dropdown-toggle btn-block" data-toggle="dropdown" aria-expanded="false">
	                                        Where <i class="fa fa-caret-down"></i>
	                                    </button>
	                                    <ul class="dropdown-menu animation-expand dropdown-choose col-xs-12" role="menu">
	                                        <li><a class="location-search-item">Ha Noi</a></li>
	                                        <li><a class="location-search-item">Da Nang</a></li>
	                                        <li><a class="location-search-item">Ho CHi Minh City</a></li>
	                                        <li><a class="location-search-item">Binh Duong</a></li>
	                                        <li><a class="location-search-item">Can Tho</a></li>
	                                        <li><a class="location-search-item">Hai Phong</a></li>
	                                        <li><a class="location-search-item">Quang Ninh</a></li>
	                                    </ul>
	                                    <?= $this->Form->input('location_id', ['type' => 'hidden']);?>
	                                </div>
	                            </div> 
	                            <!-- Location Button -->
	                            <div class="col-md-12 col-lg-2">
	                                <div class="btn-group btn-block">
	                                    <?= $this->Form->button(
	                                        '<i class="fa fa-search"></i>',
	                                        ['type' => 'submit','class' => 'btn ink-reaction btn-raised btn-primary dropdown-toggle btn-block'],
	                                        ['escape' => false]);
	                                    ?>
	                                </div>
	                            </div> 
	                            <!-- Search Button -->
	                        </div>
	                    </div>
	                    <?= $this->Form->end(); ?>
	                </div>
	            </div>
            </div>
    		<div class="col-md-4">
    			<div class="card">
    				<div class="card-body">

    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</section>