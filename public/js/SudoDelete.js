document.addEventListener('click', function (event) {
    if (event.target.classList.contains('delete-user')) {
        event.preventDefault();
        const userId = event.target.getAttribute('data-user-id');
        const delete_url = `/admin/delete/${userId}`;

        if (userId && !isNaN(userId)) {
            Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?',
                text: 'Cette action est irréversible !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(delete_url, {
                        method: 'GET'
                    })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire('Succès', data.message, 'success');
                            // On supprime la ligne du tableau
                            event.target.closest('tr').remove();
                        })
                        .catch(error => {
                            Swal.fire('Erreur', 'Une erreur est survenue.', 'error');
                        });
                }
            });
        } else {
            console.error('L\'ID de l\'utilisateur n\'est pas valide.');
        }
    }
});


document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('update-profile').addEventListener('click', function(e) {
        e.preventDefault();

        const passwordField = document.getElementById('password');
        const passwordConfirmationField = document.getElementById('password_confirmation');

        if (passwordField.value !== passwordConfirmationField.value) {
            Swal.fire({
                title: 'Erreur',
                text: 'Les mots de passe ne correspondent pas.',
                icon: 'error'
            });
        } else {
            Swal.fire({
                title: 'Confirmez la mise à jour',
                text: 'Êtes-vous sûr de vouloir mettre à jour votre profil?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, mettre à jour',
                cancelButtonText: 'Annuler',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-form').submit();
                }
            });
        }
    });
});

var root = document.documentElement;
var eyef = document.getElementById('eyef');
var cx = document.getElementById("eyef").getAttribute("cx");
var cy = document.getElementById("eyef").getAttribute("cy");

document.addEventListener("mousemove", evt => {
    let x = evt.clientX / innerWidth;
    let y = evt.clientY / innerHeight;

    root.style.setProperty("--mouse-x", x);
    root.style.setProperty("--mouse-y", y);

    cx = 115 + 30 * x;
    cy = 50 + 30 * y;
    eyef.setAttribute("cx", cx);
    eyef.setAttribute("cy", cy);

});

document.addEventListener("touchmove", touchHandler => {
    let x = touchHandler.touches[0].clientX / innerWidth;
    let y = touchHandler.touches[0].clientY / innerHeight;

    root.style.setProperty("--mouse-x", x);
    root.style.setProperty("--mouse-y", y);
});


