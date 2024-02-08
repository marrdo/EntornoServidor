@props(['headers','rows'])

<table class="min-w-full divide-y divide-gray-200">
    <thead class="dark:bg-sky-950">
        <x-table-row>
            @foreach($headers as $header)
                <x-table-cell>{{ $header }}</x-table-cell>
            @endforeach
        </x-table-row>
    </thead>
    <tbody>
        @foreach($rows as $row)
            <x-table-row>
                @foreach($row as $valor)
                    @if(!empty($valor))
                    <x-table-cell>{{ $valor }}</x-table-cell>    
                    @endif   
                @endforeach
            </x-table-row>
        @endforeach
    </tbody>
</table>