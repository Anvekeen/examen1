$(document).ready(function() {
    console.log('1: jquery ready');

    $('.productmodif').on('click', function() {
        var id = $(this).attr("productinfo");
        $.post('views/templates/update.php', { productid:id })
            .done(function (objet) {
                var product = JSON.parse(objet);
                $('#productType').val('productupdate');
                $('#productid').val(product.id);
                $('#name').val(product.name);
                $('#price').val(product.price);
                $('#vat').val(product.vat);
                $('#quantity').val(product.quantity);
            });
    });

    $('.usermodif').on('click', function() {
        var id = $(this).attr("userinfo");
        //console.log(id); //pour vérifier dans la console
        $.post('update.php', { userid:id })
            .done(function (objet) {
                var user = JSON.parse(objet);
                $('#userType').val('userupdate');
                $('#userid').val(user.id);
                $('#username').val(user.username);
                $('#password').val(user.password);
            });
    });
});

/*$('#product-search-form').on('submit', function(event) {
    event.preventDefault();
    $.get('search_product.php', {idprod: $('#idsearchProduct').val()}
    )
        .done(function(data) {
            $('#searchProduct').html(data);
        });
});

$('#user-search-form').on('submit', function(event) {
    event.preventDefault();
    $.get('search_user.php', {iduser: $('#idsearchUser').val()}
    )
        .done(function(data) {
            $('#searchUser').html(data);
        });
});*/


//note : peut-être ajouter fonction de vérif longueur des champs form



/*fais un popup à l'écran (les déconseille)
alert('coucou');

log dans console
console.log('coucou console');

JQUERY = Librairie = une boîte à outils

<button type="button" id="btn">CLICK ME</button>
    $('#btn').on('click', function() {
        $('#product-list td').css('font-weight', 600);
        //les td dans balise productlist, sinon si product-list, td = les deux
       $('input[type="submit"]').val('A');
       $(this).text('DONT');
    });

    /*$('.delete-btn').on('click', function() {
        $(this).parents('tr').first().detach();
    });
*/