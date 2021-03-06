
<div id="cookieDirective" style="display:none;"></div>
<a accesskey="s" href="#skipnav" class="skip" title="Skip Navigation">Skip Navigation</a>

<div id="headerwrapper">
    <div id="header">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img
                src="<?php echo \Roots\Sage\Assets\asset_path('images/logo-purple.png'); ?>"
                alt="<?php bloginfo('name'); ?>"/></a>
    </div><!-- end header -->
</div><!-- end mainheader -->

<!-- Breadcrumb -->
<div id="breadcrumbwrapper">
    <div id="breadcrumb">
        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <?php
            if (function_exists('bcn_display') && !is_front_page()) {
                bcn_display();
            }
            ?>
        </div>
    </div><!-- end breadcrumb -->

</div><!-- end breadcrumbwrapper -->
