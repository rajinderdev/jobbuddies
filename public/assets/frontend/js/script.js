// heading writing
const textMessages = ["Your Hiring", "Your Hiring"]; // Add your desired messages
const textElement = document.getElementById("typed-text");

let messageIndex = 0;
let charIndex = 0;
const typingSpeed = 140; // Adjust the typing speed (lower value for faster typing)

function type() {
    if (charIndex < textMessages[messageIndex].length) {
        textElement.textContent += textMessages[messageIndex].charAt(charIndex);
        charIndex++;
        setTimeout(type, typingSpeed);
    } else {
        setTimeout(erase, 1000); // Wait for 1 second before erasing
    }
}

function erase() {
    if (charIndex > 0) {
        const currentText = textElement.textContent;
        textElement.textContent = currentText.substring(0, charIndex - 2);
        charIndex--;
        setTimeout(erase, typingSpeed / 1); // Adjust the erasing speed
    } else {
        messageIndex = (messageIndex + 1) % textMessages.length;
        setTimeout(type, 500); // Wait for 0.5 seconds before typing the next message
    }
}

// Call the typing animation function when the page loads
window.addEventListener("load", () => {
    type();
});





// Select all sections
const slideSections = document.querySelectorAll('section');
const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.2, // Adjust this threshold as needed
};

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const section = entry.target;
        if (entry.isIntersecting) {
            section.style.opacity = 1;
            section.style.transform = 'translateY(0)';
        } else {
            section.style.opacity = 0;
            section.style.transform = 'translateY(0px)';
        }
    });
}, options);

slideSections.forEach(section => {
    observer.observe(section);
});


// step form

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({ 'left': left, 'opacity': opacity });
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({ 'left': left });
            previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function () {
    return false;
})
// end step form



// modal
// Make sure only one backdrop is rendered 
$(document).on('show.bs.modal', '.modal', function () {
    if ($(".modal-backdrop").length > 1) {
        $(".modal-backdrop").not(':first').remove();
    }
});
// Remove all backdrop on close
$(document).on('hide.bs.modal', '.modal', function () {
    if ($(".modal-backdrop").length > 1) {
        $(".modal-backdrop").remove();
    }
});

$(function () {
    $('.feature_wrap').click(function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
});
$(function () {
    // $('.search_pop, .view_all').click(function () {
    //     $(".sarch_practice_model").show();
    // });
    $('.close_btn').click(function () {
        $(".sarch_practice_model").hide();
    });
});

$(function () {
    $('.request_now').click(function () {
        $(".sidebar_model").show();
    });
    $('.close_model').click(function () {
        $(".sidebar_model").hide();
    });
});