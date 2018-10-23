function sideMenu() {
    $('.dashboard-content li').on('click', function () {
        var sectionId = $(this).data('dashboard-content');
        $('.section.selectedOption').removeClass('selectedOption');
        $(sectionId).addClass('selectedOption');
        $('.dashboard-content li.bold').removeClass('bold');
        $(this).addClass('bold');
    })
}
sideMenu()