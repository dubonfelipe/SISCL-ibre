
jQuery(document).ready(function($) {
    //add move to top featured
    var window_height = $(window).height();
    var window_height = (window_height) + (50);
    $(window).scroll(function() {
        var scroll_top = $(window).scrollTop();
        if (scroll_top > window_height) {
            $('.celestial_lite_move_to_top').show();
        }
        else {
            $('.celestial_lite_move_to_top').hide();   
        }
    });
    $('.celestial_lite_move_to_top').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
        
    });

    
	// lets add some bootstrap styling to WordPress elements
	jQuery(function($){
		$( 'table' ).addClass( 'table' );
		$( '#submit' ).addClass( 'btn btn-primary btn-small' );
		$( '#wp-calendar' ).addClass( 'table table-striped table-bordered' );
		
	});

})