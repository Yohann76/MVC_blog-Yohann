/* Ajouter un chapitre */

$( "#submitAddArticle" ).click(function() {

    Swal.fire(
        'Article ajouté',
        'Continue ainsi! ',
        'success'
    )

});



// pour modifier un article sur removeArticle.php
$( "#submitMooveArt" ).click(function() {

    Swal.fire(
        'Modification réussi',
        'Continue ainsi!',
        'success'
    )

});

// pour supprimer un article

$( "#deleteArt" ).click(function() {

    Swal.fire(
        'Suppression réussi',
        'Continue ainsi!',
        'success'
    )

});

// connecté avec succés

/*
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 7000
    });

    Toast.fire({
        type: 'success',
        title: 'connecté avec succés'
    })

 */



