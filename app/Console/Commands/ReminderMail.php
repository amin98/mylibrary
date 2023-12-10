<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use App\Mail\WarningMail;
use App\Models\Loan;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind the user of the expiration date 1 week in advance';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $loans = Loan::query()->whereHandedIn(0)->get();

        $this->output->progressStart($loans->count());

        foreach ($loans as $loan) {
            if ($loan->created_at->addWeeks(6)->isNextWeek()) {
                Mail::to($loan->user->email)->send(new WarningMail($loan));
            }
            sleep(1);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();

        return Command::SUCCESS;
    }
}
