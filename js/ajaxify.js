/**
 * Based on example code by Devin Price in this tutorial: http://wptheming.com/2011/12/ajax-themes/
 */


jQuery(document).ready(function($) {
    // Establish Variables
    var
        History = window.History, // Note: Using a capital H instead of a lower h
        State = History.getState(),
        $log = $('#log');
    // If the link goes to somewhere else within the same domain, trigger the pushstate
    $('a').on('click', function(e) {
        e.preventDefault();
        var path = $(this).attr('href');
        var title = $(this).text();
        History.pushState('ajax',title,path);
    });
    // Bind to state change
    // When the statechange happens, load the appropriate url via ajax
    History.Adapter.bind(window,'statechange',function() { // Note: Using statechange instead of popstate
        load_site_ajax();
    });
    // Load Ajax
    function load_site_ajax() {
        State = History.getState(); // Note: Using History.getState() instead of event.state
        // History.log('statechange:', State.data, State.title, State.url);
        //console.log(event);
        $('#content').fadeTo(200,.3);
        $("#main").load(State.url + ' #primary, #secondary', function(data) {
            /* After the content loads you can make additional callbacks*/
            $('#content').fadeTo(200,1);
            // Updates the menu
            var request = $(data);
            $('#access').replaceWith($('#access', request));
        });
    }
});