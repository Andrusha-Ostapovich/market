<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;
use App\Jobs\SendNewsletter;

class SubscriberController extends Controller
{
    public function index()
    {

        $subscriber = Subscriber::all();
        return view('admin.subscriber.index', compact('subscriber'));
    }

    public function create()
    {

        return view('admin.subscriber.create',);
    }

    public function store(SubscriberRequest $request)
    {
        $subscribers = Subscriber::pluck('email')->all();

        // Використайте отримані електронні адреси для створення розсилки
        foreach ($subscribers as $email) {
            // Створіть об'єкт SendNewsletter та передайте його до черги
            dispatch(new SendNewsletter($email, $request->input('title'), $request->input('description')));
        }

        // Додайте повідомлення про успішну створену розсилку або іншу логіку
        // ...

        return redirect()->back()->with('success', 'Розсилка успішно запущена!');
    }
    public function show()
    {
    }

    public function edit()
    {

    }
    public function update()
    {
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return redirect()->route('admin.subscriber.index');
    }
}
