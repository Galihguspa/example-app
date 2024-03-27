<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    use HasFactory;
    protected $table = 'partner';
    protected $primaryKey = 'id';
    
    public function getCustomerAttribute($customer)
    {
        if (is_string($customer)) {
            $customer = explode(',', $customer);
        }
        return $customer;
    }

    public function setCustomerAttribute($customer)
    {
        if (is_array($customer)) {
            $this->attributes['customer'] = implode(',', $customer);
        }
    }

    public function getSupplierAttribute($supplier)
    {
        if (is_string($supplier)) {
            $supplier = explode(',', $supplier);
        }
        return $supplier;
    }

    public function setSupplierAttribute($supplier)
    {
        if (is_array($supplier)) {
            $this->attributes['supplier'] = implode(',', $supplier);
        }
    }
  
}
