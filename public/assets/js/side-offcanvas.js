(function ($) {
    "use strict"; // Start of use strict

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    // const sidebarToggle = document.body.querySelector('#sidebarToggle');
    // if (sidebarToggle) {
    //     // Uncomment Below to persist sidebar toggle between refreshes
    //     if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //         document.body.classList.toggle('sb-sidenav-toggled');
    //     }
    //     sidebarToggle.addEventListener('click', event => {
    //         event.preventDefault();
    //         document.body.classList.toggle('sb-sidenav-toggled');
    //         localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    //     });
    // }

    $(".sb-sidenav-menu a").click(function () {
        $("body").removeClass('sb-sidenav-toggled');
    });

    $("#sidebar-overlay").click(function () {
        $("body").removeClass('sb-sidenav-toggled');
    });

    $("#sidebarToggle").click(function () {
        $("body").toggleClass('sb-sidenav-toggled');
    });

});


})(jQuery); // End of use strict



$('.sb-sidenav .sb-sidenav-menu .nav .nav-link').click(function(){
  $(this).parents(".has_dropdown").toggleClass('active-drop');
}); 



// nav-active
jQuery(document).ready(function($){
// Get current path and find target link
var path = window.location.pathname.split("/").pop();
// Account for home page with empty path
if ( path == '' ) {
  path = 'index.html';
}
var target = $('.sb-sidenav .sb-sidenav-menu > .nav > .nav-link[href="'+path+'"]');
var subtarget = $('.sb-sidenav .sb-sidenav-menu .sub_menu > nav > a[href="'+path+'"]');
var nesttarget = $('.sb-sidenav .sb-sidenav-menu .nav.nested .nav-link[href="'+path+'"]');


$('.sb-sidenav .sb-sidenav-menu .nav.nested .nav-link').click(function(){
  $(this).parents(".has_dropdown").toggleClass('active-drop-new');
}); 


// Add active class to target link
target.addClass('active');
subtarget.addClass('active_subnav');
nesttarget.addClass('active_subnav');
$('.has_dropdown').find('.active_subnav').parents('.has_dropdown').addClass('active-drop');
});