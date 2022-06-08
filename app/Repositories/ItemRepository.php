<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ItemRepository
 * @package App\Repositories
 */
class ItemRepository {

    /**
     * @param int|null $id
     * @return Item|null
     */
    public function findById(
        ?int $id
    ) : ?Item
    {
        return Item::find($id);
    }

    /**
     * @return Collection|null
     */
    public function getAll() : ?Collection
    {
        return Item::query()
            ->get();
    }

    /**
     * @param int $paginateBy
     * @param int|null $page
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(
        int $paginateBy = 30,
        int $page = null
    ) : LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $itemsPaginated */
        $itemsPaginated = Item::query()
            ->orderBy('created_at', 'desc')
            ->paginate($paginateBy, ['*'], 'page', $page);

        return $itemsPaginated;
    }

    /**
     * @param string $name
     * @param null|string $description
     * @param int|null $price
     * @return Item|null
     */
    public function create(
        string $name,
        ?string $description,
        ?int $price
    ) : ?Item
    {
        /** @var Item $item */
        $item = Item::create([
            'name'          => $name,
            'description'   => $description,
            'price'         => $price
        ]);

        return $item;
    }

    /**
     * @param Item $item
     * @param string $name
     * @param null|string $description
     * @param int|null $price
     * @return Item
     */
    public function update(
        Item $item,
        string $name,
        ?string $description,
        ?int $price
    ) : Item {

        $item->update([
            'name'          => $name,
            'description'   => $description,
            'price'         => $price
        ]);

        return $item;
    }

    /**
     * @param Item $item
     * @throws \Exception
     */
    public function delete(
        Item $item
    ) : void
    {
        $item->delete();
    }
}
