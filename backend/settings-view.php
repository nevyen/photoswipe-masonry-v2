<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function show_settings_view($options) {
	Global $psm_vars;
	ob_start();
	echo Regenerate_Thumbnails::get_regeneration_form();
	?>
	<div id="photoswipe_admin">
		<div class="wrap">
			<div class="head">
				<h2>PhotoSwipe Masonry Options</h2>
				<p class="info">
					PhotoSwipe Masonry is a image gallery plugin for WordPress built using PhotoSwipe from Dmitry Semenov. <a href="http://photoswipe.com/" target="_blank">PhotoSwipe</a><br />
					Plugin by <a href="https://thriveweb.com.au/" title="Thrive Web" target="_blank">Thrive Web</a>, <a href="https://thriveweb.com.au/the-lab/" target="_blank">see our plugins</a>.
				</p>
				<a class="logo" href="https://thriveweb.com.au/" title="Thrive Web" target="_blank">
					<img src="<?= $psm_vars['plugin_url_path'] . '/thrive-logo.png' ?>" alt="Logo Thrive Web" />
				</a>
			</div>
			<form method="post" action="#" enctype="multipart/form-data" id="psm-form">
				<input type="hidden" name="show-regenerate-button" value="true" />
				<div class="block left">
					<div class="block-head">
						Sizing
					</div>
					<div class="block-content">
						<div class="form-group">
							<label for="thumbnail_width">Thumbnail Width</label>
							<p>In pixels</p>
							<input id="thumbnail_width" type="text" name="thumbnail_width" value="<?= ($options['thumbnail_width']); ?>" />
						</div>
						<div class="form-group">
							<label for="thumbnail_height">Thumbnail Height</label>
							<p>In pixels.</p>
							<input id="thumbnail_height" type="text" name="thumbnail_height" value="<?= ($options['thumbnail_height']); ?>" />
						</div>
						<div class="form-group">
							<label for="max_image_width">Max image width</label>
							<p>Width of images at full size in pixels</p>
							<input id="max_image_width" type="text" name="max_image_width" value="<?= ($options['max_image_width']); ?>" />
						</div>
						<div class="form-group">
							<label for="max_image_height">Max image height</label>
							<p>Height of images at full size in pixels</p>
							<input id="max_image_height" type="text" name="max_image_height" value="<?= ($options['max_image_height']); ?>" />
						</div>
						<div class="form-group">
							<label for="item_count">Thumbnails per page</label>
							<p>If you have more a load more than this a load more button will appear</p>
							<input id="item_count" name="item_count" type="number" value="<?= $options['item_count'] ? $options['item_count'] : 10 ?>" max="500" />
						</div>
						<div class="form-group" id="regen-thumb" <?= ((empty($_POST['regenerate-thumbnails']) && isset($_POST['show-regenerate-button'])) || (isset($_SESSION['show_regenerate_thumbnail_button']) && $_SESSION['show_regenerate_thumbnail_button'])) ? 'style="display:block"' : '' ?>>
							<label for="rt">Thumbnail size changed!</label>
							<p>We recommend you to regenerate your thumbnails when you change your image sizes.</p>
							<?php
							echo Regenerate_Thumbnails::get_start_regeneration_button();
							?>
						</div>
                        <?php if(!$options['use_hover']) : ?>
                        <div class="form-group">
                            <label for="hover_text_description">Description text</label>
                            <p>If you want to display an specific text before each description</p>
                            <input id="hover_text_description" name="hover_text_description" type="text" value="<?= ($options['hover_text_description']);?>" />
                        </div>
                            <div class="form-group">
                                <label for="hover_text_title_background">Title Background Color</label>
                                <p>Here you can chose the background color which appears at the title (default is transparent). </p>
                                <input id="hover_text_title_background" name="hover_text_title_background" type="text" value="<?= ($options['hover_text_title_background']);?>" />
                            </div>
                            <div class="form-group">
                                <label for="hover_button_text">Button Text</label>
                                <p>Put here which text should be displayed on the button. (if none no button will appear)</p>
                                <input id="hover_button_text" name="hover_button_text" type="text" value="<?= ($options['hover_button_text']);?>" />
                            </div>
                        <?php endif; ?>
					</div>
				</div>
				<div class="block right">
					<div class="block-head">
						Settings
					</div>
					<div class="block-content">
						<div class="form-group">
							<input id="white_theme" name="white_theme" type="checkbox" value="checkbox" <?= $options['white_theme'] ? "checked='checked'" : '' ?> />
							<label for="white_theme">Use white theme</label>
						</div>
						<div class="form-group">
							<input id="crop_thumbnails" name="crop_thumbnails" type="checkbox" value="checkbox" <?= $options['crop_thumbnails'] ? "checked='checked'" : '' ?> />
							<label for="crop_thumbnails">Crop thumbnails</label>
						</div>
						<div class="form-group">
							<input id="show_captions" name="show_captions" type="checkbox" value="checkbox" <?= $options['show_captions'] ? "checked='checked'" :  ''; ?> />
							<label for="show_captions">Show captions on thumbnails</label>
						</div>
						<div class="form-group">
							<input id="use_masonry" name="use_masonry" type="checkbox" value="checkbox" <?= !$options['use_masonry'] ? "checked='checked'" : '' ?> />
							<label for="use_masonry">Don't use Masonry</label>
						</div>
                        <div class="form-group">
                            <input id="use_hover" name="use_hover" type="checkbox" value="checkbox" <?= !$options['use_hover'] ? "checked='checked'" : '' ?> />
                            <label for="use_hover">Use Hovereffect</label>
                        </div>
						<div class="form-group">
							<input class="button-primary" type="submit" name="photoswipe_save" value="Save Changes" />
						</div>
					</div>
				</div>
			</form>
			<?php
			echo Regenerate_Thumbnails::regenerate_thumbnails_log();
			?>
		</div>
		<p class="made-by">
			Made with
			<svg width="12" height="12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path fill="red" d="M12 4.168C7.943-2.045 0 2.028 0 7.758c0 4.418 6.904 8.223 12 15.187 5.094-6.963 12-10.768 12-15.187 0-5.73-7.693-9.803-12-3.59" />
			</svg>
			on the <a class="logo" href="https://thriveweb.com.au/" title="Thrive Web" target="_blank">Gold Coast</a>
		</p>
	</div>
	<?php
	return ob_get_clean();
}
