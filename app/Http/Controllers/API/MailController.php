<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Feedback;

class MailController extends Controller
{
    public function mail()
    {
        $name = 'Cloudways';
        Mail::to('wang198904@gmail.com')->send(new Feedback($name));

        return 'Email sent Successfully';
    }
}
