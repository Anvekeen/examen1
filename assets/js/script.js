$(document).ready(function() {
    console.log('1: jquery ready');

    $('#ShowSubForm').on('click', function() {
        //Voulait avoir "$(#subscription).load('new_user_form.php');
        //mais impossible à faire marcher.. probablement car repasse par le routeur,
        // d'où le choix d'utiliser ça à mon avantage et faire une requete get
        $.get('index', {form: 'show'}
        )
            .done(function(data) {
                $('#subscription').html(data);
            });
    });

});




/* pas réussi à le faire marcher >_<
   note : marchait pas pendant 100 ans...
   car $('') contenait l'id du bouton submit et pas l'id du form !
$('#LoginForm').on('submit', function(e) {
    e.preventDefault();
    console.log($('#LoginForm').serialize());
    $.post('portal', $('#LoginForm').serialize()
    )
        .done(function(data) {
            $('#loginerror').html(data);
        });
});*/