<?php

namespace App\Pkl\Traits;

use App\Model\Laporan_Instalasi;
use App\Model\Laporan_Keluhan;
use App\User;

trait LaporanInstalasi
{

    /**
     * Check whether current active user has active project
     * 
     * @param integer $id
     * @return bool
     */
    public function checkProjectStatus($id)
    {
        $onProgress = $this->getTotalUserOnProgressProject($id);
        if ($onProgress == 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Get all projects for particular user
     * 
     * @param integer $id
     * @return Laporan_Instalasi
     */
    public function getUserProjects($id)
    {
         
        return Laporan_Instalasi::where('user_id', $id)->get();
    }
    /**
     * Get active project for particular user
     * 
     * @param integer $id
     * @return Laporan_Instalasi
     */
    public function getCurrentActiveUserProjects($id)
    {
         
        return Laporan_Instalasi::where('user_id', $id)->where('status', 'Dalam Pengerjaan')->first();
    }


    /**
     * Get all projects for particular user
     * 
     * @param integer $user
     * @return integer
     */
    public function getTotalUserProject($user_id)
    {
        $totalProjects = Laporan_Instalasi::where('user_id', $user_id)->get()->count();
        return $totalProjects;
    }

    /**
     * Get total on progress projects
     * 
     * @param integer $user
     * @return integer
     */
    public function getTotalUserOnProgressProject($user_id){
        $onProgress = Laporan_Instalasi::where('status', 'Dalam Pengerjaan')->where('user_id', $user_id)->get()->count();
        return $onProgress;
    }
    
    /**
     * Get total finished projects
     * 
     * @param integer $user
     * @return integer
     */
    public function getTotalUserFinishedProject($user_id)
    {
        $finishedProject = Laporan_Instalasi::where('status', 'Selesai')->where('user_id', $user_id)->get()->count();
        return $finishedProject;
    }

    /**
     * Get all projects for particular user
     * 
     * @param integer $user
     * @return Laporan_Instalasi
     */
    public function getUserReports($id){
        $result = Laporan_Instalasi::where('user_id', $id)->Join('instansi', 'instansi.id_instansi', '=', 'laporan_instalasi.instansi_id')->get();
        return $result;
    }


    /**
     * Get all projects from all user
     * 
     * @param -
     * @return integer
     */
    public function getTotalProject()
    {
        $totalProjects = Laporan_Instalasi::all()->count();
        return $totalProjects;
    }
    /**
     * Get all projects from all user
     * 
     * @param -
     * @return integer
     */
    public function getTotalOnProgressProject()
    {
        $totalProjects = Laporan_Instalasi::where('status', 'Dalam Pengerjaan')->get()->count();
        return $totalProjects;
    }
    /**
     * Get all projects from all user
     * 
     * @param -
     * @return integer
     */
    public function getTotalFinishedProject()
    {
        $totalProjects = Laporan_Instalasi::where('status', 'Selesai')->get()->count();
        return $totalProjects;
    }
    public function getTotalComplaintProject()
    {
        //jangan lupa ntar diganti sama keluhan kalau udah selesai databse keluhannya
        $keluhan = Laporan_Keluhan::all()->count();
        return $keluhan;
    }
    

  
}
