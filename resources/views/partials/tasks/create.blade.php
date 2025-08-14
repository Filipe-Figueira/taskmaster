<section>
    <form action="">
        @csrf
        <input type="hidden" name="user_id" value="">
        <input type="hidden" name="category_id" value="">
        <label for="title">Título</label>
        <input type="text" name="title">

        <label for="description">Descrição</label>
        <input type="text" name="description">

        <label for="priority">Prioridade</label>
        <select name="priority" name="priority">
            <option value="100">Baixa</option>
            <option value="200">Média</option>
            <option value="300">Alta</option>
        </select>
        <label for="status">Status</label>
        <select name="status">
            <option value="100">Pendente</option>
            <option value="200">Concluída</option>
            <option value="300">Atrasada</option>
            <option value="400">Cancelada</option>
        </select>

        <label for="due_date">Prazo p/ finalizar</label>
        <input type="date" name="due_date">
    </form>
</section>