<h1>Theme Admin Option</h1>
<?php settings_errors(); ?>
<?php
$profile_picture = esc_attr(get_option('profile_picture'));
$firstname = esc_attr(get_option('first_name'));
$lastname = esc_attr(get_option('last_name'));
$fullname = $firstname.' '.$lastname;
$description = esc_attr__( get_option('description'));
?>
<form action="options.php" method="post" class="sbbc-general-form">
    <?php settings_fields('sbbc-settings-group'); ?>
    <?php do_settings_sections('sbbc_theme_options');?>
    <?php submit_button() ?>
</form>
<div class="sbbc-sidebar-preview">
    <div class="sbbc-sidebar">
        <div class="image-container">
            <div class="profile-picture" id="profile-picture-preview" style="background-image: url(<?php echo $profile_picture; ?>)">
                <img src="" alt="">
            </div>
        </div>
        <h1 class="sbbc-full-name"><?php echo $fullname; ?></h1>
        <h2 class="sbbc-description"><?php echo $description; ?></h2>
        <div class="icons-wrapper">

        </div>
    </div>
</div>