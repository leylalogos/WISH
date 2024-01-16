<?php

namespace App\Console\Commands;

use App\Jobs\RemindeJob;
use App\Models\Connection;
use App\Models\Event;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ReminderAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wish:reminde:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Reminder::all() as $reminder) {
            $followingUsers = Connection::where('following_id', $reminder->user_id)
                ->where('is_confirmed', true)
                ->get()
                ->pluck('followed_id');

            $events = Event::usersEventsInRange(
                $followingUsers,
                Carbon::now()->addDay($reminder->in_advance - 1),
                Carbon::now()->addDay($reminder->in_advance)
            );
            RemindeJob::dispatch($events, $reminder->user_id);
        }
    }
}
