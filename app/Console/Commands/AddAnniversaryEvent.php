<?php

namespace App\Console\Commands;

use App\Models\Anniversary;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddAnniversaryEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wish:add-anniversary-event';

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
        $anniversaries = Anniversary::where('next_event', null)->orWhere('next_event', '<', DB::raw('CURDATE()'))->get();
        foreach ($anniversaries as $anniversary) {
            $next_event = self::calcNextEvent($anniversary->anniversary_date);
            DB::beginTransaction();
            try {
                Event::create([
                    'user_id' => $anniversary->user_id,
                    'importance' => $anniversary->importance,
                    'title' => self::getTitle($anniversary->anniversary_type, $next_event),
                    'date' => $next_event,
                    'origin' => Event::ORIGIN_ANNIVERSARY,
                ]);
                $anniversary->next_event = $next_event;
                $anniversary->save();
                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }
        }
    }

    private static function getTitle($anniversary_type, $next_event)
    {
        $text = "سالگرد ";
        $text .= Anniversary::ANNIVERSARY_TYPE_NAME[$anniversary_type] . ' ';
        $text .= $next_event->year;
        return $text;
    }
    private static function calcNextEvent($anniversary_date)
    {
        $yearsToAdd = (int) ceil($anniversary_date->floatDiffInYears(Carbon::now()));
        return $anniversary_date->addYears($yearsToAdd);

    }
}
