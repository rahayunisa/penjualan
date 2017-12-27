<?php 

    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }
    

    function tanpa_konversi_hari_bulan()
    {
        $tgl_skrg = mktime(0,0,0, date("m")+5, date("d")+5,date("Y"));
        echo date("l",$tgl_skrg).",".date("d",$tgl_skrg)."-".date("F",$tgl_skrg)."-".date("Y",$tgl_skrg);
        echo"<br><br>";
    }

    function konversi_hari_bulan()
    {
        $tgl_skrg = mktime(0,0,0, date("m")+5, date("d")+5,date("Y"));
        
        switch(date("l", $tgl_skrg))
        {
            case 'Monday':      $nmh="Senin";       break; 
            case 'Tuesday':     $nmh="Selasa";      break; 
            case 'Wednesday':   $nmh="Rabu";        break; 
            case 'Thursday':    $nmh="Kamis";       break; 
            case 'Friday':      $nmh="Jum'at";      break; 
            case 'Saturday':    $nmh="Sabtu";       break; 
            case 'Sunday':      $nmh="minggu";      break; 
        }
        switch(date("F", $tgl_skrg))
        {
            case 'January':     $nmb="Januari";     break; 
            case 'February':    $nmb="Februari";    break; 
            case 'March':       $nmb="Maret";       break; 
            case 'April':       $nmb="April";       break; 
            case 'May':         $nmb="Mei";         break; 
            case 'June':        $nmb="Juni";        break; 
            case 'July':        $nmb="Juli";        break;
            case 'August':      $nmb="Agustus";     break;
            case 'September':   $nmb="September";   break;
            case 'October':     $nmb="Oktober";     break;
            case 'November':    $nmb="November";    break;
            case 'Desember':    $nmb="Desember";    break;
            
        }
        echo $nmh.",".date("d",$tgl_skrg)."-"."$nmb"."-".date("Y",$tgl_skrg);
        echo"<br>";
        
}
 
 
    ?>