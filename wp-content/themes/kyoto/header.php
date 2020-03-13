<!DOCTYPE html> 
 <html> 
     <head> 
         <?php wp_head();?> 
            <meta charset="<?php bloginfo( 'charset' ); ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

     </head> 
 <body <?php body_class();?>>



<!-- <header class="sticky-top"> -->
<header>
	<div class="container-fluid">
    
    <div class="row">
        <div class="left-col col col-sm-10">
             <?php wp_nav_menu(
                array(
                'theme_location' => 'top-menu', #key taken from functions.php
                'menu_class' => '', #assigns class name for styling
                )
             );?>
        </div>

        <div class="right-col col col-sm-2">
           
        <img class="header-logo" 
                role="banner" 
                src="<?php echo get_field('header_logo')['url'];?>" >
        </div>
        
    </div>
</div>
</header>
 	