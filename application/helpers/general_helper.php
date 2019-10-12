<?php
     if (! defined('BASEPATH')) exit('No direct script access allowed');
 
     if (! function_exists('count_content')) {
         function count_content($table,$where=null,$value=null)
         {
             // get main CodeIgniter object
             $ci = get_instance();

             // Write your logic as per requirement
             if($where){
                 $ci->db->where($where,$value);
             }

             $val = $ci->db->get($table)->num_rows();

             if($val == 0){
                 return '-';
             } else {
                 return $val;
             }
         }
     }

     if (! function_exists('count_age')) {
        function count_age($age)
        {
            // get main CodeIgniter object
            $ci = get_instance();

            // Write your logic as per requirement
            $val = $ci->db->get('tbl_penduduk')->result();
            $cur = date('Y');
            $a0 = 0;
            $a17 = 0;
            $a35 = 0;
            $a56 = 0;
            foreach ($val as $key) {
                $tahun = explode('-',$key->tgl_lahir)[0];
                $usia = $cur - $tahun;
                if($usia < 18){
                    $a0++;
                }elseif($usia < 36){
                    $a17++;
                }elseif($usia < 56){
                    $a35++;
                }else{
                    $a56++;
                }
            }
            
            if($age == 1){
                if($a0 == 0){
                    return '-';
                }else{
                    return $a0;
                }
            }elseif($age == 2){
                if($a17 == 0){
                    return '-';
                }else{
                    return $a17;
                }
            }elseif($age == 3){
                if($a35 == 0){
                    return '-';
                }else{
                    return $a35;
                }
            }elseif($age == 4){
                if($a56 == 0){
                    return '-';
                }else{
                    return $a56;
                }
            };

            
        }
    }