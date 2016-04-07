<style type="text/css">
#content{padding: 0;}
.cv{margin: auto;width: 793px;}
.cv hr{margin-top: 12px;margin-bottom: 12px;border: 1px dashed #E2E2E2;}
.cv .cv-date{font-size: 12px;}
.cv .cv-title{/*text-transform: uppercase;*/}
.cv .cv-block{border-left: 3px solid #E2E2E2;padding-left: 5px;}
.cv .cv-skills>ul>li, .cv .cv-hobbies>ul>li{padding: 5px 0;}
.cv .cv-skills>ul {list-style: none;padding-left: 0;}
.cv .cv-skills .level{background-color: #727272;height: 15px}
</style>
<div class="row">
	<div class="col-xs-12">
		<div class="card cv">
			<div class="card-body">
				<div class="row" id="templatePersonalInformation">
					<div class="col-xs-2 row-centered">
						<img src="{{applicant.image}}" class="img-circle border-white border-xl img-responsive" id="companyImage" alt="">
					</div>
					<div class="col-xs-5">
						<h1><b>{{applicant.name}}</b></h1>
						<h4 class="text-default-light">{{applicant.careerpath}}</h4>
					</div>
					<div class="col-xs-5" style="padding-top: 24px">
						<div class="row">
							<div class="col-xs-12">
								<span class="text-default-light pull-right">{{applicant.address}}</span>
							</div>
							<div class="col-xs-12">
								<span class="text-default-light pull-right">{{applicant.email}}</span>
							</div>
							<div class="col-xs-12">
								<span class="text-default-light pull-right">{{applicant.phone}}</span>
							</div>
						</div>
					</div>
				</div><hr/>
				<div class="row">
					<div class="col-xs-7">
						<div class="row">
							<div class="col-xs-12">
								<h2><b>Education</b></h2><hr/>
								<div class="row">
									<div class="col-xs-4">
										<h4 class="cv-date pull-right">{{education.start}} - {{education.end}}</h4>
									</div>
									<div class="col-xs-8">
										<h4 class="cv-title">{{education.title}}</h4>
										<p class="text-default-light cv-block">{{education.detail}}</p>
									</div>
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h2><b>Work Experience</b></h2><hr/>
								<div class="row">
									<div class="col-xs-4">
										<h4 class="cv-date pull-right">{{experience.start}} - {{experience.end}}</h4>
									</div>
									<div class="col-xs-8">
										<h4 class="cv-title">{{experience.title}}</h4>
										<p class="text-default-light cv-block">{{experience.detail}}</p>
									</div>
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h2><b>Activity, Certification and Award</b></h2><hr/>
								<div class="row">
									<div class="col-xs-4">
										<h4 class="cv-date pull-right">{{activity.start}} - {{activity.end}}</h4>
									</div>
									<div class="col-xs-8">
										<h4 class="cv-title">{{activity.title}}</h4>
										<p class="text-default-light cv-block">{{activity.detail}}</p>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="col-xs-5">
						<div class="row">
							<div class="col-xs-12">
								<h2><b>Objective</b></h2><hr/>
								{{applicant.futuregoal}}
							</div>	
						</div>
						<div class="row">
							<div class="col-xs-12 cv-skills">
								<h2><b>Skills</b></h2><hr/>
								<ul>
									<li>
										<div class="row">
											<div class="col-xs-12">{{skill.name}}</div>
											<div class="col-xs-12">
												<div class="level" style="{{skill_level}}"></div>
											</div>
										</div>
									</li>
								</ul>
							</div>	
						</div>
						<div class="row">
							<div class="col-xs-12 cv-hobbies">
								<h2><b>Hobbies</b></h2><hr/>
								<ul>
									<li>{{hobby.name}}</li>
								</ul>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        'type': 'GET',
        'url': 'http://localhost/CareerSystemWebBased/career_system/api/applicants/4.json',
        'contentType': 'application/json',
        'dataType': 'json',
        success: function(response){
        	
        },
        error: function(message){

        }
    });
});

</script>