<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed');}
function endpoint_write_vtech_ext($extEdit){
    global $db;
    $ext = endpoint_getExtensionAssignments();
    $model = endpoint_get_brand_models('vtech');
    foreach($ext as $key=>$value){
        if($value['ext'] == $extEdit){
            // eliminate name on custom extensions
            $temp = explode('-', $extEdit);
            if(!empty($temp[1])){
                $extEdit = $temp[0];
            }
            if($value['brand'] == 'Vtech'){
                $values = endpoint_configVariables($value, 'vtech', $model);

                $b = endpoint_get_brand_buttons($value['template'], 'vtech');
                foreach($b as $data){
                    $tModel = explode('_', $data['key']);
                    if($value['model'] == $tModel[0]){
                        $temp = explode('_', $data['key']);
                        if($temp[2] == 'type'){
                            $buttons[$temp[1]]['type'] = $data['value'];
                        }
                        if($temp[2] == 'value'){
                            $buttons[$temp[1]]['value'] = $data['value'];
                        }
                        if($temp[2] == 'acct'){
                            $buttons[$temp[1]]['acct'] = substr($data['value'], 7);
                        }
                    }
                }
                $i = 1;
                while($i <= 24){
                    if(empty($buttons[$i])){
                        $values['b' . $i . 'Type'] = 'unassigned';
                        $values['b' . $i . 'Acct'] = '1';
                    } else {
                        $values['b' . $i . 'Type'] = $buttons[$i]['type']; 
                        $values['b' . $i . 'Value'] = $buttons[$i]['value'];
                        if(empty($buttons[$i]['acct'])){
                            $values['b' . $i . 'Acct'] = '1';
                        } else {
                            $values['b' . $i . 'Acct'] = $buttons[$i]['acct'];
                        }
                    }
                    $i++;
                }


    //get basefile info
                $bf = endpoint_GetBasefile('vtech', 'phone', $value['model']);
                $custom = endpoint_BasefileTemplate($bf, $value['template']);

    //write out mac.cfg                
                $basefile = "";
                foreach($bf as $k=>$v){
                    if($v['template'] == 'default' || $v['template'] == $value['template']){
                        if($v['model'] == '' || strpos($v['model'],$value['model']) !==  false){
                            if(array_key_exists($v['define'], $custom) && $v['template'] == 'default'){	
                                //do nothing
                            } else {
                                $basefile .= $v['param'] . ' = ' . $v['value'] . "\n";
                            }
                        }
                    }
                }
                foreach($values as $k=>$v){
                    $basefile = str_replace('%' . $k . '%', $v, $basefile);
                }
				foreach($values as $k=>$v){
					$basefile = str_replace('%' . $k . '%', $v, $basefile);
				}
                $basefile = preg_replace('/(?<!\\\)\%.*(?!\\\)%/', '', $basefile);
                $basefile = preg_replace('/\\\%/', '', $basefile);

                $value['mac'] = strtoupper($value['mac']);
                $fileloc = '/tftpboot/' . $value['model'] . '_' . $value['mac'] . '.cfg';
                file_put_contents($fileloc, $basefile);
                $chmods = system("/bin/chmod 755 " . $fileloc, $retval);
            }
        }
    }
}
?>