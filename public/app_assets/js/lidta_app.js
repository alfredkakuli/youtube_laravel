// =================TOGGLE LIGHT DARK THEME=============
let themeMode = localStorage.getItem('themeMode');

if (themeMode==='light') {
    $("body").removeClass('dark_mode');
    $(".dark_mode_class").removeClass('display_none');
    $(".light_mode_class").addClass('display_none');
} else {
    $("body").addClass('dark_mode');
    $(".dark_mode_class").addClass('display_none');
    $(".light_mode_class").removeClass('display_none');
}

$(".change_theme").on('click', function () {
    $(".change_theme").toggleClass('display_none');
    toggleDarkLightTheme();
});


function toggleDarkLightTheme() {
    let checkTheme = $("body").hasClass('dark_mode');
    if (checkTheme) {
        $("body").removeClass('dark_mode');
        localStorage.setItem('themeMode','light');
    } else {
      $("body").addClass('dark_mode');
        localStorage.setItem('themeMode','dark');
    }

}

$('body').on('click', '.selectall', function (e) {
    let isChecked = $(this).is(':checked');
    if (isChecked) {
        $(".check_boxes").prop('checked', true);
    } else {
        $(".check_boxes").prop('checked', false)
    }
});

    $(".minimized, .expanded").on("click", function () {
        let status = $(this).data('sidebar_status');
        if (status === 'active') {
            $(".hide_on_minimized").show();
        } else if (status === 'inactive') {
            $(".hide_on_minimized").hide();
        }
        $(".toggle_class").toggle();
        $(this).hide();
            $(".sidebar_section, .main_page_section, .nav_bar_section,.footer_section, .side_bar_title").removeClass('active');
        $(".sidebar_section, .main_page_section, .nav_bar_section,.footer_section, .side_bar_title").removeClass('inactive');
        $(".sidebar_section, .main_page_section, .nav_bar_section,.footer_section, .side_bar_title").addClass(status);
    });

    $(".item").on("click", function (e) {
        e.preventDefault();
        $(".item").removeClass('active');
        $(this).addClass('active');
    });

    $(".nav_menu").on('mouseenter click', function () {
        $(".navbar_sub_menu").addClass('d-none')
        $(this).find('.navbar_sub_menu').removeClass('d-none');
    });

    $(".navbar_sub_menu").on('mouseleave', function () {
        $(this).addClass('d-none')
    });
