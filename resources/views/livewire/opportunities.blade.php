<div>
    <input wire:model.live="search" type="text" placeholder="Search...">

    <!-- Items per page selection -->
    <div>
        <label for="perPage">Items per page:</label>
        <select wire:model.change="perPage" id="perPage">
            @foreach($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <table>
        <thead>
            <tr>
                <th>
                    <button wire:click="sort('id')">ID</button>
                </th>
                <th>
                    <button wire:click="sort('name')">Name</button>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $items->links() }}
</div>
