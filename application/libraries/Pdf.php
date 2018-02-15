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
                    'default_font' => 'taiheritage',
                'debug' =>  false];
        // $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        // $fontDirs = $defaultConfig['fontDir'];
        
        // $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        // $fontData = $defaultFontConfig['fontdata'];

        // $config['fontDir'] = str_replace('/', '\\', str_replace('\\', '/', ROOT_DIR) . "/assets/fonts/");
        // $config['fontdata'] = [
        //     'open_sans'     =>  [
        //         'R'     =>  'open-sans\OpenSans-Regular.ttf',
        //         'I'     =>  'open-sans\OpenSans-Italic.ttf',
        //         'B'     =>  'open-sans\OpenSans-Bold.ttf',
        //         'BI'    =>  'open-sans\OpenSans-BoldItalic.ttf',
        //     ],
        //     'kenyan_coffee' =>  [
        //         'R'     =>  'kenyan_coffee\kenyan coffee rg.ttf',
        //         'I'     =>  'kenyan_coffee\kenyan coffee rg it.ttf',
        //         'B'     =>  'kenyan_coffee\kenyan coffee bd.ttf',
        //         'BI'    =>  'kenyan_coffee\kenyan coffee bd it.ttf'
        //     ],
        //     'lato'          =>  [
        //         'R'     =>  'lato\Lato-Regular.ttf',
        //         'I'     =>  'lato\Lato-Italic.ttf',
        //         'B'     =>  'lato\Lato-Bold.ttf',
        //         'BI'    =>  'lato\Lato-BoldItalic.ttf',
        //     ],

        // ];

        // $config['default_font'] = 'lato';

        // echo "<pre>";print_r($config);die;
        
        // echo "<pre>";print_r($fontData);die;
        $this->mpdf = new \Mpdf\Mpdf($config);
    }

    function generate($content, $orientation = 'P', $type = null, $filename = ''){
        $this->mpdf->AddPage($orientation);

        $stylesheet = file_get_contents(ROOT_DIR . '/assets/custom/pdf.css');
        $this->mpdf->WriteHTML($stylesheet, 1);
        $this->mpdf->WriteHTML($content, 2);
        $this->mpdf->showImageErrors = true;
        $this->mpdf->debug = true;

        $download_type = "";

        switch($type){
            case "S":
            case "s":
                $download_type = \Mpdf\Output\Destination::STRING_RETURN;
                break;
            case "F":
            case "f":
                $download_type = \Mpdf\Output\Destination::FILE;
                break;
            case "D":
            case "d":
                $download_type = \Mpdf\Output\Destination::DOWNLOAD;
                break;
            case "I":
            case "i":
                $download_type = \Mpdf\Output\Destination::INLINE;
                break;
            default:
                $download_type = \Mpdf\Output\Destination::DOWNLOAD;
                break;
        }

        if($type != null){
            return $this->mpdf->Output($filename . '.pdf', $download_type);
        }else{
            return $this->mpdf->Output();
        }
    }
}