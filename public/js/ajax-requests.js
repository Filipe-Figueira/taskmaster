const atraso = 1600
$(document).ready(function () {
    let formToSubmit = null;
    let rowToDelete = null;
    let redirect = null;
    const modal = $('#modal')[0];

    //Abre o modal quando clicar em excluir
    $('.delete-form').on('submit', function (e) {
        e.preventDefault();
        formToSubmit = $(this);
        rowToDelete = formToSubmit.closest('tr');
        modal.showModal();
    });
    $('#delete-form').on('submit', function (e) {
        e.preventDefault();
        redirect = true;
        formToSubmit = $(this);
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
                if(redirect) {
                    window.location.href = response.redirectRoute;
                }else {
                    rowToDelete.remove();
                }

                modal.close();

                Swal.fire({
                    title: 'Sucesso',
                    text: response.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: atraso,
                });
            }).fail(function (response) {
                modal.close()

                Swal.fire({
                    title: "Erro",
                    text: response.statusText,
                    icon: "error"
                });
            });
        }
    });
 })