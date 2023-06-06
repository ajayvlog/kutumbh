<?php
namespace App\Helpers;
use App\User;
use App\Couple;

use Illuminate\Support\Facades\Auth;
 
class Common{

    public static function getparents($parent_id,$br,$sm){
    if($sm==1)
    {
       return $u = User::where('parent_id',$parent_id)->where('birth_order','<=',$br)->where('id','!=',Auth::id())->orderBy('birth_order','asc')->get(); //->orderBy('birth_order','asc')
    }
    if($sm==2)
    {
     return   $u = User::where('parent_id',$parent_id)->where('birth_order','>',$br)->where('id','!=',Auth::id())->orderBy('birth_order','asc')->get();  //->orderBy('birth_order','asc')
    }
    }
    
    public static function getSiblingsSpouse($user_id,$g)
    {
        $u='';
        if($g==1)
        {
          $u = Couple::where('husband_id',$user_id)->select('wife_id as spouse_id')->first();
        }
        if($g==2)
        {
          $u = Couple::where('wife_id',$user_id)->select('husband_id as spouse_id')->first();
        }
             
        if($u)
        {
          return  $l=User::where('id',$u->spouse_id)->first();
        } 

        return ;   
    }
    public static function getSpouseParents($user_id,$g){
      $u='';
        if($g==1)
        {
          $u = Couple::where('husband_id',$user_id)->select('wife_id as spouse_id')->first();
        }
        if($g==2)
        {
          $u = Couple::where('wife_id',$user_id)->select('husband_id as spouse_id')->first();
        }
             
        if($u)
        {
          return  $l=User::where('id',$u->spouse_id)->first();
        } 

        return ;
    }
 
    public static function getUserName($user_id){
        return $l=User::where('id',$user_id)->first();
    }
    
    

    public static function hello($parrent_id)
    {
        return $parrent_id;
        return "hello";
    }
 
}
?>
