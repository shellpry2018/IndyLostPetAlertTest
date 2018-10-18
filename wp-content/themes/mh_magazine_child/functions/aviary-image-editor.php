<?php
function load_image_editor_js()
{
    // echo '<script src="/wp-content/plugins/buooy-aviary-editor/v0.6.9/admin/assets/js/script.min.js"></script>';
?>
<style>
.sending-back-to-post
{
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 4000;
    position: absolute;
    top: 0;
    margin-left: -20px;
}
.sending-back-to-post .information-modal
{
    margin:auto;
    text-align: center;
    background: white;
    padding: 40px;
    box-shadow: 3px 3px 2px rgba(0,0,0,0.5);
    max-width: 400px;
    margin-top: 20%;
    font-size: 16px;
}
#gform_fields
{
    width: 100% !important;
}
.post_content_template_setting textarea
{
    width: 100%;
    font-family: monospace;
}
.gravity-forms-post-body
{
    font-weight: bold;
    text-align: center;
    font-size: 24px;
}
.gravity-forms-post-body iframe
{
    width: 100%;
    height:600px;
}
</style>
<script>
jQuery(document).ready(function($){

    $('body').on('click', '.thumbnail', function(el){
        replaceEditLink();
    });

    $('a.edit-attachment').hover(function(){
        replaceEditLink();
    });

    $('#set-post-thumbnail').on('click', function(){
        console.log('you did it');
    });

    function getImageId(){
        var edit_link_url = $('.attachment-info .details a.edit-attachment').attr('href');
        var image_id_beginning = edit_link_url.split('post=');
        var image_id_end = image_id_beginning[1].split('&');
        return image_id_end[0];        
    }

    function replaceEditLink(){        
        var edit_link = $('.attachment-info .details a.edit-attachment');
        var attachment = $('.attachment-info');
        attachment.find('.wharrf-edit-image-from-post').remove();
        var image_url = attachment.find('.thumbnail-image img').attr('src');

        var image_id = getImageId();

        var image_name = $('label[data-setting="title"] input').val();

        var post_id = $('input[name="post_ID"]').val();

        var $editButton = '<button class="btn-edit-image wharrf-edit-image-from-post mini ui primary button" style="margin:10px 0; display:inherit" image_id="' + image_id + '" image_name="' + image_name + '" image_url="' + image_url + '" post_id="' + post_id + '">Image Editor</button>';
        $('.attachment-info .details a.edit-attachment').hide().after($editButton);
    }

    $('body').on('click', '.wharrf-edit-image-from-post', function(el){
        var image_id = $(this).attr('image_id');
        if(image_id.length == 0){
            console.log('No image ID');
            image_id = getImageId();
            $(this).attr('image_id', image_id);
        }
        var image_name = $(this).attr('image_name');    
        var image_url = $(this).attr('image_url');
        var post_id = $(this).attr('post_id');
        if(post_id.length == 0){
            console.log('No post ID');
            post_id = $('input[name="post_ID"]').val();
            $(this).attr('post_id', post_id);
        }
        window.location.replace('/wp-admin/upload.php?image_id=' + image_id + '&image_name=' + image_name + '&image_url=' + image_url + '&post_id=' + post_id);
    });

});
</script>

    <script type="text/html" id="tmpl-attachment-details">
        <h2>
            <?php _e( 'Attachment Details' ); ?>
            <span class="settings-save-status">
                <span class="spinner"></span>
                <span class="saved"><?php esc_html_e('Saved.'); ?></span>
            </span>
        </h2>
        <div class="attachment-info">
            <div class="thumbnail thumbnail-{{ data.type }}">
                <# if ( data.uploading ) { #>
                    <div class="media-progress-bar"><div></div></div>
                <# } else if ( 'image' === data.type && data.sizes ) { #>
                    <img src="{{ data.size.url }}" draggable="false" alt="" />
                <# } else { #>
                    <img src="{{ data.icon }}" class="icon" draggable="false" alt="" />
                <# } #>
            </div>
            <div class="details">
                <div class="filename">{{ data.filename }}</div>
                <div class="uploaded">{{ data.dateFormatted }}</div>

                <div class="file-size">{{ data.filesizeHumanReadable }}</div>
                <# if ( 'image' === data.type && ! data.uploading ) { #>
                    <# if ( data.width && data.height ) { #>
                        <div class="dimensions">{{ data.width }} &times; {{ data.height }}</div>
                    <# } #>

                    <# if ( data.can.save && data.sizes ) { #>
                        <a class="edit-attachment" href="{{ data.editLink }}&amp;image-editor" style="display:none" target="_blank"><?php _e( 'Edit Image' ); ?></a>
                        <button class="btn-edit-image wharrf-edit-image-from-post mini ui primary button" style="margin:10px 0; display:inherit" image_id="" image_name="{{ data.title }}" image_url="{{ data.size.url }}" post_id="">Image Editor</button>
                    <# } #>
                <# } #>

                <# if ( data.fileLength ) { #>
                    <div class="file-length"><?php _e( 'Length:' ); ?> {{ data.fileLength }}</div>
                <# } #>

                <# if ( ! data.uploading && data.can.remove ) { #>
                    <?php if ( MEDIA_TRASH ): ?>
                    <# if ( 'trash' === data.status ) { #>
                        <button type="button" class="button-link untrash-attachment"><?php _e( 'Untrash' ); ?></button>
                    <# } else { #>
                        <button type="button" class="button-link trash-attachment"><?php _ex( 'Trash', 'verb' ); ?></button>
                    <# } #>
                    <?php else: ?>
                        <button type="button" class="button-link delete-attachment"><?php _e( 'Delete Permanently' ); ?></button>
                    <?php endif; ?>
                <# } #>

                <div class="compat-meta">
                    <# if ( data.compat && data.compat.meta ) { #>
                        {{{ data.compat.meta }}}
                    <# } #>
                </div>
            </div>
        </div>

        <label class="setting" data-setting="url">
            <span class="name"><?php _e('URL'); ?></span>
            <input type="text" value="{{ data.url }}" readonly />
        </label>
        <# var maybeReadOnly = data.can.save || data.allowLocalEdits ? '' : 'readonly'; #>
        <?php if ( post_type_supports( 'attachment', 'title' ) ) : ?>
        <label class="setting" data-setting="title">
            <span class="name"><?php _e('Title'); ?></span>
            <input type="text" value="{{ data.title }}" {{ maybeReadOnly }} />
        </label>
        <?php endif; ?>
        <# if ( 'audio' === data.type ) { #>
        <?php foreach ( array(
            'artist' => __( 'Artist' ),
            'album' => __( 'Album' ),
        ) as $key => $label ) : ?>
        <label class="setting" data-setting="<?php echo esc_attr( $key ) ?>">
            <span class="name"><?php echo $label ?></span>
            <input type="text" value="{{ data.<?php echo $key ?> || data.meta.<?php echo $key ?> || '' }}" />
        </label>
        <?php endforeach; ?>
        <# } #>
        <label class="setting" data-setting="caption">
            <span class="name"><?php _e('Caption'); ?></span>
            <textarea {{ maybeReadOnly }}>{{ data.caption }}</textarea>
        </label>
        <# if ( 'image' === data.type ) { #>
            <label class="setting" data-setting="alt">
                <span class="name"><?php _e('Alt Text'); ?></span>
                <input type="text" value="{{ data.alt }}" {{ maybeReadOnly }} />
            </label>
        <# } #>
        <label class="setting" data-setting="description">
            <span class="name"><?php _e('Description'); ?></span>
            <textarea {{ maybeReadOnly }}>{{ data.description }}</textarea>
        </label>
    </script>

<?php
}
add_action('in_admin_footer', 'load_image_editor_js');

?>