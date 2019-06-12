<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * @return Partners[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        $partners = Partners::all();

        return $partners;
    }


    /**
     * @param Request $request
     */
    public function save(Request $request)
    {
        $partners = $request->get('partners');
        $partners = collect($partners);

        $newPartners = $partners->where('id', 0);

        foreach ($newPartners as $newPartner) {
            $partner = new Partners();
            $partner->name = $newPartner['name'];
            $partner->link = $newPartner['link'];
            $partner->image = 'images/partners/' . $newPartner['image'];
            $partner->save();
        }
    }


    /**
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $partnerId = $request->get('partner_id');

        Partners::where('id',$partnerId)->delete();
    }

}
