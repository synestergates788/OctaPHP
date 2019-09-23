<?php

class Routes{

    protected $Controllers;
    protected $Actions = 'index';
    protected $Params = [];
    protected $Router;

    public function __construct($Router,$Routes,$RoutesDir,$Error404){
        $this->routes($Router,$Routes,$RoutesDir,$Error404);
    }

    public function routes($Router,$Routes,$RoutesDir,$Error404){
        $this->Router = $Router;
        $Request = trim($_SERVER['REQUEST_URI'], "/");
        $Url = explode('/', $Request);
        $Segment1 = (isset($Url[1])) ? $Url[1] : '';
        $Segment2 = (isset($Url[2])) ? $Url[2] : '';
        $Segment3 = (isset($Url[3])) ? $Url[3] : '';
        $Segment4 = (isset($Url[4])) ? $Url[4] : '';

        $GLOBALS['Segment1'] = $Segment1;
        $GLOBALS['Segment2'] = $Segment2;
        $GLOBALS['Segment3'] = $Segment3;
        $GLOBALS['Segment4'] = $Segment4;

        $RequestedUrl = '';
        if(isset($Url[1])){
            $RequestedUrl .= '/'.$Segment1;
        }

        if(isset($Url[2])){
            $RequestedUrl .= '/'.$Segment2;
        }

        if(isset($Url[3])){
            $RequestedUrl .= '/'.$Segment3;
        }

        if(isset($Url[4])){
            $RequestedUrl .= '/'.$Segment4;
        }

        $GLOBALS['Routes'] = $Routes;
        /*overwriting default controller if null*/
        if($GLOBALS['Routes'][''] == null && $GLOBALS['Routes'][''] == ""){
            $GLOBALS['Routes'][''] = DefaultControllerDir.DS.DefaultControllerCtlr;

        }
        if($GLOBALS['Routes']['/'] == null && $GLOBALS['Routes']['/'] == ""){
            $GLOBALS['Routes']['/'] = DefaultControllerDir.DS.DefaultControllerCtlr;
        }
        /*end of overwriting default controller if null*/

        #echo '<pre>';
        #print_r($GLOBALS['RoutesDir']);
        #print_r($GLOBALS['Routes']);
        #echo '</pre>';
        #exit;

        $GLOBALS['Error404'] = $Error404;
        $GLOBALS['RoutesDir'] = $RoutesDir;
        $GLOBALS['RequestedUrl'] = $RequestedUrl;
        $GLOBALS['ClassMethod'] = isset($Url[3]) ? $Url[3] : 'index';
        $GLOBALS['UrlSegment1'] = isset($Url[1]) ? true : false;


        $GLOBALS['RDir'] = [];
        if($RoutesDir){
            foreach($RoutesDir as $key=>$comp_dir){
                array_push($GLOBALS['RDir'],$key);
            }
        }

        $this->Router->match('GET|POST', $RequestedUrl, function() {

            $TmpMethodRequest = trim($GLOBALS['RequestedUrl'], "/");
            $MethodRequest = explode('/', $TmpMethodRequest);
            $ThisMethodRequest = '';
            if(isset($MethodRequest[0])){
                $ThisMethodRequest .= '/'.$MethodRequest[0];
            }

            if(isset($MethodRequest[1])){
                $ThisMethodRequest .= '/'.$MethodRequest[1];
            }

            /*
             * this was the original routes allocator
             * if(array_key_exists($ThisMethodRequest, $GLOBALS['RoutesDir'])){
             * */
            if(in_array($ThisMethodRequest, $GLOBALS['RDir'])){

                if($GLOBALS['UrlSegment1'] == true){
                    $GetControllerFile = $GLOBALS['Routes']['/'.$GLOBALS['Segment1'].'/'.$GLOBALS['Segment2'].'/([a-z0-9_-]+)?/([a-z0-9_-]+)?'];
                    $UrlArray = explode(DS,$GetControllerFile);
                    $TmpControllerFile = end($UrlArray);
                    $ControllerFile = str_replace(".php","",$TmpControllerFile);

                    $DirInt = count($UrlArray) - 2;
                    $ControllerDir = $UrlArray[$DirInt];
                    $ClassFile = 'Application\\Controllers\\'.$ControllerDir.'\\'.$ControllerFile;

                    $this->Controllers = new $ClassFile;
                    $this->Actions = $GLOBALS['ClassMethod'];
                    $this->Params = !empty($Url) ? array_values($Url) : [];

                }else{
                    $GetControllerFile = $GLOBALS['Routes']['/'];
                    $UrlArray = explode(DS,$GetControllerFile);
                    $TmpControllerFile = end($UrlArray);
                    $ControllerFile = str_replace(".php","",$TmpControllerFile);

                    $this->Controllers = new $ControllerFile;
                    $this->Actions = $GLOBALS['ClassMethod'];
                    $this->Params = !empty($Url) ? array_values($Url) : [];
                }

                if(method_exists($this->Controllers, $this->Actions)){
                    call_user_func_array([$this->Controllers, $this->Actions],$this->Params);

                }else{
                    include_once ROOT.DS.'Application'.DS.'Views'.DS.'ErrorPage'.DS.'ErrorMethods.php';
                }

            }else{
                include_once $GLOBALS['Error404'];
            }
        });

        $this->Router->run();
    }
}