<?php

namespace App\Http\Controllers;




use Illuminate\Support\Facades\DB;

class HackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //Al wrote this to lookup the part number from IFS
        $query = " SELECT * FROM

(select 
cc.cust_code,
cc.description,
cc.cc_part,
case when sq_4.alt_code is null then sq_2.catalog_no else sq_4.alt_code end part_no

--sq_2.catalog_no,
--sq_2.customer_part_no,
--sq_2.alt_code,
--sq_2.part_no_space,

--sq_3.alt_code,
--sq_3.part_no_space,
--sq_4.alt_code,
--sq_4.part_no_space


from ifsinfo.all007_cust_code_tab cc
left outer join (select * from ifsapp.sales_part_cross_reference spc where spc.customer_no = 'ALL070') sq_2
on cc.cust_code = sq_2.customer_part_no
left outer join (select distinct spc.catalog_no alt_code ,replace(spc.catalog_no,' ','') part_no_space from ifsapp.sales_part_cross_reference spc where spc.customer_no = 'ALL070') sq_2
on cc.cc_part = sq_2.part_no_space
left outer join (select distinct spc.catalog_no alt_code ,replace(spc.catalog_no,' ','') part_no_space from ifsapp.sales_part_cross_reference spc where spc.customer_no = 'ALL070') sq_3
on replace(cc.cc_part,' ','') = sq_3.part_no_space
left outer join (select part_no alt_code , replace(part_no,' ','') part_no_space from ifsapp.sales_part where contract = 'DO') sq_4
on replace(cc.cc_part,' ','') = sq_4.part_no_space
)

WHERE part_no = '";


        //get all files in directory

        //dd(getcwd());

        $directory = '/u10/html/hacks/files/rename';

        /*$files = File::allFiles($directory);
        foreach ($files as $file)
        {
            echo (string)$file, "\n";
        }*/


        if ($handle = opendir($directory)) {
            while (false !== ($fileName = readdir($handle))) {Nchurch
                $SQL = $query;
                if ($fileName != "." AND $fileName != "..") {

                    $SQL .=   substr($fileName,0,-4) . "'";

                    //lookup in oracle - to get the new filename
                    $conOracle = DB::connection('oracle');
                    $results = $conOracle->select($SQL);


                    if(count($results)) {
                        $fileName = $directory . "/" . $fileName;
                        $newName = $directory . "/" . $results[0]->cust_code . ".jpg";
                        copy($fileName, $newName);
                    }


                }

            }
            closedir($handle);
        }


        //loop through


        //rename


    }
}