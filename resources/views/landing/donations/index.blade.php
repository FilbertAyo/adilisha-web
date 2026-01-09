<x-landing-layout>
   
    <div class="hero-wrap2" style="background-image: url('front-end/images/hero_bg.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Get Involved</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Make a Donation</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section-3">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex justify-content-center">
    			<div class="col-md-10 volunteer pl-md-5 ftco-animate">
    				<h3 class="mb-4">Support STEM Education in Tanzania</h3>
    				<p class="mb-4" style="color: rgba(255,255,255,.9);">Your generous donation helps us equip schools with STEM labs, provide learning resources, and empower thousands of children—especially girls—with quality STEM education. Every contribution makes a difference in building Tanzania's future.</p>
    				
    				<form action="#" class="volunter-form">
    					<!-- Donation Amount Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Donation Amount</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Donation Type *</label>
    						<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select Donation Type</option>
    							<option value="One-time">One-time Donation</option>
    							<option value="Monthly">Monthly Recurring Donation</option>
    							<option value="Quarterly">Quarterly Donation</option>
    							<option value="Yearly">Yearly Donation</option>
    						</select>
    					</div>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Currency *</label>
    								<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    									<option value="USD">USD ($)</option>
    									<option value="TZS">TZS (Tanzanian Shilling)</option>
    									<option value="EUR">EUR (€)</option>
    									<option value="GBP">GBP (£)</option>
    								</select>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Amount *</label>
    								<input type="number" id="donation-amount" class="form-control" placeholder="Enter amount" min="1" step="0.01" required>
    							</div>
    						</div>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Quick Amount Selection (Optional)</label>
    						<div class="row">
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100" onclick="setAmount(25)">$25</button>
    							</div>
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100" onclick="setAmount(50)">$50</button>
    							</div>
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100" onclick="setAmount(100)">$100</button>
    							</div>
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100" onclick="setAmount(500)">$500</button>
    							</div>
    						</div>
    					</div>
    					
    					<!-- Designation Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Designation</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Where would you like your donation to go? *</label>
    						<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select Program/Area</option>
    							<option value="General">General Fund (Where it's needed most)</option>
    							<option value="VUTAMDOGO">VUTAMDOGO STEM Project</option>
    							<option value="CHOMOZA">CHOMOZA STEM Project</option>
    							<option value="Workshops">STEM Workshops</option>
    							<option value="Agenda2049">Adilisha Agenda 2049</option>
    							<option value="Equipment">Equipment & Supplies</option>
    							<option value="Scholarship">Scholarships for Students</option>
    							<option value="Teacher Training">Teacher Training Programs</option>
    							<option value="Lab Development">STEM Lab Development</option>
    							<option value="Infrastructure">Infrastructure & Facilities</option>
    						</select>
    					</div>
    					
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
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Donor Type</label>
    								<select class="form-control" style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    									<option value="Individual">Individual</option>
    									<option value="Corporate">Corporate/Company</option>
    									<option value="Organization">Organization/NGO</option>
    									<option value="Foundation">Foundation</option>
    									<option value="Anonymous">Anonymous</option>
    								</select>
    							</div>
    						</div>
    					</div>
    					
    					<!-- Organization Information (Optional) -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Organization Information (Optional)</h4>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Organization/Company Name</label>
    								<input type="text" class="form-control" placeholder="Organization Name (if applicable)">
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Tax ID / Registration Number</label>
    								<input type="text" class="form-control" placeholder="For receipt/tax purposes">
    							</div>
    						</div>
    					</div>
    					
    					<!-- Address Information -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Address Information</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Street Address</label>
    						<input type="text" class="form-control" placeholder="Street Address, Building Number">
    					</div>
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">City</label>
    								<input type="text" class="form-control" placeholder="City">
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Region/State</label>
    								<input type="text" class="form-control" placeholder="Region or State">
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
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Country</label>
    								<input type="text" class="form-control" placeholder="Country">
    							</div>
    						</div>
    					</div>
    					
    					<!-- Payment Information Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Payment Information</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Payment Method *</label>
    						<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select Payment Method</option>
    							<option value="Credit Card">Credit/Debit Card</option>
    							<option value="Bank Transfer">Bank Transfer</option>
    							<option value="Mobile Money">Mobile Money (M-Pesa, Tigo Pesa, Airtel Money)</option>
    							<option value="PayPal">PayPal</option>
    							<option value="Check">Check/Money Order</option>
    							<option value="Other">Other (Contact us)</option>
    						</select>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Account Name (for Bank Transfer)</label>
    						<input type="text" class="form-control" placeholder="Name on bank account">
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Bank Account Number (for Bank Transfer)</label>
    						<input type="text" class="form-control" placeholder="Account number">
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
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Would you like to receive updates about our programs?</label>
    						<select class="form-control" style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="Yes">Yes, please send me updates</option>
    							<option value="No">No, thank you</option>
    						</select>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Comments or Special Instructions</label>
    						<textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Any special instructions, dedication, or comments regarding your donation..."></textarea>
    					</div>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Dedication (Optional)</label>
    						<input type="text" class="form-control" placeholder="e.g., In memory of, In honor of, etc.">
    					</div>
    					
    					<div class="form-group mt-4">
    						<div class="form-check">
    							<input class="form-check-input" type="checkbox" id="receipt" style="margin-right: 8px;">
    							<label class="form-check-label" for="receipt" style="color: rgba(255,255,255,.9);">
    								I would like to receive a receipt for tax purposes
    							</label>
    						</div>
    					</div>
    					
    					<div class="form-group mt-4">
    						<div class="form-check">
    							<input class="form-check-input" type="checkbox" id="anonymous" style="margin-right: 8px;">
    							<label class="form-check-label" for="anonymous" style="color: rgba(255,255,255,.9);">
    								I would like my donation to remain anonymous
    							</label>
    						</div>
    					</div>
    					
    					<div class="form-group mt-4">
    						<div class="form-check">
    							<input class="form-check-input" type="checkbox" id="agreement" required style="margin-right: 8px;">
    							<label class="form-check-label" for="agreement" style="color: rgba(255,255,255,.9);">
    								I understand that my donation supports Adilisha's mission and programs, and I agree to the terms and conditions. *
    							</label>
    						</div>
    					</div>
    					
    					<div class="form-group mt-5">
    						<input type="submit" value="Proceed to Payment" class="btn btn-white py-3 px-5" style="font-size: 18px; font-weight: 600;">
    					</div>
    				</form>
    			</div>    			
    		</div>
    	</div>
    </section>

    <script>
    function setAmount(amount) {
        document.getElementById('donation-amount').value = amount;
    }
    </script>

</x-landing-layout>
