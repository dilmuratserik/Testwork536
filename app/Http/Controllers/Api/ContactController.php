<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Contact\CreateRequest;
use App\Http\Requests\Api\Contact\UpdateRequest;
use App\Repositories\ItemRepository;
use App\Support\Transformers\Api\ItemTransformer;

class ContactController extends BaseController
{
    /**
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(
        ItemRepository $contactRepo
    )
    {
        $contacts = $contactRepo->getAllPaginated();

        return $this->respondWithSuccess(
            $this->transformCollection($contacts, new ItemTransformer)
        );
    }

    /**
     * @param string $id
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(
        string $id,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->respondWithError('Контакт не найден.');
        }

        return $this->respondWithSuccess(
            $this->transformItem($contact, new ItemTransformer)
        );
    }

    /**
     * @param CreateRequest $request
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(
        CreateRequest $request,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->create(
            auth()->user(),
            $request->input('name'),
            $request->input('phone'),
            $request->input('favorite') === null ? false : true
        );

        if ($contact === null) {
            return $this->respondWithError('Не удалось добавить новый контакт.');
        }

        return $this->respondWithSuccess([], 'Новый контакт успешно добавлен.');
    }

    /**
     * @param string $id
     * @param UpdateRequest $request
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(
        string $id,
        UpdateRequest $request,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->respondWithError('Контакт не найден.');
        }

        $contactRepo->update(
            $contact,
            $request->input('name'),
            $request->input('phone'),
            $request->input('favorite') === null ? false : true
        );

        return $this->respondWithSuccess([],'Контакт успешно обновлен.');
    }

    /**
     * @param string $id
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(
        string $id,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->respondWithError('Contact not found.');
        }

        $contactRepo->delete(
            $contact
        );

        return $this->respondWithSuccess([],'Контакт успешно удален.');
    }
}
