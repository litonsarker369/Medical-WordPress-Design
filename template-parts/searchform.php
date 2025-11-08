

<form  action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-bar-form">
    <div class="inner-form-box">
        <div class="search-input-line">
            <input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search on page', 'medyc' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>"/>
            <span class="material-icons">
                <?php esc_html_e('search', 'medyc');  ?>
            </span>
        </div>
        <input type="submit" id="submit_search" class="medyc-button search-submit" value="<?php esc_attr_e( 'Search', 'medyc' ); ?>" />
    </div>
</form>