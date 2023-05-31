<?php

namespace App\Services;

use App\Models\Contact;

class StoreContact
{
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }


    public function store(array $dataContact)
    {
        $dataContact['approved'] = $this->isApproved($dataContact['time_of_experience'], $dataContact['english_level']);

        return $this->contact->create($dataContact);
    }

    public function isApproved(int $time_of_experience, int $english_level): bool
    {
        return $time_of_experience >= 3 && $english_level >= 3;
    }
}
