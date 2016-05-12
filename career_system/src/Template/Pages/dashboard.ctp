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
					<div class="card-body card-search-right">
					<span class="text-primary">Sponsored post:</span><br/><br/>
                    <div class="row">
                        <div class="col-xs-4 row-centered">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?= $this->Html->image(
                                        'company_img' . DS . $sponsoredPost->hiring_manager->company_logo,
                                        ['class' => 'img-circle border-gray border-xl img-responsive'])
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <h4 class="text-primary no-margin">
                                <?= $this->Html->link(
                                    $sponsoredPost->post_title,
                                    ['controller' => 'posts', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($sponsoredPost->post_title), 'id' => $sponsoredPost->id])
                                ?>
                            </h4>
                            <h5 class="text-primary text-sm">
                                Company: <b><?= $this->Html->link(
                                    $sponsoredPost->hiring_manager->company_name,
                                    ['controller' => 'HiringManagers', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($sponsoredPost->hiring_manager->company_name), 'id' => $sponsoredPost->hiring_manager->id],
                                    ['escape' => false, 'class' => 'text-primary']);
                                ?></b>
                            </h5>
                        </div>
                    </div>
					</div>
				</div>
			</div>
    	</div>
    	<?php if((isset($loggedUser['group_id'])) && ($loggedUser['group_id'] == '3')): ?>
		    <div class="row">
		    	<div class="col-xs-12">
					<p class="text-default-light text-xl">Applied Posts</p>
			    </div>
		        <?php foreach ($submittedPosts as $post): ?>
		        <div class="col-xs-12 col-sm-6 col-lg-4 animated zoomIn">
		            <div class="card card-underline">
		                <div class="card-body">
		                    <div class="row">
		                        <div class="col-xs-4 row-centered">
		                            <div class="row">
		                                <div class="col-xs-12">
		                                    <?= $this->Html->image(
		                                        'company_img' . DS . $post->hiring_manager->company_logo,
		                                        ['class' => 'img-circle border-gray border-xl img-responsive'])
		                                    ?>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-xs-8">
		                            <h4 class="text-primary title-post">
		                                <?= $this->Html->link(
		                                    $post->post_title,
		                                    ['controller' => 'posts', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->post_title), 'id' => $post->id])
		                                ?>
		                            </h4>
		                            <h5 class="text-primary title-post">
		                                <?= $this->Html->link(
		                                    $post->hiring_manager->company_name,
		                                    ['controller' => 'HiringManagers', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->hiring_manager->company_name), 'id' => $post->hiring_manager->id],
		                                    ['escape' => false, 'class' => 'text-primary']);
		                                ?>
		                            </h5>
		                            <div class="row no-margin">
		                                <div class="text-default-light"> 
		                                    <?php
		                                        $start = date_create($post->post_date->format('Y-m-d'));
		                                        $end = date_create(date("Y-m-d"));
		                                        $date = date_diff($start, $end)->format('%a');
		                                        if($date < 1)
		                                            echo 'Today';
		                                        else if($date < 2)
		                                            echo 'Yesterday';
		                                        else if($date < 30)
		                                            echo $date, ' days ago';
		                                        else
		                                            echo $post->post_date->format('d-M-Y');
		                                    ?>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <?php 
		                	$statusStyle = 'style-default-light';
		                	if($post->posts_has_curriculum_vitaes[0]->applied_cv_status == '0') {
		                		$statusStyle = 'style-warning';
		                	}
		                	else if($post->posts_has_curriculum_vitaes[0]->applied_cv_status == '1') {
		                		$statusStyle = 'style-success';
		                	}
		                	else if($post->posts_has_curriculum_vitaes[0]->applied_cv_status == '2') {
		                		$statusStyle = 'style-danger';
		                	}
		                ?>
		                <div class="card-body no-padding style-default-light">
		                    <div class="row no-margin <?= $statusStyle ?>">
		                        <div class="col-xs-6 item-post">
		                            <i class="fa fa-archive fa-fw" aria-hidden="true"></i> <?= $post->has('category') ? h($post->category->category_name) : '' ?><br/>
		                            <i class="fa fa-phone fa-fw" aria-hidden="true"></i> <?= $post->has('hiring_manager') ? h($post->hiring_manager->hiring_manager_phone_number) : '' ?>
		                        </div>
		                        <div class="col-xs-6 item-post">
		                            <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?><br/>
		                            <i class="fa fa-usd fa-fw" aria-hidden="true"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?><br/>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <?php endforeach; ?>
		    </div>
		    <div class="row">
		    	<div class="col-xs-12">
					<p class="text-default-light text-xl">Followed Posts</p>
			    </div>
		        <?php foreach ($followedPosts as $post): ?>
		        <div class="col-xs-12 col-sm-6 col-lg-4 animated zoomIn">
		            <div class="card card-underline">
		                <div class="card-body">
		                    <div class="row">
		                        <div class="col-xs-4 row-centered">
		                            <div class="row">
		                                <div class="col-xs-12">
		                                    <?= $this->Html->image(
		                                        'company_img' . DS . $post->hiring_manager->company_logo,
		                                        ['class' => 'img-circle border-gray border-xl img-responsive'])
		                                    ?>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-xs-8">
		                            <h4 class="text-primary title-post">
		                                <?= $this->Html->link(
		                                    $post->post_title,
		                                    ['controller' => 'posts', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->post_title), 'id' => $post->id])
		                                ?>
		                            </h4>
		                            <h5 class="text-primary title-post">
		                                <?= $this->Html->link(
		                                    $post->hiring_manager->company_name,
		                                    ['controller' => 'HiringManagers', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->hiring_manager->company_name), 'id' => $post->hiring_manager->id],
		                                    ['escape' => false, 'class' => 'text-primary']);
		                                ?>
		                            </h5>
		                            <div class="row no-margin">
		                                <div class="text-default-light"> 
		                                    <?php
		                                        $start = date_create($post->post_date->format('Y-m-d'));
		                                        $end = date_create(date("Y-m-d"));
		                                        $date = date_diff($start, $end)->format('%a');
		                                        if($date < 1)
		                                            echo 'Today';
		                                        else if($date < 2)
		                                            echo 'Yesterday';
		                                        else if($date < 30)
		                                            echo $date, ' days ago';
		                                        else
		                                            echo $post->post_date->format('d-M-Y');
		                                    ?>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="card-body no-padding style-default-light">
		                    <div class="row no-margin text-default-light">
		                        <div class="col-xs-6 item-post">
		                            <i class="fa fa-archive fa-fw" aria-hidden="true"></i> <?= $post->has('category') ? h($post->category->category_name) : '' ?><br/>
		                            <i class="fa fa-phone fa-fw" aria-hidden="true"></i> <?= $post->has('hiring_manager') ? h($post->hiring_manager->hiring_manager_phone_number) : '' ?>
		                        </div>
		                        <div class="col-xs-6 item-post">
		                            <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?><br/>
		                            <i class="fa fa-usd fa-fw" aria-hidden="true"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?><br/>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <?php endforeach; ?>
		    </div>
		    <div class="row">
		    	<div class="col-xs-12">
					<p class="text-default-light text-xl">Followed Company's Posts</p>
			    </div>
		        <?php foreach ($followedCompanyPosts as $post): ?>
		        <div class="col-xs-12 col-sm-6 col-lg-4 animated zoomIn">
		            <div class="card card-underline">
		                <div class="card-body">
		                    <div class="row">
		                        <div class="col-xs-4 row-centered">
		                            <div class="row">
		                                <div class="col-xs-12">
		                                    <?= $this->Html->image(
		                                        'company_img' . DS . $post->hiring_manager->company_logo,
		                                        ['class' => 'img-circle border-gray border-xl img-responsive'])
		                                    ?>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-xs-8">
		                            <h4 class="text-primary title-post">
		                                <?= $this->Html->link(
		                                    $post->post_title,
		                                    ['controller' => 'posts', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->post_title), 'id' => $post->id])
		                                ?>
		                            </h4>
		                            <h5 class="text-primary title-post">
		                                <?= $this->Html->link(
		                                    $post->hiring_manager->company_name,
		                                    ['controller' => 'HiringManagers', 'action' => 'view', 'slug' => Cake\Utility\Inflector::slug($post->hiring_manager->company_name), 'id' => $post->hiring_manager->id],
		                                    ['escape' => false, 'class' => 'text-primary']);
		                                ?>
		                            </h5>
		                            <div class="row no-margin">
		                                <div class="text-default-light"> 
		                                    <?php
		                                        $start = date_create($post->post_date->format('Y-m-d'));
		                                        $end = date_create(date("Y-m-d"));
		                                        $date = date_diff($start, $end)->format('%a');
		                                        if($date < 1)
		                                            echo 'Today';
		                                        else if($date < 2)
		                                            echo 'Yesterday';
		                                        else if($date < 30)
		                                            echo $date, ' days ago';
		                                        else
		                                            echo $post->post_date->format('d-M-Y');
		                                    ?>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="card-body no-padding style-default-light">
		                    <div class="row no-margin text-default-light">
		                        <div class="col-xs-6 item-post">
		                            <i class="fa fa-archive fa-fw" aria-hidden="true"></i> <?= $post->has('category') ? h($post->category->category_name) : '' ?><br/>
		                            <i class="fa fa-phone fa-fw" aria-hidden="true"></i> <?= $post->has('hiring_manager') ? h($post->hiring_manager->hiring_manager_phone_number) : '' ?>
		                        </div>
		                        <div class="col-xs-6 item-post">
		                            <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i> <?= $post->has('post_location') ? h($post->post_location) : '' ?><br/>
		                            <i class="fa fa-usd fa-fw" aria-hidden="true"></i> <?= $post->has('post_salary') ? $this->Number->currency($post->post_salary, 'VND', ['pattern' => 'VND #,###.00']) : '' ?><br/>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <?php endforeach; ?>
		    </div>
		<?php endif; ?>
    </div>
</section>