<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Contact\CreateRequest;
use App\Http\Requests\Dashboard\Contact\UpdateRequest;
use App\Repositories\ItemRepository;
use App\Repositories\UserRepository;

class ContactController extends BaseController
{
    /**
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        ItemRepository $contactRepo
    )
    {
        $contacts = $contactRepo->getAllPaginated();

        return view('dashboard.contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.contacts.create');
    }

    /**
     * @param CreateRequest $request
     * @param ItemRepository $contactRepo
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(
        CreateRequest $request,
        ItemRepository $contactRepo,
        UserRepository $userRepo
    )
    {
        $user = $userRepo->findById(auth('dashboard')->user()->id);

        if ($user === null) {
            return $this->error(
                'Failed found auth user',
                route('contacts.create')
            );
        }

        $contact = $contactRepo->create(
            $user,
            $request->input('name'),
            $request->input('phone'),
            $request->input('favorite') === null ? false : true
        );

        if ($contact === null) {
            return $this->error(
                'Failed to add contact.',
                route('contacts.create')
            );
        }

        return $this->success(
            'Contact add successfully',
            route('contacts')
        );
    }

    /**
     * @param string $id
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function view(
        string $id,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        return view('dashboard.contacts.view', [
            'contact'  => $contact
        ]);
    }

    /**
     * @param string $id
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(
        string $id,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        return view('dashboard.contacts.edit', [
            'contact'  => $contact
        ]);
    }

    /**
     * @param string $id
     * @param UpdateRequest $request
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(
        string $id,
        UpdateRequest $request,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        $contactRepo->update(
            $contact,
            $request->input('name'),
            $request->input('phone'),
            $request->input('favorite') === null ? false : true
        );

        return $this->success(
            'Контакт успешно обновлен.',
            route('contacts.edit', $contact->id)
        );
    }

    /**
     * @param string $id
     * @param ItemRepository $contactRepo
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(
        string $id,
        ItemRepository $contactRepo
    )
    {
        $contact = $contactRepo->findById($id);

        if ($contact === null) {
            return $this->error(
                'Контакт не найден.',
                route('contacts')
            );
        }

        $contactRepo->delete(
            $contact
        );

        return $this->success('Контакт успешно удален.', route('contacts'));
    }
}
