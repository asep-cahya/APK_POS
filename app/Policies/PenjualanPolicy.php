<?php

namespace App\Policies;

use App\Models\Penjualan;
use App\Models\User;

class PenjualanPolicy
{
    /**
     * Melihat daftar penjualan.
     *
     * Admin dan kasir boleh melihat daftar.
     */
    public function viewAny(User $user): bool
    {
        return in_array(
            $user->role->name,
            ['admin', 'kasir'],
            true
        );
    }

    /**
     * Melihat detail penjualan.
     *
     * Admin dan kasir boleh melihat detail.
     */
    public function view(User $user, Penjualan $penjualan): bool
    {
        return in_array(
            $user->role->name,
            ['admin', 'kasir'],
            true
        );
    }

    /**
     * Membuat penjualan.
     *
     * Admin dan kasir boleh membuat penjualan.
     */
    public function create(User $user): bool
    {
        return in_array(
            $user->role->name,
            ['admin', 'kasir'],
            true
        );
    }

    /**
     * Mengedit / menyelesaikan penjualan.
     *
     * HANYA ADMIN
     * dan transaksi harus masih OPEN.
     */
    public function update(
        User $user,
        Penjualan $penjualan
    ): bool {
        return $user->role->name === 'admin'
            && $penjualan->status === 'OPEN';
    }

    /**
     * Menghapus penjualan.
     *
     * HANYA ADMIN
     * dan transaksi harus masih OPEN.
     */
    public function delete(
        User $user,
        Penjualan $penjualan
    ): bool {
        return $user->role->name === 'admin'
            && $penjualan->status === 'OPEN';
    }

    /**
     * Restore.
     */
    public function restore(
        User $user,
        Penjualan $penjualan
    ): bool {
        return false;
    }

    /**
     * Force delete.
     */
    public function forceDelete(
        User $user,
        Penjualan $penjualan
    ): bool {
        return false;
    }
}
