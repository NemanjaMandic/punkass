<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="form-container">
    <label>
        <span class="icon"><i class="fa fa-search"></i></span>
        <input type="search" class="search-field" id="search"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    </div>
   
</form>