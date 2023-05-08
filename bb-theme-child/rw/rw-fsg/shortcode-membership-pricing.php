<?php

/* Membership Pricing Table Display Shortcode 
----------------------------------------------------*/

add_shortcode( 'rw-membership-pricing-table', 'rw_membership_pricing_table_shortcode' );
function rw_membership_pricing_table_shortcode( $atts ) {
	
	ob_start();
		
	// Attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'rw-membership-pricing-table'
	);
	
	?>
	<div class="table-responsive">
	<table class="rw-pricing-table">
	<thead>
		<tr class="rw-image-row">
			<th class="rw-benefits"></th>
			<th class="rwpi"><img src="https://byferial.com/wp-content/uploads/2021/08/empower-member.png" width="150" height="150" alt="Empower Member"></th>
			<th class="rwpi"><img src="https://byferial.com/wp-content/uploads/2021/08/empower-consultant.png" width="150" height="150" alt="Empower Consultant"></th>
			<th class="rwpi"><img src="https://byferial.com/wp-content/uploads/2021/08/empower-professional.png" width="150" height="150" alt="Empower Professional"></th>
			<th class="rwpi"><img src="https://byferial.com/wp-content/uploads/2021/08/empower-master.png" width="150" height="150" alt="Empower Master"></th>
		</tr>
		<tr>
			<th class="rw-benefits rw-empty"></th>
			<th class="rwpi">Subscribe for Personal &amp; Professional Development</th>
			<th class="rwpi">Individuals who are serious about starting or taking their business to the next level</th>
			<th class="rwpi">Individuals who enjoy sharing their knowledge with others by coaching them to success</th>
			<th class="rwpi">Individuals who enjoy sharing their knowledge with others by mentoring them to become leaders &amp; influencers</th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td class="rw-benefits"><strong>POWERUP YOUR LEADERSHIP LEVEL</strong></td>
	<td class="rwpi rw-red"><strong>MEMBER<br>$40/mo</strong></td>
	<td class="rwpi rw-red"><strong>CONSULTANT<br>$70/mo</strong></td>
	<td class="rwpi rw-red"><strong>PROFESSIONAL<br>$150/mo</strong></td>
	<td class="rwpi rw-red"><strong>MASTER<br>$250/mo</strong></td>
	</tr>
	<tr>
	<td class="rw-benefits">Special Offers on Tools &amp; Products</td>
	<td class="rwpi"><strong>15%</strong></td>
	<td class="rwpi"><strong>30%</strong></td>
	<td class="rwpi"><strong>40%</strong></td>
	<td class="rwpi"><strong>50%</strong></td>
	</tr>
	<tr>
	<td class="rw-benefits">Certified 4x4 Color Consultant Training - Special Offer</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Access to our Empower Group Community</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Weekly Training (except for last Tuesday of each month)</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Use of 4x4 Empower Group logo</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Use of 4x4 member logo</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Quarterly coaching &amp; mentoring sessions with a Certified Master Trainer (Fashion &amp; Color Trends Reports and forecasting)</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Listing in the Find a Consultant Online directory</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Access to our annual conference &amp; retreat</td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Featured listing in the Find a Consultant Online directory *</td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Spotlight opportunity (Coffee Talk Live, social media, newsletter)</td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Guest speaker (Live Webinar)</td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Certified Image Consultant Training  - Special Offer</td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Use of 4x4 Consultant logo</td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Business Templates &amp; Forms</td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Access to Digital Drapes, Swatches &amp; Booklets</td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Unlimited Creation of Fashion &amp; Style Guide Reports</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Certified Professional Image Consultant Training - Special Offer</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Affiliate program eligibility</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Use of 4x4 Professional logo</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Regional Empower Group  Leader</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Custom branded manuals, tools and products eligibility</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Use of 4x4 Master logo</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Certified Image Master &amp; Lifestyle Coach Training - Special Offer</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">1 year licensing valued at $7200 with your CMT&amp;LC training</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr>
	<td class="rw-benefits">Monthly coaching &amp; mentoring sessions with the Master</td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"></td>
	<td class="rwpi"><i class="fas fa-check"></i></td>
	</tr>
	<tr class="rw-button-row">
	<td class="rw-benefits"></td>
	<td class="rwpi rw-red">
		<p><strong>MEMBER<br>$40/mo</strong></p>
		<div class="fl-button-wrap fl-button-width-auto fl-button-center">
			<a href="https://byferial.com/?add-to-cart=9125" target="_self" class="fl-button" role="button">
				<span class="fl-button-text">Sign Up</span>
			</a>
		</div>
	</td>
	<td class="rwpi rw-red">
		<p><strong>CONSULTANT<br>$70/mo</strong></p>
		<div class="fl-button-wrap fl-button-width-auto fl-button-center">
			<a href="https://byferial.com/?add-to-cart=9126" target="_self" class="fl-button" role="button">
				<span class="fl-button-text">Sign Up</span>
			</a>
		</div>
	</td>
	<td class="rwpi rw-red">
		<p><strong>PROFESSIONAL<br>$150/mo</strong></p>
		<div class="fl-button-wrap fl-button-width-auto fl-button-center" style="margin-bottom: 20px;">
			<a href="https://byferial.com/?add-to-cart=9127" target="_self" class="fl-button" role="button">
				<span class="fl-button-text">Sign Up</span>
			</a>
		</div>
		<p><strong>BEST VALUE</strong></p>
	</td>
	<td class="rwpi rw-red">
		<p><strong>MASTER<br>$250/mo</strong></p>
		<div class="fl-button-wrap fl-button-width-auto fl-button-center">
			<a href="https://byferial.com/?add-to-cart=9128" target="_self" class="fl-button" role="button">
				<span class="fl-button-text">Sign Up</span>
			</a>
		</div>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
	
	
	
	<?php
		
	return ob_get_clean();

}

?>