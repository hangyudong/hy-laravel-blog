<?php

namespace App\Http\Controllers\Excel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;

class ExcelController extends Controller
{
    //Excel的导入
    public function ExcelImport()
    {
        $filePath = '/upload/'.iconv('UTF-8', 'GBK', 'student').'.xls';
        Excel::load($filePath, function($reader) {
            $data = $reader->get();
            dd($data);
        });
    }
    
    //Excel的导出
    public function ExcelExport()
    {
        $cellData = [
            ['学生编号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create(iconv('UTF-8', 'GBK', '学生成绩'),function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('csv');
    }
}
