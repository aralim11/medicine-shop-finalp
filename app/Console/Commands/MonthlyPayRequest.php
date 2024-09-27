<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Null_;

class MonthlyPayRequest extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Pay:Request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $seller = DB::table('sellers')->get();



        foreach ($seller as $v_seller) {
            $seller_id = $v_seller->seller_id;

            $chk = DB::table('tbl_payment')
                ->where('seller_id', $seller_id)
                ->where('month' , date('m'))
                ->where('year' , date('Y'))
                ->first();

            if ($chk == NULL){

                $data = array();
                $data['seller_id'] = $seller_id;
                $data['month'] = date('m');
                $data['year'] = date('Y');
                $data['warning_lavel'] = 1;
                $data['created_at'] = date('y-m-d h:i');

                DB::table('tbl_payment')->insert($data);
            }
        }
    }

}
