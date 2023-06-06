<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\User;
use App\Couple;

use App\Religion;
use App\Cast;
use App\Dynastie;
use App\Clan;
use App\Subclan;
use App\Country;
use App\State;
use App\City;
use App\Tehsil;
use App\Village;

use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateRequest;

class UsersController extends Controller
{
    /**
     * Search user by keyword.
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $q = $request->get('q');
        $users = [];

        if ($q) {
            $users = User::with('father', 'mother')->where(function ($query) use ($q) {
                $query->where('name', 'like', '%'.$q.'%');
                $query->orWhere('nickname', 'like', '%'.$q.'%');
            })
                ->orderBy('name', 'asc')
                ->paginate(24);
        }

        return view('users.search', compact('users'));
    }

    /**
     * Display the specified User.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
         
        $usersMariageList = $this->getUserMariageList($user);
        $allMariageList = $this->getAllMariageList();
        $malePersonList = $this->getPersonList(1);
        $femalePersonList = $this->getPersonList(2);

        return view('users.show', [
            'user'             => $user,
            'usersMariageList' => $usersMariageList,
            'malePersonList'   => $malePersonList,
            'femalePersonList' => $femalePersonList,
            'allMariageList'   => $allMariageList,
        ]);
    }

    /**
     * Display the user's family chart.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function chart(User $user)
    {
        $father = $user->father_id ? $user->father : null;
        $mother = $user->mother_id ? $user->mother : null;

        $fatherGrandpa = $father && $father->father_id ? $father->father : null;
        $fatherGrandma = $father && $father->mother_id ? $father->mother : null;

        $motherGrandpa = $mother && $mother->father_id ? $mother->father : null;
        $motherGrandma = $mother && $mother->mother_id ? $mother->mother : null;

        $childs = $user->childs;
        $colspan = $childs->count();
        $colspan = $colspan < 4 ? 4 : $colspan;

        $siblings = $user->siblings();

        return view('users.chart', compact(
            'user', 'childs', 'father', 'mother', 'fatherGrandpa',
            'fatherGrandma', 'motherGrandpa', 'motherGrandma',
            'siblings', 'colspan'
        ));
    }

    /**
     * Show user family tree.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function tree(User $user)
    {

        return view('users.tree', compact('user'));
    }

    public function pedigreetree(User $user)
    {

        return view('users.pedigreetree', compact('user'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        
        $this->authorize('edit', $user);

        $replacementUsers = [];
        if (request('action') == 'delete') {
            $replacementUsers = $this->getPersonList($user->gender_id);
        }

        $religions = Religion::pluck("relgn_name","id");
        $casts = Cast::pluck("cast_name","id");
        $dynasties = Dynastie::pluck("dynasty_name","id");
        $clans = Clan::pluck("clan_name","id");
        $subclans = Subclan::pluck("subclan_name","id");
        $countries = Country::pluck("country_name","id");
        $states = State::pluck("state_name","id");
        $cities = City::pluck("city_name","id");
        $tehsils = Tehsil::pluck("tehsil_name","id");
        $villages = Village::pluck("village_name","id");
        
        return view('users.edit', compact('user', 'replacementUsers','religions','casts','dynasties','clans','subclans','countries','states','cities','tehsils','villages'));
    }
    /**
     * Dependent Dropdown Ajax Functions
     */
    public function getCast($edit=0,$id=0) 
    {        
        $casts = Cast::where("relgn_id",$id)->pluck("cast_name","id");
        return json_encode($casts);
    }

    public function getSubclan($edit=0,$id=0) 
    {        
        $subclans = Subclan::where("clan_id",$id)->pluck("subclan_name","id");
        return json_encode($subclans);
    }
    public function getState($edit=0,$id=0) 
    {        
        $states = State::where("country_id",$id)->pluck("state_name","id");
        return json_encode($states);
    }
    public function getCity($edit=0,$id=0) 
    {        
        $cities = City::where("state_id",$id)->pluck("city_name","id");
        return json_encode($cities);
    }

    public function getTehsil($edit=0,$id=0) 
    {        
        $tehsils = Tehsil::where("city_id",$id)->pluck("tehsil_name","id");
        return json_encode($tehsils);
    }

    public function getVillage($edit=0,$id=0) 
    {        
        $villages = Village::where("tehsil_id",$id)->pluck("village_name","id");
        return json_encode($villages);
    }
    //End Dependent Dropdown Ajax Functions

    /**
     * Update the specified User in storage.
     *
     * @param  \App\Http\Requests\Users\UpdateRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, User $user)
    {
        //return "aaaaa";
        // 
        // $this->validate($request, [
        //     'tob' => 'date_format:H:i:sa',
        // ]);
 
        $user->update($request->validated());
        
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('delete', $user);

        if ($request->has('replace_delete_button')) {
            $attributes = $request->validate([
                'replacement_user_id' => 'required|exists:users,id',
            ], [
                'replacement_user_id.required' => __('validation.user.replacement_user_id.required'),
            ]);

            DB::beginTransaction();
            $this->replaceUserOnUsersTable($user->id, $attributes['replacement_user_id']);
            $this->replaceUserOnCouplesTable($user->id, $attributes['replacement_user_id']);
            $user->delete();
            DB::commit();

            return redirect()->route('users.show', $attributes['replacement_user_id']);
        }

        $request->validate([
            'user_id' => 'required',
        ]);

        if ($request->get('user_id') == $user->id && $user->delete()) {
            return redirect()->route('users.search');
        }

        return back();
    }

    /**
     * Upload users photo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function photoUpload(Request $request, User $user)
    {
        $request->validate([
            'photo' => 'required',
        ]);

        if (Storage::exists($user->photo_path)) {
            Storage::delete($user->photo_path);
        }

        $user->photo_path = $request->photo->store('images');
        $user->save();

        return back();
    }

    /**
     * Replace User Ids on users table.
     *
     * @param  string  $oldUserId
     * @param  string  $replacementUserId
     * @return void
     */
    private function replaceUserOnUsersTable($oldUserId, $replacementUserId)
    {
        foreach (['father_id', 'mother_id', 'manager_id'] as $field) {
            DB::table('users')->where($field, $oldUserId)->update([
                $field => $replacementUserId,
            ]);
        }
    }

    /**
     * Replace User Ids on couples table.
     *
     * @param string $oldUserId
     * @param string $replacementUserId
     *
     * @return void
     */
    private function replaceUserOnCouplesTable($oldUserId, $replacementUserId)
    {
        foreach (['husband_id', 'wife_id', 'manager_id'] as $field) {
            DB::table('couples')->where($field, $oldUserId)->update([
                $field => $replacementUserId,
            ]);
        }
    }

    /**
     * Get User list based on gender.
     *
     * @param int $genderId
     *
     * @return \Illuminate\Support\Collection
     */
    private function getPersonList(int $genderId)
    {
        return User::where('gender_id', $genderId)->pluck('nickname', 'id');
    }

    /**
     * Get marriage list of a user.
     *
     * @param \App\User $user
     *
     * @return array
     */
    private function getUserMariageList(User $user)
    {
        $usersMariageList = [];

        foreach ($user->couples as $spouse) {
            $usersMariageList[$spouse->pivot->id] = $user->name.' & '.$spouse->name;
        }

        return $usersMariageList;
    }

    /**
     * Get all marriage list.
     *
     * @return array
     */
    private function getAllMariageList()
    {
        $allMariageList = [];

        foreach (Couple::with('husband', 'wife')->get() as $couple) {
            $allMariageList[$couple->id] = $couple->husband->name.' & '.$couple->wife->name;
        }

        return $allMariageList;
    }
}
