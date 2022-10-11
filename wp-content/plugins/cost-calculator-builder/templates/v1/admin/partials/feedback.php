<div id="ccb-feedback-modal" class="ccb-feedback-modal">
	<div class="feedback-modal-content">
		<span class="feedback-modal-close">&times;</span>
		<span class="feedback-thank-you" style="display: none;">
			<img src="<?php echo esc_url( CALC_URL . '/frontend/v1/dist/img/feedback-thank-you.svg' ); ?>">
		</span>
		<h2>Please leave a Feedback</h2>

		<div class="feedback-rating-stars">
			<ul id="feedback-stars">
				<li class="star selected" title="Poor" data-value="1">
					<i class="feedback-star"></i>
				</li>
				<li class="star selected" title="Bad" data-value="2">
					<i class="feedback-star"></i>
				</li>
				<li class="star selected" title="Fair" data-value="3">
					<i class="feedback-star"></i>
				</li>
				<li class="star selected" title="Good" data-value="4">
					<i class="feedback-star"></i>
				</li>
				<li class="star selected" title="Excellent!" data-value="5">
					<i class="feedback-star"></i>
				</li>
			</ul>
			<span class="rating-text">Excellent!</span>
		</div>

		<p class="feedback-review-text" style="display: none;"></p>
		<div class="feedback-extra">
			<textarea id="feedback-review" rows="5" placeholder="Please enter your Review..."></textarea>
			<small>Found a bug in the plugin?
				<a href="<?php echo esc_url( ccb_get_ticket_url() ); ?>" target="_blank">Click here</a> to report it.</small>
		</div>
		<a href="https://bit.ly/33EkIN3" class="feedback-submit" target="_blank">
			Submit
			<img src="<?php echo esc_url( CALC_URL . '/frontend/v1/dist/img/feedback-external-link.svg' ); ?>">
		</a>
	</div>
</div>
