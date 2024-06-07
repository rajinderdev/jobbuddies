<?php

namespace App\Exports;

use App\Models\FundraisingOrderItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
class ExportSoldTicket implements FromView,  WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection() 
    //     { 
    //         $data = FundraisingOrderItem::select(['fundraising_order_items.*', 'tickets.name as ticket_name','tickets.image','users.name','users.email','users.phone'])
    //         ->join('tickets', 'tickets.id','=','fundraising_order_items.ticket_id')
    //         ->where('fundraising_order_items.order_type','Tickets')
    //         ->join('users', 'users.id', '=', 'fundraising_order_items.user_id')
    //         ->orderBy('fundraising_order_items.id','DESC')->get();
    //         return User::select('name','email')->get(); 
    //     }
    protected $id;
    public function __construct($id=null)
    {
        $this->id = $id;
    }
    public function view(): View
    {
        $id = $this->id; 
        $data = FundraisingOrderItem::select(['fundraising_order_items.*', 'tickets.name as ticket_name','tickets.image','users.name','users.email','users.phone'])
            ->join('tickets', 'tickets.id','=','fundraising_order_items.ticket_id')
            ->where('fundraising_order_items.order_type','Tickets')
            ->where('fundraising_order_items.event_id',$id)
            ->join('users', 'users.id', '=', 'fundraising_order_items.user_id')
            ->orderBy('fundraising_order_items.id','DESC')->get();
        return view('superadmin.fundraising.exportSoldTicketsExcel',compact('data'));
    }
}
