<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

//use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class EndDateMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the expiration date of the loan has been reached.';

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
            if (now()->greaterThanOrEqualTo($loan->created_at->addWeeks(6))) {
                Mail::to($loan->user->email)->send(new SendMail($loan));
            }
            sleep(1);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();

        return Command::SUCCESS;
    }
}
