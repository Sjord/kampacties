
$('.jumbotron').each(function () {
    var form = $(this).find('.add-to-action-form');
    $(this).find('.add-to-action-button').click(function () {
        form.toggle();
    });
});

function valid_name(name) {
    if (name.length < 3 || name.length > 20) {
        return false;
    }
    var re = /[,()"]/i;
    return !re.exec(name);
}

$("button[name='status']").click(function () {
    var form = $(this).closest('form');
    var input = form.find("input[name='name']");
    var name = input.val();
    if (valid_name(name)) {
        return true;
    } else {
        input.popover({
            content: "Vul hier gewoon je voornaam in.",
            trigger: 'manual'
        });
        input.popover('show');
        return false;
    }
});
