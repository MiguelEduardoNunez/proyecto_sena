@props(['headers', 'elements', 'columns', 'actions', 'param'])

<table {{ $attributes->merge(['class' => 'table table-head-fixed table-hover text-nowrap', 'id' => 'datatable']) }}>
    <thead>
        <tr>
            @foreach ($headers as $header)
                @if ($header == 'Acciones')
                    <th class="text-center">{{ $header }}</th>
                @else
                    <th>{{ $header }}</th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($elements as $element)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @foreach ($columns as $column)
                    <td>{{ $element->$column }}</td>
                @endforeach
                <td class="text-center">
                    <div class="row justify-content-center">
                        @foreach ($actions as $action)
                            <div class="{{ $action['responsive'] }}">
                                <a href="{{ route($action['route'], $element->$param) }}" type="button">
                                    <i class="{{ $action['icono'] }}" data-toggle="tooltip" title="{{ $action['title'] }}"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
