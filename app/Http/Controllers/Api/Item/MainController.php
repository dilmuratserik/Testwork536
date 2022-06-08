<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Item\CreateRequest;
use App\Http\Requests\Api\Item\UpdateRequest;
use App\Repositories\ItemRepository;
use App\Support\Transformers\Api\ItemTransformer;

/**
 * Class MainController
 *
 * @package App\Http\Controllers\Api\Item
 */
class MainController extends BaseController
{
    /**
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(
        ItemRepository $itemRepository
    )
    {
        $items = $itemRepository->getAll();

        return $this->respondWithSuccess(
            $this->transformCollection($items, new ItemTransformer)
        );
    }

    /**
     * @param int $id
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(
        int $id,
        ItemRepository $itemRepository
    )
    {
        $item = $itemRepository->findById($id);

        if (!$item) {
            return $this->respondWithError('Товар не найден.');
        }

        return $this->respondWithSuccess(
            $this->transformItem($item, new ItemTransformer)
        );
    }

    /**
     * @param CreateRequest $request
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(
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
            return $this->respondWithError('Не удалось добавить новый товар.');
        }

        return $this->respondWithSuccess([], 'Новый товар успешно добавлен.');
    }

    /**
     * @param int $id
     * @param UpdateRequest $request
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(
        int $id,
        UpdateRequest $request,
        ItemRepository $itemRepository
    )
    {
        $item = $itemRepository->findById($id);

        if (!$item) {
            return $this->respondWithError('Failed to add a new product');
        }

        $itemRepository->update(
            $item,
            $request->input('name'),
            $request->input('description'),
            $request->input('price')
        );

        return $this->respondWithSuccess([],'Product data has been successfully updated.');
    }

    /**
     * @param int $id
     * @param ItemRepository $itemRepository
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(
        int $id,
        ItemRepository $itemRepository
    )
    {
        $item = $itemRepository->findById($id);

        if (!$item) {
            return $this->respondWithError('Couldnt find the product.');
        }

        $itemRepository->delete(
            $item
        );

        return $this->respondWithSuccess([],'The product was successfully deleted.');
    }
}
