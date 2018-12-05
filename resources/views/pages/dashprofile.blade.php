@extends('layout.adminmaster')
@section('content')
<div class="dashboard-container">
	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							<li class="active"><a href="{{url('/pages/dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="{{url('/pages/dashmessage')}}"><i class="icon-material-outline-question-answer"></i> Messages</a>
								<ul>
									<li><a href="dashboard-manage-jobs.html">Inbox <span class="nav-tag">3</span></a></li>
									<li><a href="{{url('/tutor/compose')}}">Compose</a></li>
									<li><a href="dashboard-post-a-job.html">Outbox</a></li>
								</ul>	
							</li>
							
						</ul>
						
						<ul data-submenu-title="Organize and Manage">
							<li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>
								<ul>
									<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>
									<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>
									<li><a href="dashboard-post-a-job.html">Post a Job</a></li>
								</ul>	
							</li>
							
						</ul>

						<ul data-submenu-title="Account">
							<li><a href="{{url('/pages/dashprofile')}}"><i class="icon-material-outline-settings"></i> Settings</a></li>
							<li><a href="{{url('logout')}}"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Settings</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Settings</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
										<img class="profile-pic" src="{{asset('images/user-avatar-placeholder.png')}}" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" type="file" name="profile_picture" accept="image/*"/>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Full Name</h5>
												<input type="text" value="{{Auth::user()->name}}" class="with-border" value="Tom">
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Email</h5>
												<input type="email" class="with-border" value="{{Auth::user()->email}}">
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Phone Number</h5>
												<input type="text" class="with-border" value="{{Auth::user()->phone}}">
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Address</h5>
												<input type="text" class="with-border" value="{{Auth::user()->address}}">
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-face"></i> My Profile</h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
								<li>
									<div class="row">
										<div class="col-xl-4">
											<div class="submit-field">
												<div class="bidding-widget">
													<!-- Headline -->
													<span class="bidding-detail">Set your <strong>monthly rate</strong></span>

													<!-- Slider -->
													<div class="bidding-value margin-bottom-10">#<span id="biddingVal"></span></div>
													<input class="bidding-slider" type="text" name="rate" data-slider-handle="custom" data-slider-currency="#" data-slider-min="5000" data-slider-max="100000" data-slider-value="5000" data-slider-step="500" data-slider-tooltip="hide" />
												</div>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Skills <i class="help-icon" data-tippy-placement="right" title="Add up to 10 skills"></i></h5>

												<!-- Skills List -->
												<div class="keywords-container">
													<div class="keyword-input-container">
														<input type="text" name="skills" class="keyword-input with-border" placeholder="e.g. Angular, Laravel"/>
														<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
													</div>
													<div class="keywords-list">
														<span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">Angular</span></span>
														<span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">Vue JS</span></span>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Attachments</h5>												
												<!-- Attachments -->												
												<div class="clearfix"></div>
												
												<!-- Upload Button -->
												<div class="uploadButton margin-top-0">
													<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
													<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
													<span class="uploadButton-file-name">Maximum file size: 10 MB</span>
												</div>					
											</div>
										</div>
									</div>
								</li>
								<li>
								<div class="row">
								<div class="col-xl-12">
									<div id="test1" class="dashboard-box">
								<!-- Headline -->
								

								<div class="content with-padding">
									<div class="row">
										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Subject</h5>
												<input type="text" class="with-border">
											</div>
										</div>

										<div class="col-xl-2">
											<div class="submit-field">
												<h5>Age</h5>
												<input type="number" class="with-border">
											</div>
										</div>

										<div class="col-xl-2">
											<div class="submit-field">
												<h5>Gender</h5>
												<select class="selectpicker with-border" data-size="7" title="Select Gender" data-live-search="true">
													<option value="female">Female</option>
													<option value="male" selected>Male</option>																									
												</select>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Availability</h5>
												<input type="text" class="with-border">
											</div>
										</div>								
									</div>
								
						
							<div class="row">
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Tagline</h5>
											<input type="text" class="with-border" value="iOS Expert + Node Dev">
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Nationality</h5>
											<select class="selectpicker with-border" data-size="7" title="Select Job Type" data-live-search="true">
												<option value="AR">Argentina</option>
												<option value="AM">Armenia</option>
												<option value="AW">Aruba</option>
												<option value="US" selected>United States</option>
												<option value="UY">Uruguay</option>												
											</select>
										</div>
									</div>

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Introduce Yourself</h5>
											<textarea cols="30" rows="5" class="with-border">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</textarea>
										</div>
									</div>

								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				
				
				<!-- Button -->
				<div class="col-xl-12">
					<a href="#" class="button ripple-effect big margin-top-30">Save Changes</a>
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					© 2018 <strong>Hireo</strong>. All Rights Reserved.
				</div>
				<ul class="footer-social-links">
					<li>
						<a href="#" title="Facebook" data-tippy-placement="top">
							<i class="icon-brand-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="#" title="Twitter" data-tippy-placement="top">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#" title="Google Plus" data-tippy-placement="top">
							<i class="icon-brand-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a href="#" title="LinkedIn" data-tippy-placement="top">
							<i class="icon-brand-linkedin-in"></i>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->

@endsection