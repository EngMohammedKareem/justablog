<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class AccountCreated extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line("Omg no way it's " . $this->user->name . "! Welcome to our community!")
            ->line("We’re thrilled to have you join our community. As you settle in, we hope you connect with the right people and make the most of your experience here.")
            ->line("Oh, and by the way, you've automatically followed @moo—the most handsome man on earth. We promise, it's not a bad thing! 😉")
            ->action("Get Started", url('/dashboard'))
            ->line("Thank you for choosing our application. If you have any questions or need assistance, don't hesitate to reach out!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
