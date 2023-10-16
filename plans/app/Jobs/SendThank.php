<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
// Thay thế 'Order' bằng tên model của bạn

class SendThank implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        Mail::send('emails.Thank', ['order' => $this->order], function ($message) {
            $message->to($this->order->user->Email, $this->order->user->FullName)
                ->subject('Xác nhận đơn hàng thành công');
        });
    }
}
