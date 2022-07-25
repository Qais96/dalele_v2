@include('theme_layout.slider_two')

<section class="ls section_padding_top_100 section_padding_bottom_75">
				<div class="container">
				

					<div class="row topmargin_40">
						<div class="col-sm-4 to_animate animated pullDown" data-animation="pullDown">
							<div class="teaser text-center">
								<div class="teaser_icon highlight size_normal">
									<i class="rt-icon2-phone5"></i>
								</div>

								<p>
									<span class="grey">Phone:</span> +12 345 678 9123
									<br>
									<span class="grey">Fax:</span> +12 345 678 9123
								</p>

							</div>
						</div>
						<div class="col-sm-4 to_animate animated pullDown" data-animation="pullDown">
							<div class="teaser text-center">
								<div class="teaser_icon highlight size_normal">
									<i class="rt-icon2-location2"></i>
								</div>

								<p>
									PO Box 54378
									<br> 4321 Your Address,
									<br> Your City, Your Country
								</p>

							</div>
						</div>
						<div class="col-sm-4 to_animate animated pullDown" data-animation="pullDown">
							<div class="teaser text-center">
								<div class="teaser_icon highlight size_normal">
									<i class="rt-icon2-mail"></i>
								</div>

								<p>info@company.com</p>

							</div>
						</div>

					</div>

					<div class="row topmargin_40">
						<div class="col-sm-12 to_animate animated fadeInUp">
							<form class="contact-form row columns_margin_bottom_40" method="post" action="./">


								<div class="col-sm-6">
									<div class="contact-form-name">
										<label for="name">Your Name
											<span class="required">*</span>
										</label>
										<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Your Name">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="contact-form-email">
										<label for="email">Email address
											<span class="required">*</span>
										</label>
										<input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="contact-form-subject">
										<label for="subject">Subject
											<span class="required">*</span>
										</label>
										<input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="contact-form-phone">
										<label for="phone">Phone
											<span class="required">*</span>
										</label>
										<input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone">
									</div>
								</div>
								<div class="col-sm-12">

									<div class="contact-form-message">
										<label for="message">Message</label>
										<textarea aria-required="true" rows="1" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="contact-form-submit topmargin_20">
										<button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button color1 with_shadow">Send Message</button>
									</div>
								</div>


							</form>
						</div>
					</div>
				</div>
			</section>