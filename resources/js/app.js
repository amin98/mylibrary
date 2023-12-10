require('./bootstrap');

const btn = document.querySelector(".mobile-menu-button");
const sidebar = document.querySelector(".sidebar");

// add our event listener for the click
var $tableView = $('#table-view');
var $imageView = $('#image-view');
var $imageIcon = $('#image-icon');
var $tableIcon = $('#table-icon');

var $switchButton = $('#switch-button');

$(document).ready(function (){
    $switchButton.on('click', function () {
        if ($tableView.hasClass('md:flex lg:flex xl:flex 2xl:flex') &&
            $imageView.hasClass('hidden') && $tableIcon.hasClass('hidden')) {
            $tableIcon.removeClass('hidden');
            $imageIcon.addClass('hidden');
            $tableView.removeClass('md:flex lg:flex xl:flex 2xl:flex').addClass('hidden');
            $imageView.removeClass('hidden').addClass('grid xs:grid-cols-3 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6');
        } else {
            $tableIcon.addClass('hidden');
            $imageIcon.removeClass('hidden');
            $tableView.addClass('md:flex lg:flex xl:flex 2xl:flex').removeClass('hidden');
            $imageView.addClass('hidden').removeClass('grid xs:grid-cols-3 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6');
        }
    });
});

btn.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
});


$.ajax({
    url: 'wishlist.list.destroy/{id}',
    method: 'get',
    success: function () {
        console.log("cookie deleted");
    }
});

window.onorientationchange = function() {

    let htmlElement =  $("html");
    let bodyElement = $("body");

    if($(window).innerWidth() < $(window).innerHeight()) {//landscape to portrait
        htmlElement.css("overflow-x","hidden");
        bodyElement.css("overflow-x", "hidden");
    } else {//portrait to landscape
        htmlElement.css("overflow","auto");
        bodyElement.css("overflow", "auto");
        //below 2 lines makes the UI not shrink in portrait mode
        htmlElement.css("overflow-x","auto");
        bodyElement.css("overflow-x", "auto");
    }

}
