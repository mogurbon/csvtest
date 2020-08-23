<?php

namespace App\Imports;

use App\Contact;
use App\CustomAttribute;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {



        foreach ($collection as $row)
        {
            $contact = new Contact();
            $contact->team_id = $row[0];
            $contact->name = $row[1];
            $contact->phone = $row[2];
            $contact->email = $row[3];
            $contact->sticky_phone_number_id =  $row[4];
            $contact->save();


            if (count($row) > 5 ){


                for ($i=5; $i<=count($row)-1; $i++ ){
                    if ( $row[$i]){

                        $custom_attribute = new CustomAttribute();
                        $custom_attribute->contact_id = $contact->id;
                        $custom_attribute->key = $i;
                        $custom_attribute->value = $row[$i];
                        $custom_attribute->save();
                    }

                }
            }


        }
    }
}
