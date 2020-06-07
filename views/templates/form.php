<div class="container">
    <div class="row">
        <div class="col border border-secondary text-center">

    <h3> Jeux Vidéos</h3>

    <form action="index.php" method="get" id="product-search-form">
        <div class="form-group">
            <h4><label for="id-search">Effectuer une recherche : </label></h4>
            <input class="form-control" type="number" min="0" name="idprod" id="idsearchProduct" required>
        </div>
        <input type="submit" value="Rechercher">
    </form>

    <h4>Ajouter ou modifier un produit :</h4>

    <form action="index.php" method="post">
        <input type="hidden" name="type" id="productType" value="productcreate">
        <input type="hidden" name="productid" id="productid">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input class="form-control" type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Prix (sans TVA) :</label>
            <input class="form-control" type="number" id="price" name="price" min="0" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="vat">TVA (%) :</label>
            <input class="form-control" type="number" id="vat" name="vat" min="0" max="100" step="0" required>
        </div>
        <div class="form-group">
            <label for="quantity"> Quantité :</label>
            <input class="form-control" type="number" id="quantity" name="quantity" min="0" required>
        </div>
        <input type="submit">
    </form>

    <section id="searchProduct">
    </section>
