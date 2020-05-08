<?php

namespace BeyondCode\Vouchers\Traits;

use BeyondCode\Vouchers\Models\Voucher;
use BeyondCode\Vouchers\Facades\Vouchers;

trait HasVouchers
{
    /**
     * Set the polymorphic relation.
     *
     * @return mixed
     */
    public function vouchers()
    {
        return $this->morphMany(Voucher::class, 'model');
    }

    /**
     * @param int $amount
     * @param array $data
     * @param null $expires_at
     * @return Voucher[]
     */
    public function createVouchers(int $amount, array $data = [], $expires_at = null)
    {
        return Vouchers::create($this, $amount, $data, $expires_at);
    }

    /**
     * @param array $data
     * @param null $name
     * @param null $expires_at
     * @return Voucher
     */
    public function createVoucher(array $data = [], $name = null, $expires_at = null)
    {
        $vouchers = Vouchers::create($this, $name, $data, $expires_at);

        return $vouchers[0];
    }
}
