<dialog id="modal" class="rounded-lg shadow-lg p-6 w-96 backdrop:backdrop-blur-[2px]">
    <h3 class="text-lg font-bold mb-4">Confirmar Exclusão</h3>
    <p class="mb-6 text-gray-600">{{ $message }}</p>
    <div class="flex justify-end gap-2">
        <button id="confirmDelete" type="button" class="btn btn-icon btn-danger">
            <i class="fa fa-trash"></i> Excluir
        </button>
        <button id="cancelDelete" type="button"
            class="btn btn-info">Cancelar</button>
    </div>
</dialog>