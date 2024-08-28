<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $table = 'payment_transaction';

    public function store($data) {

        $this->student_id = $data['student_id'];
        $this->student_name = $data['student_name'];
        $this->student_dob = $data['student_dob'];
        $this->amount = $data['amount'];
        $this->note = $data['note'];
        $this->order_code = $data['order_code'];
        $this->type = $data['type'];
        $this->ship_date = $data['ship_date'];
        $this->order_detail = $data['order_detail'];
        $this->validity_time = $data['validity_time'];
        
        return $this->save();
    }
}
