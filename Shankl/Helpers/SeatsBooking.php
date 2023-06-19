<?php

namespace Shankl\Helpers;

use App\Models\Child;
use Shankl\Services\SchoolService;
use Shankl\Factories\AuthUserFactory;
use App\Notifications\SchoolSeatBooked;
use App\Exceptions\SeatBookingException;
use Illuminate\Support\Facades\Notification;
use Shankl\Repositories\SchoolRegOrdersRepo;
use Shankl\Interfaces\AbstractOrder;

class SeatsBooking extends AbstractOrder{

    private $schoolRegOrdersRepo , $schoolService;

    public function __construct(SchoolRegOrdersRepo $schoolRegOrdersRepo , SchoolService $schoolService)
    {
        $this->schoolRegOrdersRepo = $schoolRegOrdersRepo;
        $this->schoolService = $schoolService;

    }



   public function PrepareBooking($request){
        $request['order_code'] = $this->generateOrderCode();

        $school = $this->schoolService->getSchool($request['school_id']);
        $child =  Child::findOrFail($request['child_id']);

        if ($school->free_seats <= 0) {

            throw new SeatBookingException();
        }

       $order = $this->schoolRegOrdersRepo->create($request);

       session()->put("school" , $school);
       session()->put("child_id" , $child);
       session()->put("order" , $order);

       $data = [
        'child_name'=> $child->name,
        'school_name' => $school->name,
       ];

       return $data;

    }

    public function handleBooking(){
        $parent = AuthUserFactory::getAuthUser();
        $school = session()->get("school");
        $child = session()->get("child");
        $order = session()->get("order");
        $seats = $school->free_seats;
        $seats--;

        $this->schoolService->updateProfile(['free_seats' => $seats , 'id' => $order->id]);


        $order->update(['status' => true]);

        Notification::send($parent , new SchoolSeatBooked($school , $order , $child));

        session()->pull('school');
        session()->pull('child');
        session()->pull('order');

    }




}
