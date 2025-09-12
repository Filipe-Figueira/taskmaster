@csrf
        <label for="category" class="form-label">Categoria</label>
        <select name="category_id" id="category" class="form-select">
            <option value="">Selecione...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>

        <div>
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title"
                class="form-input" value="{{ old('title', $task->title) }}">
        </div>

        <div>
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" rows="4" placeholder="Descreva sua task..."
                class="form-textarea" value="{{ old('description', $task->description) }}">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="priority" class="form-label">Prioridade</label>
                <select name="priority" id="priority"
                    class="form-select">
                    <option value="">Selecione...</option>
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status"
                    class="form-select">
                    <div>
                        <option value="">Selecione...</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Concluída">Concluída</option>
                        <option value="Atrasada">Atrasada</option>
                    </div>
                </select>
            </div>
        </div>

        <div>
            <label for="due_date" class="form-label">Prazo para finalizar</label>
            <input type="date" name="due_date" id="due_date"
                class="form-date" value="{{ old('due_date')}}">
        </div>