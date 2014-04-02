jQuery(document).ready(function($) {
    //init foundation
    $(document).foundation();
    
    var adminBar = '#wpadminbar';
    var tabBar = '.tab-bar';
    var adminBarHeight = $( adminBar ).height();
    var tabBarHeight = $( tabBar).height();
    var main = '.site-content';
    //push tabBar down by admin bar height or set its height to zero
    if ( ($( adminBar ).length > 0) ) {
        $( tabBar ).css('top', adminBarHeight + 'px' );
        var mainPush = adminBarHeight + tabBarHeight;
        $( main).css( 'padding-top', mainPush + 'px' );
    }
    else {
        $( tabBar ).css('top', '0px' );
        $( main).css( 'padding-top', tabBarHeight + 'px' );
    }

});