// user profile click

$('.header .user, .header .user_profile').click(function(e){
    $(this).find(".user_profile").fadeToggle(100);
    e.stopPropagation();
});
$(document).click(function(){
    $(".header .user_profile").fadeOut(100);
});

// sticky header
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 20) {
        $(".header").addClass("stickyHeader");
    } else {
        $(".header").removeClass("stickyHeader");
    }
});

// navigation
$('.header .bars').click(function(){
    $('body').toggleClass('sidebarActive');
})


// datatable
$('.displayTable').DataTable({
    responsive: true,
    language: {
        search: "",
        searchPlaceholder: "Search"
    }
});
$('button').on('shown.bs.tab', function (e) {
    $($.fn.dataTable.tables(true)).DataTable()
       .columns.adjust()
       .responsive.recalc();
});    



