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
            @php
                $selectRoleUser = [
                    \App\Helpers\RoleUser::PENGGUNA,
                    \App\Helpers\RoleUser::WAITER,
                    \App\Helpers\RoleUser::KASIR,
                    \App\Helpers\RoleUser::OWNER,
                    \App\Helpers\RoleUser::ADMIN
                ];
            @endphp
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <div class="d-flex align-content-center justify-content-between">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" wire:click='setActive({{ $item->id }})' @checked($item->is_aktif)>
                                <label class="form-check-label">{{ $item->is_aktif ? 'Aktif' : 'Tidak Aktif' }}</label>
                            </div>
                            <div>
                                <select onchange="setRoleUser(this)" class="form-select form-select-sm" data-id='{{ $item->id }}'>
                                    @foreach ($selectRoleUser as $itemSelectRoleUser)
                                        <option value="{{ $itemSelectRoleUser }}" @selected($itemSelectRoleUser == $item->role)>{{ \App\Helpers\RoleUser::getLabel($itemSelectRoleUser) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center fw-bold">Data Tidak Ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
