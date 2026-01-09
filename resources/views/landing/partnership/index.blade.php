<x-landing-layout>
   
    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Get Involved</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Partner With Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section-3">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex justify-content-center">
    			<div class="col-md-10 volunteer pl-md-5 ftco-animate">
    				<h3 class="mb-4">Partner With Us</h3>
    				<p class="mb-4" style="color: rgba(255,255,255,.9);">Join us in empowering Tanzanian youth through STEM education. Fill out the form below to start a partnership that will transform lives and build a brighter future.</p>
    				
    				<form action="#" class="volunter-form">
    					<!-- Personal Information Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Personal Information</h4>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Full Name *</label>
    								<input type="text" class="form-control" placeholder="Your Full Name" required>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Email Address *</label>
    								<input type="email" class="form-control" placeholder="your.email@example.com" required>
    							</div>
    						</div>
    					</div>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Phone Number *</label>
    								<input type="tel" class="form-control" placeholder="+255 XXX XXX XXX" required>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Alternate Phone</label>
    								<input type="tel" class="form-control" placeholder="Optional alternate contact">
    							</div>
    						</div>
    					</div>
    					
    					<!-- Organization Information Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Organization Information</h4>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Organization/Company Name *</label>
    								<input type="text" class="form-control" placeholder="Your Organization Name" required>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Your Position/Title *</label>
    								<input type="text" class="form-control" placeholder="e.g., CEO, Director, Manager" required>
    							</div>
    						</div>
    					</div>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Organization Type *</label>
    								<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    									<option value="">Select Organization Type</option>
    									<option value="NGO">Non-Governmental Organization (NGO)</option>
    									<option value="Corporate">Corporate/Private Company</option>
    									<option value="Foundation">Foundation</option>
    									<option value="Government">Government Agency</option>
    									<option value="Educational">Educational Institution</option>
    									<option value="Individual">Individual/Individual Donor</option>
    									<option value="Other">Other</option>
    								</select>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Organization Website</label>
    								<input type="url" class="form-control" placeholder="https://www.example.com">
    							</div>
    						</div>
    					</div>
    					
    					<!-- Address Information -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Address Information</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Street Address *</label>
    						<input type="text" class="form-control" placeholder="Street Address, Building Number" required>
    					</div>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">City *</label>
    								<input type="text" class="form-control" placeholder="City" required>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Region/State *</label>
    								<input type="text" class="form-control" placeholder="Region or State" required>
    							</div>
    						</div>
    					</div>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Postal/ZIP Code</label>
    								<input type="text" class="form-control" placeholder="Postal Code">
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Country *</label>
    								<input type="text" class="form-control" placeholder="Country" required>
    							</div>
    						</div>
    					</div>
    					
    					<!-- Partnership Details Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Partnership Details</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Area of Partnership *</label>
    						<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select Area of Partnership</option>
    							<option value="Funding">Funding/Financial Support</option>
    							<option value="Equipment">Equipment/Resource Donation</option>
    							<option value="Volunteering">Volunteer Services</option>
    							<option value="Technical">Technical Expertise/Training</option>
    							<option value="Infrastructure">Infrastructure/Facilities</option>
    							<option value="Scholarship">Scholarship/Sponsorship Program</option>
    							<option value="Research">Research Collaboration</option>
    							<option value="Awareness">Awareness/Marketing Support</option>
    							<option value="Corporate">Corporate Social Responsibility (CSR)</option>
    							<option value="Multi">Multiple Areas (Please specify in message)</option>
    							<option value="Other">Other (Please specify in message)</option>
    						</select>
    					</div>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Preferred Partnership Duration *</label>
    								<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    									<option value="">Select Duration</option>
    									<option value="One-time">One-time Support</option>
    									<option value="6months">6 Months</option>
    									<option value="1year">1 Year</option>
    									<option value="2years">2 Years</option>
    									<option value="3years">3 Years</option>
    									<option value="5years">5+ Years</option>
    									<option value="Ongoing">Ongoing/Long-term</option>
    								</select>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Estimated Budget/Value (Optional)</label>
    								<input type="text" class="form-control" placeholder="e.g., $10,000 or TZS 25,000,000">
    							</div>
    						</div>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Target Geographic Area</label>
    						<select class="form-control" style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select Target Area (Optional)</option>
    							<option value="Nationwide">Nationwide (All Tanzania)</option>
    							<option value="Dar es Salaam">Dar es Salaam</option>
    							<option value="Arusha">Arusha</option>
    							<option value="Mwanza">Mwanza</option>
    							<option value="Dodoma">Dodoma</option>
    							<option value="Kilimanjaro">Kilimanjaro</option>
    							<option value="Tanga">Tanga</option>
    							<option value="Morogoro">Morogoro</option>
    							<option value="Mbeya">Mbeya</option>
    							<option value="Rural">Rural Areas</option>
    							<option value="Urban">Urban Areas</option>
    							<option value="Specific">Specific Region/Location</option>
    						</select>
    					</div>
    					
    					<!-- Project Focus Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Project Focus</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Which Programs Interest You? (Select all that apply)</label>
    						<div style="color: rgba(255,255,255,.9);">
    							<div class="form-check mb-2">
    								<input class="form-check-input" type="checkbox" id="vutamdogo" name="programs[]" value="vutamdogo" style="margin-right: 8px;">
    								<label class="form-check-label" for="vutamdogo" style="color: rgba(255,255,255,.9);">VUTAMDOGO STEM Project</label>
    							</div>
    							<div class="form-check mb-2">
    								<input class="form-check-input" type="checkbox" id="chomoza" name="programs[]" value="chomoza" style="margin-right: 8px;">
    								<label class="form-check-label" for="chomoza" style="color: rgba(255,255,255,.9);">CHOMOZA STEM Project</label>
    							</div>
    							<div class="form-check mb-2">
    								<input class="form-check-input" type="checkbox" id="workshops" name="programs[]" value="workshops" style="margin-right: 8px;">
    								<label class="form-check-label" for="workshops" style="color: rgba(255,255,255,.9);">STEM Workshops</label>
    							</div>
    							<div class="form-check mb-2">
    								<input class="form-check-input" type="checkbox" id="agenda2049" name="programs[]" value="agenda2049" style="margin-right: 8px;">
    								<label class="form-check-label" for="agenda2049" style="color: rgba(255,255,255,.9);">Adilisha Agenda 2049</label>
    							</div>
    							<div class="form-check mb-2">
    								<input class="form-check-input" type="checkbox" id="all" name="programs[]" value="all" style="margin-right: 8px;">
    								<label class="form-check-label" for="all" style="color: rgba(255,255,255,.9);">All Programs</label>
    							</div>
    						</div>
    					</div>
    					
    					<!-- Additional Information Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Additional Information</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">How did you hear about us? *</label>
    						<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select an option</option>
    							<option value="Website">Website</option>
    							<option value="Social Media">Social Media</option>
    							<option value="Referral">Referral/Recommendation</option>
    							<option value="Event">Event/Conference</option>
    							<option value="News">News/Media</option>
    							<option value="Search">Search Engine</option>
    							<option value="Other">Other</option>
    						</select>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Preferred Contact Method *</label>
    						<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select Preferred Method</option>
    							<option value="Email">Email</option>
    							<option value="Phone">Phone Call</option>
    							<option value="WhatsApp">WhatsApp</option>
    							<option value="Meeting">In-person Meeting</option>
    							<option value="Video">Video Call</option>
    						</select>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Partnership Proposal/Message *</label>
    						<textarea name="" id="" cols="30" rows="8" class="form-control" placeholder="Please provide details about your partnership proposal, goals, expectations, and any additional information you'd like us to know..." required></textarea>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Additional Comments or Questions</label>
    						<textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Any additional comments, questions, or information you'd like to share..."></textarea>
    					</div>
    					
    					<div class="form-group mt-4">
    						<div class="form-check">
    							<input class="form-check-input" type="checkbox" id="agreement" required style="margin-right: 8px;">
    							<label class="form-check-label" for="agreement" style="color: rgba(255,255,255,.9);">
    								I agree to be contacted by Adilisha regarding this partnership proposal and understand that my information will be kept confidential. *
    							</label>
    						</div>
    					</div>
    					
    					<div class="form-group mt-5">
    						<input type="submit" value="Submit Partnership Proposal" class="btn btn-white py-3 px-5" style="font-size: 18px; font-weight: 600;">
    					</div>
    				</form>
    			</div>    			
    		</div>
    	</div>
    </section>

</x-landing-layout>
