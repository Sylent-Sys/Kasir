<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3 border-bottom">
    <h1>{{ $title }}</h1>
    @if ($options['laporan']??'')
        <div class="btn-toolbar">
            <div class="me-2">
                <select wire:model='mode' class="form-select form-select-sm">
                    <option value="semua">Semua</option>
                    <option value="bulanan">Bulanan</option>
                    <option value="tahunan">Tahunan</option>
                    <option value="favorit">Favorit</option>
                </select>
            </div>
            @if ($mode == 'bulanan')
                <div class="me-2">
                    <select wire:model='bulan' class="form-select form-select-sm">
                        @foreach ($array_bulan as $item)
                            <option value="{{ $loop->index + 1 }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if ($mode == 'tahunan' || $mode == 'bulanan')
                <div class="me-2">
                    <select wire:model='tahun' class="form-select form-select-sm">
                        @foreach ($array_tahun as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    @endif
</div>
