<?php

namespace App\Jobs;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
class SendNewsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $title;
    protected $description;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $title, $description)
    {
        $this->email = $email;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Відправте лист на електронну адресу підписника
        Mail::to($this->email)->send(new NewsletterMail($this->title, $this->description));
    }
}
