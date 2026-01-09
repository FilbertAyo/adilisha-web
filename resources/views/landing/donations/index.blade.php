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
    					
    					<div class="row">
    						<div class="col-md-6">
    							<div class="form-group">
    								<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Currency *</label>
    								<select id="currency-select" class="form-control" required onchange="updateQuickAmounts()" style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    									<option value="USD" selected>USD ($)</option>
    									<option value="TZS">TZS (Tanzanian Shilling)</option>
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
    						<div class="row" id="quick-amounts">
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100 quick-amount-btn" data-amount-usd="25" data-amount-tzs="60000">$25</button>
    							</div>
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100 quick-amount-btn" data-amount-usd="50" data-amount-tzs="120000">$50</button>
    							</div>
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100 quick-amount-btn" data-amount-usd="100" data-amount-tzs="240000">$100</button>
    							</div>
    							<div class="col-md-3 col-6 mb-2">
    								<button type="button" class="btn btn-outline-white w-100 quick-amount-btn" data-amount-usd="500" data-amount-tzs="1200000">$500</button>
    							</div>
    						</div>
    					</div>
    					
    					<!-- Personal Information Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Your Information</h4>
    					
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
    					
    					<!-- Payment Information Section -->
    					<h4 class="mt-5 mb-3" style="color: rgba(255,255,255,.9); border-bottom: 2px solid rgba(255,255,255,.3); padding-bottom: 10px;">Payment Method</h4>
    					
    					<div class="form-group">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Payment Method *</label>
    						<select class="form-control" required style="background: transparent; color: rgba(255,255,255,.8); border: 2px solid rgba(255,255,255,.7);">
    							<option value="">Select Payment Method</option>
    							<option value="Credit Card">Credit/Debit Card</option>
    							<option value="Mobile Money">Mobile Money (M-Pesa, Tigo Pesa, Airtel Money)</option>
    							<option value="Bank Transfer">Bank Transfer</option>
    							<option value="PayPal">PayPal</option>
    						</select>
    					</div>
    					
    					<!-- Optional Comment -->
    					<div class="form-group mt-4">
    						<label style="color: rgba(255,255,255,.9); margin-bottom: 8px; display: block;">Comments (Optional)</label>
    						<textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Any comments or special instructions..."></textarea>
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
    function updateQuickAmounts() {
        const currency = document.getElementById('currency-select').value;
        const buttons = document.querySelectorAll('.quick-amount-btn');
        
        buttons.forEach(button => {
            const amount = currency === 'USD' 
                ? button.getAttribute('data-amount-usd') 
                : button.getAttribute('data-amount-tzs');
            const symbol = currency === 'USD' ? '$' : 'TZS ';
            button.textContent = symbol + parseInt(amount).toLocaleString();
            button.onclick = function() {
                document.getElementById('donation-amount').value = amount;
            };
        });
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateQuickAmounts();
    });
    </script>

</x-landing-layout>
