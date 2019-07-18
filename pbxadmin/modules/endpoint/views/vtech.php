<?php
// this file is for creating and editing audiocodes templates
$brand = 'vtech';
$Brand = 'Vtech';
if(!isset($template['template_name'])){$template['template_name'] = '';}
echo endpoint_templatesView($brand);

if($new==1 || $template['template_name']!= ''){
echo endpoint_brandView($brand, $template, $new);

$table = new CI_Table();
//Phone models
echo '<br />Available Phones<br />';
$res = endpoint_get_brand_models($brand, 'phone');
$b = endpoint_get_brand_buttons($template, $brand);
if(!empty($b)){
    foreach($b as $k=>$v){
        $buttons[$v['key']] = $v['value'];
    }
}
foreach($res as $modellist=>$value) {
    $models[$value['model']] = array('prgkey'=>$value['prgkey']);
}        
foreach($models as $k=>$v) {
    $check = '';
    if(isset($buttons[$k])){
        $check = ($buttons[$k] == '1' ? "checked" : "");
    }
    $checkboxes[] = '<input type="checkbox" id="phone_models' . $k . '" name="' . $k . '" value="1" ' . $check . '>' . '<label for="phone_models' . $k . '">' . $k . '</label>';
}
        
echo '<span class="radioset ui-buttonset">';
$chk = $table->make_columns($checkboxes, '6');
echo $table->generate($chk);
echo '</span>';
$table->clear();
$label = '';
$value = '';
$buttonTypes = endpoint_Get_Phone_Types($brand);
foreach($models as $k=>$v){
    $class = 'class="hidden-fields"';
    if(isset($buttons[$k])){
        $class = ($buttons[$k] == '1' ? '' : 'class="hidden-fields"');
    }
    echo '<div id="' . $k . '" ' . $class . '>';
    echo '<fieldset style="width:540px;"><legend>' . $Brand . ' ' . $k . '</legend><br />';
    $b = 1;
    $order = '';
    if($v['prgkey'] > 0){echo '<div class="key_head">Programmable Keys</div><ul id="sortable" class="sortableEndpoint ui-menu ui-widget ui-widget-content ui-corner-all ui-sortable">';}
    while($b <= $v['prgkey']){
        $acct = endpoint_accounts($k, $res);
        $acct .= '<option value="0">Auto</option>';
        $order .= $k . '_' . $b . ',';
        
        $value = '';
        $options = '<option value=""></option>';
        foreach($buttonTypes as $keyName=>$keyValue){
            $options .= '<option value="' . $keyValue . '" ' . (isset($buttons[$k . '_' . $b . '_type']) && $buttons[$k . '_' . $b . '_type'] == $keyValue ?"selected":"") . '>' . preg_replace('/_/', ' ', $keyName) . '</option>';
        }
               
        //if(isset($buttons[$k . '_' . $b . '_label'])){$label = $buttons[$k . '_' . $b . '_label'];} else {$label = '';}
        if(isset($buttons[$k . '_' . $b . '_value'])){$value = htmlspecialchars($buttons[$k . '_' . $b . '_value']);} else {$value = '';}
        if(isset($buttons[$k . '_' . $b . '_acct'])){$acctS = '<option value="' . $buttons[$k . '_' . $b . '_acct'] . '" selected>' . $buttons[$k . '_' . $b . '_acct'] . '</option>';} else {$acctS = '<option value="" selected>Auto</option>';}
        if(isset($buttons[$k . '_' . $b . '_type'])){$btype = $buttons[$k . '_' . $b . '_type'];} else {$btype = '';}
		
        echo '<li id="'.$k.'_'.$b.'">';
        echo 'Programmable Key ' . $b . '<br />';
        echo '<a href="#" class="info" tabindex="-1">Type:<span>Type of button.</span></a>
        <select class="type" name="' . $k . '_' . $b . '_type"> ' . $options . '</select>
        &nbsp;&nbsp;&nbsp;';
        echo '&nbsp;&nbsp;&nbsp;<a href="#" class="info" tabindex="-1">Value:<span>Value for the button.</span></a>
            <input name="' . $k . '_' . $b . '_value" value="' . $value . '">';
        echo '<a href="#" class="info" tabindex="-1">Account:<span>Account the button should use (default is blank).</span></a><select name="' . $k . '_' . $b . '_acct">' . $acct . $acctS . '</select>';
        $b++;
        echo '<br /><br /></li>';
    }
    echo '</ul>';
// added for ordering        
    echo '<br />';
    if(empty($order)){$order .= $k . '_1,';}
    echo '<div id="' . $k . '_order" ><input type="hidden" name="'. $k . '_order" value="' . $order . '" size="100"></div></fieldset></div>';
}
echo '<br /><br />';
echo '<input type="hidden" name="action" value="save_' . $brand . '_template">'
	 . '<input type="submit" />'
	 . '</form><br /><br />';
}