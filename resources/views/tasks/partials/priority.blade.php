<span class="badge
@switch($task->priority)
    @case('Baixa')
      badge-success
        @break
    @case('Média')
    badge-warning
        @break
    @case('Alta')
  badge-danger
        @break
    @default
    badge-primary
@endswitch
">{{ $task->priority }} </span>
