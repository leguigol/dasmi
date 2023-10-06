<?php

namespace App\Http\Controllers;

use App\Models\Antefamiliare;
use Illuminate\Http\Request;

class AntefamiliareController extends Controller
{
    public function store(Request $request){
        
        $fami=new Antefamiliare();

        $fami->padron_id=$request->id;
        if($request->htam==null){
            $fami->htam=0;
        }else{
            $fami->htam=1;
        }
        if($request->htap==null){
            $fami->htap=0;
        }else{
            $fami->htap=1;
        }
        if($request->htah==null){
            $fami->htah=0;
        }else{
            $fami->htah=1;
        }

        if($request->cardiom==null)
        {
            $fami->cardiom=0;
        }else{

            $fami->cardiom=1;
        }

        if($request->cardiop==null)
        {
            $fami->cardiop=0;
        }else{

            $fami->cardiop=1;
        }

        if($request->cardioh==null)
        {
            $fami->cardioh=0;
        }else{

            $fami->cardioh=1;
        }

        if($request->dbtm==null)
        {
            $fami->dbtm=0;
        }else{
            
            $fami->dbtm=1;
        }
        
        if($request->dbtp==null)
        {
            $fami->dbtp=0;
        }else{
            
            $fami->dbtp=1;
        }
        
        if($request->dbth==null)
        {
            $fami->dbth=0;
        }else{
            
            $fami->dbth=1;
        }

        if($request->acvm==null)
        {
            $fami->acvm=0;
        }else{
            
            $fami->acvm=1;
        }
        
        if($request->acvp==null)
        {
            $fami->acvp=0;
        }else{
            
            $fami->acvp=1;
        }
        
        if($request->acvh==null)
        {
            $fami->acvh=0;
        }else{
            
            $fami->acvh=1;
        }
        
        if($request->cacm==null)
        {
            $fami->cacm=0;
        }else{
            
            $fami->cacm=1;
        }
        
        if($request->cacp==null)
        {
            $fami->cacp=0;
        }else{
            
            $fami->cacp=1;
        }
        
        if($request->cach==null)
        {
            $fami->cach=0;
        }else{
            
            $fami->cach=1;
        }

        if($request->carm==null)
        {
            $fami->carm=0;
        }else{
            
            $fami->carm=1;
        }
        
        if($request->carp==null)
        {
            $fami->carp=0;
        }else{
            
            $fami->carp=1;
        }
        
        if($request->carh==null)
        {
            $fami->carh=0;
        }else{
            
            $fami->carh=1;
        }

        if($request->camm==null)
        {
            $fami->camm=0;
        }else{
            
            $fami->camm=1;
        }
        
        if($request->camp==null)
        {
            $fami->camp=0;
        }else{
            
            $fami->camp=1;
        }
        
        if($request->camh==null)
        {
            $fami->camh=0;
        }else{
            
            $fami->camh=1;
        }

        if($request->caom==null)
        {
            $fami->caom=0;
        }else{
            
            $fami->caom=1;
        }
        
        if($request->caop==null)
        {
            $fami->caop=0;
        }else{
            
            $fami->caop=1;
        }
        
        if($request->caoh==null)
        {
            $fami->caoh=0;
        }else{
            
            $fami->caoh=1;
        }

        if($request->abudm==null)
        {
            $fami->abudm=0;
        }else{
            
            $fami->abudm=1;
        }
        
        if($request->abudp==null)
        {
            $fami->abudp=0;
        }else{
            
            $fami->abudp=1;
        }
        
        if($request->abudh==null)
        {
            $fami->abudh=0;
        }else{
            
            $fami->abudh=1;
        }

        if($request->abuhm==null)
        {
            $fami->abuhm=0;
        }else{
            
            $fami->abuhm=1;
        }
        
        if($request->abuhp==null)
        {
            $fami->abuhp=0;
        }else{
            
            $fami->abuhp=1;
        }
        
        if($request->abuhh==null)
        {
            $fami->abuhh=0;
        }else{
            
            $fami->abuhh=1;
        }

        if($request->deprem==null)
        {
            $fami->deprem=0;
        }else{
            
            $fami->deprem=1;
        }
        
        if($request->deprep==null)
        {
            $fami->deprep=0;
        }else{
            
            $fami->deprep=1;
        }
        
        if($request->depreh==null)
        {
            $fami->depreh=0;
        }else{
            
            $fami->depreh=1;
        }

        if($request->discam==null)
        {
            $fami->discam=0;
        }else{
            
            $fami->discam=1;
        }
        
        if($request->discap==null)
        {
            $fami->discap=0;
        }else{
            
            $fami->discap=1;
        }
        
        if($request->discah==null)
        {
            $fami->discah=0;
        }else{
            
            $fami->discah=1;
        }

        if($request->msubm==null)
        {
            $fami->msubm=0;
        }else{
            
            $fami->msubm=1;
        }
        
        if($request->msubp==null)
        {
            $fami->msubp=0;
        }else{
            
            $fami->msubp=1;
        }
        
        if($request->msubh==null)
        {
            $fami->msubh=0;
        }else{
            
            $fami->msubh=1;
        }

        $fami->save();

        return redirect()->route('hc.principal', $request->id);

    }
    public function update(Request $request){
        $fami=Antefamiliare::where('padron_id','=',$request->id)->first();
        if($request->htam==null){
            $fami->htam=0;
        }else{
            $fami->htam=1;
        }
        if($request->htap==null){
            $fami->htap=0;
        }else{
            $fami->htap=1;
        }
        if($request->htah==null){
            $fami->htah=0;
        }else{
            $fami->htah=1;
        }

        if($request->cardiom==null)
        {
            $fami->cardiom=0;
        }else{

            $fami->cardiom=1;
        }

        if($request->cardiop==null)
        {
            $fami->cardiop=0;
        }else{

            $fami->cardiop=1;
        }

        if($request->cardioh==null)
        {
            $fami->cardioh=0;
        }else{

            $fami->cardioh=1;
        }

        if($request->dbtm==null)
        {
            $fami->dbtm=0;
        }else{
            
            $fami->dbtm=1;
        }
        
        if($request->dbtp==null)
        {
            $fami->dbtp=0;
        }else{
            
            $fami->dbtp=1;
        }
        
        if($request->dbth==null)
        {
            $fami->dbth=0;
        }else{
            
            $fami->dbth=1;
        }

        if($request->acvm==null)
        {
            $fami->acvm=0;
        }else{
            
            $fami->acvm=1;
        }
        
        if($request->acvp==null)
        {
            $fami->acvp=0;
        }else{
            
            $fami->acvp=1;
        }
        
        if($request->acvh==null)
        {
            $fami->acvh=0;
        }else{
            
            $fami->acvh=1;
        }
        
        if($request->cacm==null)
        {
            $fami->cacm=0;
        }else{
            
            $fami->cacm=1;
        }
        
        if($request->cacp==null)
        {
            $fami->cacp=0;
        }else{
            
            $fami->cacp=1;
        }
        
        if($request->cach==null)
        {
            $fami->cach=0;
        }else{
            
            $fami->cach=1;
        }

        if($request->carm==null)
        {
            $fami->carm=0;
        }else{
            
            $fami->carm=1;
        }
        
        if($request->carp==null)
        {
            $fami->carp=0;
        }else{
            
            $fami->carp=1;
        }
        
        if($request->carh==null)
        {
            $fami->carh=0;
        }else{
            
            $fami->carh=1;
        }

        if($request->camm==null)
        {
            $fami->camm=0;
        }else{
            
            $fami->camm=1;
        }
        
        if($request->camp==null)
        {
            $fami->camp=0;
        }else{
            
            $fami->camp=1;
        }
        
        if($request->camh==null)
        {
            $fami->camh=0;
        }else{
            
            $fami->camh=1;
        }

        if($request->caom==null)
        {
            $fami->caom=0;
        }else{
            
            $fami->caom=1;
        }
        
        if($request->caop==null)
        {
            $fami->caop=0;
        }else{
            
            $fami->caop=1;
        }
        
        if($request->caoh==null)
        {
            $fami->caoh=0;
        }else{
            
            $fami->caoh=1;
        }

        if($request->abudm==null)
        {
            $fami->abudm=0;
        }else{
            
            $fami->abudm=1;
        }
        
        if($request->abudp==null)
        {
            $fami->abudp=0;
        }else{
            
            $fami->abudp=1;
        }
        
        if($request->abudh==null)
        {
            $fami->abudh=0;
        }else{
            
            $fami->abudh=1;
        }

        if($request->abuhm==null)
        {
            $fami->abuhm=0;
        }else{
            
            $fami->abuhm=1;
        }
        
        if($request->abuhp==null)
        {
            $fami->abuhp=0;
        }else{
            
            $fami->abuhp=1;
        }
        
        if($request->abuhh==null)
        {
            $fami->abuhh=0;
        }else{
            
            $fami->abuhh=1;
        }

        if($request->deprem==null)
        {
            $fami->deprem=0;
        }else{
            
            $fami->deprem=1;
        }
        
        if($request->deprep==null)
        {
            $fami->deprep=0;
        }else{
            
            $fami->deprep=1;
        }
        
        if($request->depreh==null)
        {
            $fami->depreh=0;
        }else{
            
            $fami->depreh=1;
        }

        if($request->discam==null)
        {
            $fami->discam=0;
        }else{
            
            $fami->discam=1;
        }
        
        if($request->discap==null)
        {
            $fami->discap=0;
        }else{
            
            $fami->discap=1;
        }
        
        if($request->discah==null)
        {
            $fami->discah=0;
        }else{
            
            $fami->discah=1;
        }

        if($request->msubm==null)
        {
            $fami->msubm=0;
        }else{
            
            $fami->msubm=1;
        }
        
        if($request->msubp==null)
        {
            $fami->msubp=0;
        }else{
            
            $fami->msubp=1;
        }
        
        if($request->msubh==null)
        {
            $fami->msubh=0;
        }else{
            
            $fami->msubh=1;
        }

        $fami->save();

        return redirect()->route('hc.principal', $request->id);

    }        
}
