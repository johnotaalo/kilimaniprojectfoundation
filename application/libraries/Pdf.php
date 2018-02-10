<?php

class Pdf{
    protected $mpdf;
    function __construct(){
        $config = ['format'  =>  'Legal', 
                    'margin_top' =>  10, 
                    'margin_bottom'  =>  10, 
                    'margin_left'  =>  0, 
                    'margin_right'   =>  0,
                    'margin_footer' =>  0,
                    'default_font' => 'taiheritage'];
        $this->mpdf = new \Mpdf\Mpdf($config);
    }

    function generate($content, $orientation = 'P', $type = null, $filename = ''){
        $this->mpdf->AddPage($orientation);

        $stylesheet = file_get_contents(ROOT_DIR . '/assets/custom/pdf.css');
        $this->mpdf->WriteHTML($stylesheet, 1);
        $this->mpdf->WriteHTML($content, 2);
        $this->mpdf->showImageErrors = true;
        $this->mpdf->debug = true;

        if($type != null){
            return $this->mpdf->Output($filename . '.pdf', $type);
        }else{
            return $this->mpdf->Output();
        }
    }
}