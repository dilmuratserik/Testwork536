<?php

namespace App\Http\Controllers\Dashboard\Item;

use App\Http\Controllers\Dashboard\BaseController;
use App\Http\Requests\Dashboard\Item\CreateRequest;
use App\Http\Requests\Dashboard\Item\UpdateRequest;
use App\Repositories\ItemRepository;

/**
 * Class MainController
 *
 * @package App\Http\Controllers\Dashboard\Item
 */
class MainController extends BaseController
{
    /**
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        ItemRepository $itemRepository
    )
    {
        $items = $itemRepository->getAll();

        return view('dashboard.items.index', [
            'items' => $items
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.items.create');
    }

    /**
     * @param CreateRequest $request
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        CreateRequest $request,
        ItemRepository $itemRepository
    )
    {
        $item = $itemRepository->create(
            $request->input('name'),
            $request->input('description'),
            $request->input('price')
        );

        if (!$item) {
            return redirect()->back()->withErrors([
                'name' => 'Не удалось добавить товар.'
            ]);
        }

        return redirect()->route('dashboard.items');
    }

    /**
     * @param int $id
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(
        int $id,
        ItemRepository $itemRepository
    )
    {
        $item = $itemRepository->findById($id);

        if (!$item) {
            return redirect()->back()->withErrors([
                'name' => 'Не удалось найти товар.'
            ]);
        }

        return view('dashboard.items.edit', [
            'item' => $item
        ]);
    }

    /**
     * @param int $id
     * @param UpdateRequest $request
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        int $id,
        UpdateRequest $request,
        ItemRepository $itemRepository
    )
    {
        $item = $itemRepository->findById($id);

        if (!$item) {
            return redirect()->back()->withErrors([
                'name' => 'Не удалось найти товар.'
            ]);
        }

        $itemRepository->update(
            $item,
            $request->input('name'),
            $request->input('description'),
            $request->input('price')
        );

        return redirect()->route('dashboard.items');
    }

    /**
     * @param int $id
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(
        int $id,
        ItemRepository $itemRepository
    )
    {
        $item = $itemRepository->findById($id);

        if (!$item) {
            return redirect()->back()->withErrors([
                'name' => 'Не удалось найти товар.'
            ]);
        }

        $itemRepository->delete($item);

        return redirect()->route('dashboard.items');
    }
}
