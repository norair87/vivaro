<?php 
/**


* 
*/
//namespace vivaro;
$site_1 = array('P1_1'=>$_POST['P1_1'],'PX_1'=>$_POST['X_1'],'P2_1'=>$_POST['P2_1']);
$site_2 = array('P1_2'=>$_POST['P1_2'],'PX_2'=>$_POST['X_2'],'P2_2'=>$_POST['P2_2']);

class calk{
    public $site1 = array();
    public $site2 = array();
    public $rate;
   

    function __construct($site1,$site2,$rate){
                     $this->site1=$site1;
                     $this->site2=$site2;   
                     $this->rate=$rate; 
    }
    /*vichislaet kaificent*/
    public function kaif($arrayName = array() )
                        {
$kaif = 0;
    foreach ( $arrayName as $key => $value) {
 
       $kaif+= 1/ $value;
   }
            return $kaif;
                             }
      public function kaif_rate($array){
         $array_rat=array();
        foreach ($array as $key => $value) {
        $kaif_rate=1/$value;
       
        array_push($array_rat,$kaif_rate);
        }
        return $array_rat;
      }
        /*тendkaificent*/
        /*test*/
        public function Test(){
          $this->kaif($this->site1);
          //var_dump($this->kaif($this->site1));
	if ($this->kaif($this->site1)<1) {
          
         return array($this->kaif($this->site1),$this->site1);
	}
	elseif ($this->kaif($this->site2)<1) 
                            {
                    return array($this->kaif($this->site2),$this->site2);
                      
                             } 
              else {
		            return false;
	                }
}
/*end test*/public function cheng_elements($k1,$k2,$i)
                            {
                             $r = $k1[$i];
                             $k1[$i] = $k2[$i];
                             $k2[$i] = $r;
                                 // return $k1;
                                  return array($k1,$k2);

                                }


public function full_test(){
   $key_1 = array_keys($this->site1);
    $key_2 = array_keys($this->site2);
    $val_1 = array_values($this->site1);
    $val_2 = array_values($this->site2);
    
    
  
    
 //return  $this->cheng_elements($key_1,$key_2,0);
  

    if($this->Test() == false){

      $key = $this->cheng_elements($key_1,$key_2,0); 
      $val = $this->cheng_elements($val_1,$val_2,0);
      $this->site1 = array_combine($key[0],$val[0]);
      $this->site2 = array_combine($key[1],$val[1]);
      // return 0;
              if ($this->Test() == false) {
                  $key = $this->cheng_elements($key_1,$key_2,1); 
                  $val = $this->cheng_elements($val_1,$val_2,1);     
                  $this->site1 = array_combine($key[0],$val[0]);
                  $this->site2 = array_combine($key[1],$val[1]);
                 //return $this->site2;
                                  if ($this->Test() == false) {
                                   $key = $this->cheng_elements($key_1,$key_2,2); 
                                   $val = $this->cheng_elements($val_1,$val_2,2);     
                                   $this->site1 = array_combine($key[0],$val[0]);
                                   $this->site2 = array_combine($key[1],$val[1]);
                                    
          if($this->Test() == false){
            return false;
          }
          else{
            return $this->Test();
          }
                                }
                               else{
                                      return $this->Test();              
                                }
               }
               else{
                    return $this->Test();              
                    }
    }else{
      return $this->Test();
    }

//return $this->site1;

 }
/*validator*/
    /*  public function validat_numeric($array){
        foreach ($array as $key => $value) {
          if(!is_numeric($array[$key])){
             return false;
               break;
          }
        }
        public function validats(){
             if (is_numeric($this->rate)){
                 if($this->validat_numeric($this->site1) == false){
                    return false;
                 }elseif ($this->validat_numeric($this->site2) == false) {
                   
                 }
             }



                         
        }
/*if is_numeric($this->rate)){

	if ($this->p1>0 && $this->x>0 && $this->p2>0 && $this->rate>0) {
               return true;
	             }
	             else{

                    return false;

	             }
}else{


	return false;
}

                   }
       */
            /*end validator*/
public function rate(){
  $rezult = $this->full_test();
  $kaif_average = $rezult[0];
  
if ($rezult!==false) {
  $key_end = array_keys($rezult[1]);
  $val_end = array_values($rezult[1]);
 	$p1_rate=$this->rate*$this->kaif_rate($this->full_test()[1])[0]/$kaif_average ;
  $p2_rate=$this->rate*$this->kaif_rate($this->full_test()[1])[1]/$kaif_average ;
  $x_rate=$this->rate*$this->kaif_rate($this->full_test()[1])[2]/$kaif_average ;
  $arr_rate = array();
array_push($arr_rate,$p1_rate,$x_rate,$p2_rate);
// $arr_rate= array_combine('p1' =>$p1_rate ,'p2' =>$p2_rate,'x' =>$x_rate);
  $arr_rate = array_combine($key_end,$arr_rate);
  return  $arr_rate ;
}else{
  return "каифицент болше 1";
}



}

}

 ?>
