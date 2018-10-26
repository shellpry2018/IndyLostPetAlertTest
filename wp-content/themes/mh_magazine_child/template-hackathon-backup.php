<?php
/**
 * Template Name: Hackathon Backup
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="mh-wrapper clearfix">
    <div class="mh-main">
        <div class="mh-content <?php mh_content_class(); ?>">
			<?php mh_before_page_content(); ?>
			<?php get_template_part('content', 'page'); ?>
			<form action="https://cs25.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8" method="POST">
			<input type="hidden" id="tmp_uploads_folder" name="tmp_uploads_folder" value="<?php echo date('Ymd_His', time()) ?>">
			<input type=hidden name="orgid" value="00D1b000000DUyo">
			<input type=hidden name="recordType" value="0121b0000004XlU">
			<input type=hidden name="retURL" value="https://indylostpetalert.com/report-a-lost-pet/thank-you">

			<h4 class="widget-title">Contact Information</h4>
			<label class="customizer-field two-column-field">
				First Name<input  id="00N1b000000rfjR" maxlength="50" name="00N1b000000rfjR" required size="20" type="text" /><br>
			</label>
			<label class="customizer-field two-column-field">
				Last Name<input  id="00N1b000000rfjW" maxlength="50" name="00N1b000000rfjW" required size="20" type="text" /><br>
			</label>
			<label class="customizer-field two-column-field" for="phone">
				Phone<input class="phone" id="phone" maxlength="40" name="phone" required size="20" type="text" /><br>
			</label>
			<label class="customizer-field two-column-field">
				Alternate Phone<input class="phone" id="00N1b000000rfjb" maxlength="25" name="00N1b000000rfjb" size="20" type="text" /><br>
			</label>
			<label class="customizer-field"  for="email">
				Email<input  id="email" maxlength="80" name="email" required size="20" type="text" /><br>
			</label>
			<label class="customizer-field"  for="confirm_email">
				Confirm Email<span style="color:grey; margin-left:10px">(Paste Disabled)</span><input  id="confrim_email" maxlength="80" name="confirm_email" required size="20" type="text" /><br>
			</label>

			<h4 class="widget-title">Pet Information</h4>
			<label class="customizer-field two-column-field">
				Pet Name<input id="00N1b000000rfke" required maxlength="50" name="00N1b000000rfke" size="20" type="text" /><br>
			</label>
			<label class="customizer-field two-column-field">
					Pet Type<select required id="00N1b000000rfkZ" name="00N1b000000rfkZ" title="Pet Type">
					<option value="Dog">Dog</option>					
					<option value="Cat">Cat</option>
					<option value="Other">Other</option>
				</select><br>
			</label>
				
			<label class="customizer-field" for="pet_image">Post Picture of Your Pet (THIS IS CRITICAL!)	<input type="hidden" id="pet_image_new" name="pet_image" required>
        		<div id="pet_image_new-placeholder" class="image-placeholder">No image selected</div>
				<div class="progress-area" style="display:none">
					<h4 class="progress-status"></h4>
					<progress value="0" max="100" class="img-upload-bar">
						<div class="progress-bar">
							<span></span>
						</div>
					</progress>
					<p id="loaded_n_total"></p>
				</div>
				<label for="pet_image_new-button" class="form-button">Choose File</label>
					<input id="pet_image_new-button" type="file" style="display:none">
					<div hidden id="image_url">
						<input id="00N1b000000rfq8" maxlength="255" name="00N1b000000rfq8" size="20" type="text"/>
					</div>
				</label>
			<label class="customizer-field">
				Is Pet Microchipped<select  id="00N1b000000rfko" name="00N1b000000rfko" title="Is Pet Microchipped" required>
			<option value="I Don&#39;t Know if Pet is Microchipped">I Don&#39;t Know if Pet is Microchipped</option>
			<option value="Yes, Pet is Microchipped">Yes, Pet is Microchipped</option>
			<option value="Yes, Pet is Microchipped But Information is Not Current">Yes, Pet is Microchipped But Information is Not Current</option>
			<option value="No, Pet is Not Microchipped">No, Pet is Not Microchipped</option>
			
			</select><br>
			</label>
			<label class="customizer-field two-column-field">
				Is Pet Spayed/Neutered<select  id="00N1b000000rfkt" name="00N1b000000rfkt" title="Is Pet Spayed/Neutered" required>
				<option value="I Don&#39;t Know">I Don&#39;t Know</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select><br>
			</label>
			<label class="customizer-field two-column-field">
				Is Pet Wearing a Collar<select  id="00N1b000000rfky" name="00N1b000000rfky" title="Is Pet Wearing a Collar" required>
				<option value="I Don&#39;t Know">I Don&#39;t Know</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select><br>
			</label>
			<label class="customizer-field">
				Additional Pet Description <textarea id="00N1b000000rfkj" name="00N1b000000rfkj" rows="3" type="text" wrap="soft" maxlength="300" ></textarea>
				<div style='font-weight:normal' id="textarea_feedback"></div><br>
			</label>
				
			<h4 class="widget-title">Lost Information</h4>
			<div id="map" class="customizer-field" style="height: 400px;"></div>
			
			<label class="customizer-field" id="street">
				Nearest Intersection<textarea required id="00N1b000000rfl3" name="00N1b000000rfl3" rows="2" type="text" wrap="soft"></textarea><br>
			</label>
			<label class="customizer-field three-column-field" id="city">
				City the Pet Lost<input required id="00N1b000000rfl8" maxlength="50" name="00N1b000000rfl8" size="20" type="text" /><br>
			</label>
			<label class="customizer-field three-column-field" id="county">
				County the Pet Lost<input required id="00N1b000000rflD" maxlength="50" name="00N1b000000rflD" size="20" type="text" /><br>
			</label>
			<label class="customizer-field three-column-field" id="zipCode">
				Zip Code the Pet Lost<input required id="00N1b000000rfkF" maxlength="10" name="00N1b000000rfkF" size="20" type="text" /><br>
			</label>
			<label class="customizer-field">
				Date Pet Lost<input id="00N1b000000rfkK" required class="datepicker" name="00N1b000000rfkK" size="12" type="text" /><br>
			</label>
				
			<h4 class="widget-title">Alert Post Information</h4>
			<label class="customizer-field" for="subject">
				Subject<input  id="subject" maxlength="80" name="subject" size="20" type="text" /><br>
			</label>
			<label class="customizer-field" for="description">
				Description<textarea name="description" rows="3"></textarea><br>
			</label>

			<button id="form-submit-button" class="form-button" type="submit">Submit</button>

			</form>
			<?php endwhile; endif; ?>
        </div>
		<?php get_sidebar(); ?>
    </div>
    <?php mh_second_sb(); ?>
</div>
<?php get_footer(); ?>