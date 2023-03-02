<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function kontak_micro_teaching(Contact $kontak){
        return $kontak->kontak_micro_teaching;
    }

    public function kontak_pesan_guru(Contact $kontak){
        return $kontak->kontak_pesan_guru;
    }
}
