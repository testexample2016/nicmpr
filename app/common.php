 <?php


 use Carbon\Carbon;

use App\Mprduration;

 function mprdurationcheck()
    {
         $mprduration = Mprduration::where('closed','=' ,0)->first();

        if($mprduration == null)

        {
            $mprdurationstatus = 'NotGenerated';
        }

        elseif($mprduration->closed == 0)
        {
           $mprdurationstatus = 'Opened'; 
        }

        else{

            $mprdurationstatus = 'wrong';
        }

        return $mprdurationstatus;
    }

 function createdate(){

          $mprdurationstatus = mprdurationcheck();

         if($mprdurationstatus == 'Opened'){

            $date = Mprduration::where('closed', 0)->value('year_month');
        }

        else{

              $date = Carbon::now();


        }
       

        return $date;
    }