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
		<div class="dashboard-content-inner">		
	
			<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">

			<section id="contact" class="margin-bottom-60">
                <h3 class="headline margin-top-15 margin-bottom-35">Feel free to contact the Admin</h3>
                @if($errors->all())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" >
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    @if(session('status'))
                        <div class="alert alert-success">
                        {{session('status')}}
                        </div>
                    @endif

				<form method="post" id="contactform" autocomplete="on">
                    @csrf
					<div class="row">
						<div class="col-md-12">
							<div class="input-with-icon-left">
								<input class="with-border" name="name" type="text" id="name" value="{{Auth::user()->name}}" placeholder="Your Name" required="required" />
								<i class="icon-material-outline-account-circle"></i>
							</div>
						</div>						
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
							<div class="input-with-icon-left">
								<input class="with-border" name="email" type="email" id="email" value="{{Auth::user()->email}}" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
								<i class="icon-material-outline-email"></i>
							</div>
						</div>
                    </div>
					<div class="input-with-icon-left">
						<input class="with-border" name="subject" type="text" id="subject" placeholder="Subject" required="required" />
						<i class="icon-material-outline-assignment"></i>
					</div>

					<div>
						<textarea class="with-border" name="message" cols="40" rows="5" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" class="submit button margin-top-15" id="submit" value="submit" />

				</form>
			</section>

		</div>
	<!-- Row -->
			
			<!-- Row / End -->

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					Â© 2018 <strong>Hireo</strong>. All Rights Reserved.
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

<!-- Wrapper / End -->


<!-- Apply for a job popup
================================================== -->
@endsection