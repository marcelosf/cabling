$(document).ready(function() {

    // Collapsible component
    $('.collapsible').collapsible();

    // Dropdown
    $('.dropdown-trigger').dropdown({
        coverTrigger: false,
    });

    // Select
    $('select').formSelect();
});