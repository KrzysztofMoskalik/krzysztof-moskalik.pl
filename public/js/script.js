jQuery(function($, undefined) {
    $('#terminal').terminal(function(command, term) {
        term.pause();
        return $.post('/exec', {command:command}).then(function (response) {
            term.echo(response).resume();
            $('a.internal').unbind();
            $('a.internal').click(function (e, a) {
                e.preventDefault();
                $('#terminal').terminal().exec(e.target.innerText);
            });
        });
    }, {
        greetings: false,
        prompt: '~ root# '
    });
    $('#terminal').terminal().exec('help');
});