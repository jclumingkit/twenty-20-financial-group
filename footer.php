<?php 
$display_footer_section 		= get_field('display_footer_section', 'option'); 

$footer_section_display_footer_logo 		= get_field('footer_section_display_footer_logo', 'option'); 
$footer_section_footer_logo 		= get_field('footer_section_footer_logo', 'option'); 

$footer_section_display_footer_form 		= get_field('footer_section_display_footer_form', 'option'); 
$footer_section_footer_form_title 		= get_field('footer_section_footer_form_title', 'option'); 
$footer_section_footer_form_description 		= get_field('footer_section_footer_form_description', 'option'); 
$footer_section_footer_form_id 		= get_field('footer_section_footer_form_id', 'option'); 

$footer_section_display_footer_menu_1 		= get_field('footer_section_display_footer_menu_1', 'option'); 
$footer_section_display_footer_menu_2 		= get_field('footer_section_display_footer_menu_2', 'option'); 
if($display_footer_section && ($footer_section_display_footer_logo ||$footer_section_display_footer_form ||$footer_section_display_footer_menu_1 ||$footer_section_display_footer_menu_2)){
?>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="footer__logo">
						<?php if($footer_section_display_footer_logo && $footer_section_footer_logo){ ?>
							<a href="<?=(get_field('header_section_header_home_page_link','option'))?get_field('header_section_header_home_page_link','option'):site_url();?>"><?=@getImageSizeAlt($footer_section_footer_logo);?></a>
						<?php } ?>
					</div>
					<?php if($footer_section_display_footer_form && ($footer_section_footer_form_description ||$footer_section_footer_form_id)){ ?>
						<div class="newsletter_wrap">
							<div class="global__font">
								<h5><?=@$footer_section_footer_form_title?></h5>
								<?=@$footer_section_footer_form_description?>
							</div>

							<div class="newsletter_form">
								<?php if ($footer_section_footer_form_id) { echo do_shortcode('[gravityform id="' . $footer_section_footer_form_id . '" title="false" description="false" ajax="true"]');} ?>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="col-md-6">
					<div class="footer_coulmn">
						<div class="footer_links">
							<?php if($footer_section_display_footer_menu_1){ ?>
								<?php dynamic_sidebar('footer-menu-1') ?>
							<?php } ?>
						</div>

						<div class="footer_links">
							<?php if($footer_section_display_footer_menu_2){ ?>
								<?php dynamic_sidebar('footer-menu-2') ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
<?php } ?>
<?php 
$popup_section_title = get_field('popup_section_title', 'option');
$popup_section_description = get_field('popup_section_description', 'option');
$popup_section_form_id = get_field('popup_section_form_id', 'option');
if($popup_section_description ||$popup_section_form_id){
?>
	<div class="subscribe_modal_wrap">
		<!-- Modal -->
		<div class="modal fade" id="subscribe_modal" tabindex="-1" aria-labelledby="subscribe_modal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" data-bs-dismiss="modal" aria-label="Close">
							<img src="<?=site_url();?>/wp-content/uploads/2024/06/close-icon.svg" alt="img">
						</button>
					</div>
					<div class="modal-body">
						<div class="faq_page_title">
							<h1><?=@$popup_section_title?></h1>
							<?=@$popup_section_description?>
						</div>
						<?php if($popup_section_form_id){ echo do_shortcode('[gravityform id="'.$popup_section_form_id.'" title="false" description="false" ajax="true"]'); } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
    </main>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
	<?php wp_footer(); ?>

<script>
	//email
    jQuery(document).on('keypress', 'input[type="email"]', function() {
		var regex = new RegExp("^[a-zA-Z.0-9.@-]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
	//Dealer Name
	jQuery(document).on('keypress', '.name input', function(event) {
        $(this).css({'text-transform': 'capitalize'});
        var regex = new RegExp("^[a-zA-Z ,'.-]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
	//Title
	jQuery(document).on('keypress', '.title input', function(event) {
        $(this).css({'text-transform': 'capitalize'});
    });
	//message
	jQuery(document).on('input', '.message input,.message textarea', function(event) {
		var currentValue = $(this).val();
		var firstLetter = currentValue.charAt(0).toUpperCase();
		var restOfText = currentValue.slice(1).toLowerCase();
		$(this).val(firstLetter + restOfText);
	});
	//number
	jQuery(document).on('keypress', '.number input', function(event) {
        $(this).css({'text-transform': 'capitalize'});
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
	//Zip Code
    jQuery(document).on('keypress', '.pincode input', function(event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(event.which);

        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }

        if ($(this).val().length >= 5) {
            event.preventDefault();
            return false;
        }
    });
	//alphanumeric
    jQuery(document).on('keypress', '.alphanumeric input', function(event) {
        $(this).css({'text-transform': 'capitalize'});
        var regex = new RegExp("^[a-zA-Z 0-9 ,'.-]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

</script>
<!-- phone -->
<script>
	// Function to initialize Inputmask
	function initializeInputmask() {
		$('body').find('.gfield--type-phone input').inputmask("(999) 999-9999");
	}

	// Initial binding when the document is ready
	jQuery(document).ready(function() {
		initializeInputmask();
	});

	// Reapply Inputmask after AJAX form submission
	jQuery(document).on('keypress', '.gfield--type-phone input', function() {
		//console.log("Reapplying Inputmask after AJAX form submission");
		initializeInputmask();
	});
</script>
</body>
</html>
