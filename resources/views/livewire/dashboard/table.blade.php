<h2>Data {{ $title }}</h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @if ($item->is_aktif)
                            @if ($item->role !== 5)
                                <a class="btn btn-success" wire:click='promote({{ $item->id }})'><i class="bi bi-person-plus"></i></a>
                            @endif
                            @if ($item->role !== 1)
                                <a class="btn btn-danger" wire:click='demote({{ $item->id }})'><i class="bi bi-person-dash"></i></a>
                            @endif
                            <a class="btn btn-danger" wire:click='deactivate({{ $item->id }})'><i class="bi bi-person-x"></i></a>
                        @else
                            <a class="btn btn-success" wire:click='activate({{ $item->id }})'><i class="bi bi-person-check"></i></a>
                            <a class="btn btn-danger" wire:click='delete({{ $item->id }})'><i class="bi bi-x-circle"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
