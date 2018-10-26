<?php
/**
 * Template Name: Lost Pet Report Page V2
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
					<option selected value="Select">Select</option>	
					<option value="Dog">Dog</option>					
					<option value="Cat">Cat</option>
					<option value="Other">Other</option>
				</select><br>
			</label>
		
		<div id="dog-type-options" style="display:none">
		<div class="row">
			<!-- Dog Sizes -->
			<div class="column">
			<input class="radio-dogs-size" type="radio" id="xsmallDog" name="dogsize" alt="xsmall dog">
				<label class="radio-dogs-size" for="xsmallDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Dog-xsmall_001.png" alt="xsmall dog" /></label></div>
			<div class="column">
			<input class="radio-dogs-size" type="radio" id="smallDog" name="dogsize" alt="small dog">
				<label class="radio-dogs-size" for="smallDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Dog-small.png" alt="small dog" /></label></div>
			<div class="column">
			<input class="radio-dogs-size" type="radio" id="mediumDog" name="dogsize" alt="medium dog">
				<label class="radio-dogs-size" for="mediumDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Dog-medium.png" alt="medium dog" /></label></div>
			<div class="column">
			<input class="radio-dogs-size" type="radio" id="largeDog" name="dogsize" alt="large dog">
				<label class="radio-dogs-size" for="largeDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Dog-large.png" alt="large dog" /></label></div>
			<div class="column">
			<input class="radio-dogs-size" type="radio" id="xlargeDog" name="dogsize" alt="xlarge dog">
				<label class="radio-dogs-size" for="xlargeDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Dog-xlarge.png" alt="xlarge dog" /></label></div>
			<div class="column">
			<input class="radio-dogs-size" type="radio" id="xxlargeDog" name="dogsize" alt="xxlarge dog">
				<label class="radio-dogs-size" for="xxlargeDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Dog-xxlarge.png" alt="xxlarge dog" /></label></div>
				</div>

			<!-- Common color : Dogs -->
			<div class="rowColor">
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="blackDog" name="dogcolor" alt="black Dog">			
				<label class="radio-dogs-color" for="blackDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Black.png" alt="black dog" /></label></div>	
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="brownDog" name="dogcolor" alt="brown Dog">			
				<label class="radio-dogs-color" for="brownDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Brown.png" alt="brown dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="goldenDog" name="dogcolor" alt="golden Dog">		
				<label class="radio-dogs-color" for="goldenDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Golden.png" alt="golden dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="greyDog" name="dogcolor" alt="grey Dog">		
				<label class="radio-dogs-color" for="greyDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Grey.png" alt="grey dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="orangeDog" name="dogcolor" alt="orange Dog">	
				<label class="radio-dogs-color" for="orangeDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Orange.png" alt="orange dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="redDog" name="dogcolor" alt="red Dog">		
				<label class="radio-dogs-color" for="redDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Red.png" alt="red dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="spottedDog" name="dogcolor" alt="spotted Dog">		
				<label class="radio-dogs-color" for="spottedDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Spotted.png" alt="spotted dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="tanDog" name="dogcolor" alt="tan Dog">		
				<label class="radio-dogs-color" for="tanDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Tan.png" alt="tan dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="whiteDog" name="dogcolor" alt="white Dog">		
				<label class="radio-dogs-color" for="whiteDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/White.png" alt="white dog" /></label></div>
			
			<!-- Only dog colors -->
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="brindleDog" name="dogcolor" alt="brindle Dog">
				<label class="radio-dogs-color" for="brindleDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Brindle.png" alt="brindle dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="merleDog" name="dogcolor" alt="merle Dog">
				<label class="radio-dogs-color" for="merleDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Merle.png" alt="merle dog" /></label></div>
			<div class="columnColor">
			<input class="radio-dogs-color" type="radio" id="tricolorDog" name="dogcolor" alt="tricolor Dog">
				<label class="radio-dogs-color" for="tricolorDog"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/dogs/Tricolor.png" alt="tricolor dog" /></label></div>
		</div>
				</div>
			
			<div id="cat-type-options" style="display:none">
			<div class="row">
			<!-- Cat Sizes -->
			<div class="column">
			<input class="radio-cats-size" type="radio" id="smallCat" name="catsize" alt="small cat">
				<label class="radio-cats-size" for="smallCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/cats/Cat-small.png" alt="small cat" /></label></div>
			<div class="column">
			<input class="radio-cats-size" type="radio" id="mediumCat" name="catsize" alt="medium cat">
				<label class="radio-cats-size" for="mediumCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/cats/Cat-medium.png" alt="medium cat" /></label></div>
			<div class="column">
			<input class="radio-cats-size" type="radio" id="largeCat" name="catsize" alt="large cat">
				<label class="radio-cats-size" for="largeCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/cats/Cat-large.png" alt="large cat" /></label></div>
			<div class="column">
			<input class="radio-cats-size" type="radio" id="xlargeCat" name="catsize" alt="xlarge cat">
				<label class="radio-cats-size" for="xlargeCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/cats/Cat-xlarge.png" alt="xlarge cat" /></label></div>
				</div>

			<!-- Common color : Cats -->
			<div id="cat-type-options" class="rowColor">
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="blackCat" name="catcolor" alt="black Cat">			
				<label class="radio-cats-color" for="blackCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Black.png" alt="black cat" /></label></div>	
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="brownCat" name="catcolor" alt="brown Cat">			
				<label class="radio-cats-color" for="brownCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Brown.png" alt="brown cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="goldenCat" name="catcolor" alt="golden Cat">		
				<label class="radio-cats-color" for="goldenCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Golden.png" alt="golden cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="greyCat" name="catcolor" alt="grey Cat">		
				<label class="radio-cats-color" for="greyCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Grey.png" alt="grey cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="orangeCat" name="catcolor" alt="orange Cat">	
				<label class="radio-cats-color" for="orangeCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Orange.png" alt="orange cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="redCat" name="catcolor" alt="red Cat">		
				<label class="radio-cats-color" for="redCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Red.png" alt="red cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="spottedCat" name="catcolor" alt="spotted Cat">		
				<label class="radio-cats-color" for="spottedCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Spotted.png" alt="spotted cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="tanCat" name="catcolor" alt="tan Cat">		
				<label class="radio-cats-color" for="tanCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/Tan.png" alt="tan cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="whiteCat" name="catcolor" alt="white Cat">		
				<label class="radio-cats-color" for="whiteCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/both/White.png" alt="white cat" /></label></div>
			
			<!-- Only cat colors -->
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="calicoCat" name="catcolor" alt="calico Cat">
				<label class="radio-cats-color" for="calicoCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/cats/Calico.png" alt="calico cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="tabbyCat" name="catcolor" alt="tabby Cat">
				<label class="radio-cats-color" for="tabbyCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/cats/Tabby.png" alt="tabby cat" /></label></div>
			<div class="columnColor">
			<input class="radio-cats-color" type="radio" id="tortoiseCat" name="catcolor" alt="tortoise Cat">
				<label class="radio-cats-color" for="tortoiseCat"><img src="<?php echo home_url()?>/wp-content/themes/mh_magazine_child/assets/img/ILPA_AnimalPics/cats/Tortoise.png" alt="tortoise cat" /></label></div>
		</div>
		</div>		
		
		<div id="other-type-options" style="display:none">
		<label class="customizer-field">
				Other Pet Type Description<textarea rows="2" type="text" wrap="soft" required></textarea><br>
		</label></div>
				
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