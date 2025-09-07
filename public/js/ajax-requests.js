$(document).ready(function () {
    let formToSubmit = null;
    let rowToDelete = null;
    const modal = $('#modal')[0];

    //Abre o modal quando clicar em excluir
    $('.delete-form').on('submit', function (e) {
        e.preventDefault();
        formToSubmit = $(this);
        rowToDelete = formToSubmit.closest('tr');
        modal.showModal();
    });

    //Cancelar exclusão
    $('#cancelDelete').on('click', function () {
        modal.close();
        formToSubmit = rowToDelete = null;
    });

    $('#confirmDelete').on('click', function () {
        if(formToSubmit) {
            $.post(formToSubmit.attr('action'), formToSubmit.serialize()).done(function (response) {
                modal.close();
                rowToDelete.remove();
                console.log(response);
            })
        }
    });
 })