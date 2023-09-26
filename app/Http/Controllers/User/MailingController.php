<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

class MailingController extends Controller
{
    public function mailing(Request $request)
    {
        $mailing = Subscriber::create($request->only('name', 'email'));
        $successMessage = 'Ви успішно додані до розсилки';

        return redirect()->back()->with(['success' => 'Ви успішно додані до розсилки!']);
    }
}
