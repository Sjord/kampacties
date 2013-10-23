
$('.jumbotron').each(function () {
    var form = $(this).find('.add-to-action-form')
    $(this).find('.add-to-action-button').click(function () {
        form.toggle();
    });
});
