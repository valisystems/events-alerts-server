<?php

function endpoint_gs1450($base){
$cfg = '<?xml version="1.0" encoding="UTF-8"?>
<Screen>
  <LeftStatusBar>
    <Layout width="57">
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/account_s_bg.bmp</Bitmap>
        <X>0</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>0</X>
        <Y>3</Y>
      </DisplayList>
    </Layout>
    <Account height="21">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/account_line_bg.bmp</Bitmap>
          <X>4</X>
          <Y>0</Y>
        </DisplayBitmap>
        <DisplayRectangle x="1" y="0" width="4" height="19" bgcolor="Light6"></DisplayRectangle>
        <DisplayBitmap isfile="true" renew-rate="second" isrenew="true">
          <Bitmap>/app/resource/etc/account_r.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" renew-rate="second">
          <Bitmap>/app/resource/etc/account_nr.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>

      </DisplayElement>

      <DisplayElement>
        <DisplayString font="unifont" color="Black" bgcolor="Light5" height="16" width="48" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>6</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font="unifont" width="48" height="16" color="Light2" bgcolor="Light5" shadow-color="White" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>6</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>

      </DisplayElement>

      <DisplayElement>
        <DisplayBitmap isfile="true" bgcolor="Light6" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm1.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm2.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5" >
          <Bitmap>/app/resource/icon/im1.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" >
          <Bitmap>/app/resource/icon/im2.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5" >
          <Bitmap>/app/resource/icon/im_vm1.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" >
          <Bitmap>/app/resource/icon/im_vm2.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>

      </DisplayElement>

    </Account>
  </LeftStatusBar>

  <SoftkeyBar>
    <Layout height="15">
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/softkey_bg.bmp</Bitmap>
        <X>0</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>2</X>
        <Y>2</Y>
      </DisplayList>

    </Layout>
    <ButtonShape id="0" width="59" height="14">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_b.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="White" bgcolor="Black" width="54" height="11">
          <DisplayStr>$A</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>
    <ButtonShape id="1" width="59" >
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_w.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="Black" bgcolor="White" width="54" height="11">
          <DisplayStr>$A</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>

  </SoftkeyBar>


  <IdleScreen>

    <ShowStatusLine>true</ShowStatusLine>

    <!-- frame -->
    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="123" height="11" bgcolor="White" fgcolor="Light6"></DisplayRectangle>
      <DisplayRectangle x="0" y="11" width="123" height="1" bgcolor="Light4" ></DisplayRectangle>
    </DisplayElement>

    <!-- should remove in future -->
    <DisplayBitmap isfile="true" >
      <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
      <X>91</X>
      <Y>12</Y>
    </DisplayBitmap>
    <!-- Top bar content -->
    <DisplayElement>
      <DisplayString font="unifont" width="70" bgcolor="Light6" fgcolor="White" height="12">
        <DisplayStr>$f</DisplayStr>
        <X>1</X>
        <Y>-1</Y>
      </DisplayString>
      <DisplayString font="unifont" halign="right" width="50" bgcolor="White" fgcolor="Light6" height="12">
        <DisplayStr>$T</DisplayStr>
        <X>72</X>
        <Y>-1</Y>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
	
	  <!-- COMPANY LOGO -->
<DisplayBitmap isfile="false">
	<Bitmap>';
$cfg .= $base;
$cfg .= '</Bitmap>
 	<X>10</X>
    	<Y>16</Y>
</DisplayBitmap>
    </DisplayElement>
    <DisplayElement>

      <!-- Forward Call Log -->
      <DisplayString font="unifont" color="Dark3" width="105" halign="center" bgcolor="White">
        <DisplayStr>$j</DisplayStr>
        <X>0</X>
        <Y>30</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayString>
      <!-- Miss call -->
      <DisplayString font="unifont" color="Dark3" width="105" halign="center" bgcolor="White">
        <DisplayStr>$c</DisplayStr>
        <X>0</X>
        <Y>30</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>

      <!-- 5V Error -->
      <DisplayString font="unifont" halign="center"  color="Dark3" width="105"  bgcolor="White">
        <DisplayStr>$v</DisplayStr>
        <X>0</X>
        <Y>30</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayString>

      <!-- core dump -->
      <DisplayString font="unifont" halign="center"  color="Dark3" width="105"  bgcolor="White">
        <DisplayStr>$+1512</DisplayStr>
        <X>0</X>
        <Y>30</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>


    <DisplayElement>
      <!-- WRITING -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/icon_save.bmp</Bitmap>
        <X>107</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>writing</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- DND -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
        <X>107</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
        <X>107</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- NETWORK DOWN -->
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
        <X>107</X>
        <Y>12</Y>
        <displayCondition negate = "true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
        <X>107</X>
        <Y>12</Y>
        <displayCondition negate = "true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>

      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>107</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- CALL FORWARDED -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
        <X>107</X>
        <Y>28</Y>
        <displayCondition>
          <conditionType>delayedFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
        <X>107</X>
        <Y>28</Y>
        <displayCondition>
          <conditionType>busyFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
        <X>107</X>
        <Y>28</Y>
        <displayCondition>
          <conditionType>busyNoAnswerFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
        <X>107</X>
        <Y>28</Y>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>

      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>107</X>
        <Y>28</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- Headset -->
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
        <X>91</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>headsetMode</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>91</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
        <X>107</X>
        <Y>28</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- KeypadLock -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/lock_g.bmp</Bitmap>
        <X>107</X>
        <Y>28</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>

    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_1450/screen1.bmp</Icon> -->
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <XmlService/>
        </Action>
        <displayCondition>
          <conditionType>XmlApp</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignIn/>
        </Action>
        <displayCondition>
          <conditionType>signIn</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignOut/>
        </Action>
        <displayCondition>
          <conditionType>signOut</conditionType>
        </displayCondition>
      </SoftKey>

      <SoftKey>
        <Action>
          <BackSpace/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CANCEL/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <MissedCalls/>
        </Action>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdedCalls/>
        </Action>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdAll/>
        </Action>
        <displayCondition>
          <conditionType>callFwdCancelled</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CancelFwd/>
        </Action>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Redial/>
        </Action>
        <displayCondition>
          <conditionType>hasDialedCalllog</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>weatherShow</ScreenShow>

    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <!-- frame -->
      <DisplayRectangle x="0" y="0" width="179" height="15" bgcolor="Black" fgcolor="Dark3" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark3">
        <DisplayStr>$L, $S, $g</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>


    <DisplayBitmap isfile="true" isrenew="true">
      <Bitmap>/tmp/weather.bmp</Bitmap>
      <X>2</X>
      <Y>16</Y>
    </DisplayBitmap>
    <DisplayString font="unifont" color="Dark3">
      <DisplayStr>$w, $x%</DisplayStr>
      <X>33</X>
      <Y>16</Y>
      <displayCondition>
        <conditionType>alwaysDisplay</conditionType>
      </displayCondition>
    </DisplayString>
    <DisplayString font="unifont" color="Dark3">
      <DisplayStr>$0t</DisplayStr>
      <X>33</X>
      <Y>30</Y>
      <displayCondition>
        <conditionType>alwaysDisplay</conditionType>
      </displayCondition>
    </DisplayString>



    <SoftKeys>
      <SoftKey useshapeid="1">
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_1450/screen2.bmp</Icon>-->
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>

    </SoftKeys>
  </IdleScreen>


</Screen>';

return($cfg);
}

function endpoint_gs1405($base){
    $cfg = '<?xml version="1.0" encoding="UTF-8"?>
<Screen>
  <SoftkeyBar>
    <Layout height="13" >
      <DisplayList>
        <X>0</X>
        <Y>0</Y>
      </DisplayList>
    </Layout>
    <ButtonShape id="0" width="43" height="13">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_b.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="White" bgcolor="Black" width="39" height="11">
          <DisplayStr>$A</DisplayStr>
          <X>1</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>
  </SoftkeyBar>

  <IdleScreen>

    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <DisplayString font="unifont" width="70" height="12">
        <DisplayStr>$f</DisplayStr>
        <X>0</X>
        <Y>0</Y>
      </DisplayString>
      <DisplayString font="unifont" halign="right" width="50" height="12">
        <DisplayStr>$T</DisplayStr>
        <X>77</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
	
	<!-- COMPANY NAME  -->
      <DisplayBitmap isfile="false">
	<Bitmap>' . $base . '</Bitmap>
 	<X>10</X>
    	<Y>16</Y>
</DisplayBitmap>

    </DisplayElement>
	
    <!-- forwarded call msg -->
    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$j</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/misscall_13.bmp</Bitmap>
        <X>6</X>
        <Y>13</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- TEXT CONTENTS -->
      <DisplayString font="unifont" width="102" bgcolor="White">
        <DisplayStr>$c</DisplayStr>
        <X>25</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$+1226</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- 5V Error -->
    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$v</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
      <!-- core dump -->
      <DisplayString font="unifont" halign="center" width="128"  bgcolor="White">
        <DisplayStr>$+1512</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayString>
      <!-- NEW IM Messsages -->
      <DisplayString font="unifont" halign="center" width="128"  bgcolor="White">
        <DisplayStr>$+1539</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>hasIM</conditionType>
        </displayCondition>
      </DisplayString>
    
    <!-- KeypadLock -->
    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$k</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>


    <SoftKeys>
      <SoftKey>        
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <XmlService/>
        </Action>
        <displayCondition>
          <conditionType>XmlApp</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <VoiceMail/>
        </Action>
        <!--<displayCondition>
          <conditionType>hasVoiceMail</conditionType>
        </displayCondition>-->
      </SoftKey>
      <SoftKey>
        <Action>
          <SignIn/>
        </Action>
        <displayCondition>
          <conditionType>signIn</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignOut/>
        </Action>
        <displayCondition>
          <conditionType>signOut</conditionType>
        </displayCondition>
      </SoftKey>

      <SoftKey>
        <Action>
          <BackSpace/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CANCEL/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <MissedCalls/>
        </Action>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdedCalls/>
        </Action>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdAll/>
        </Action>
        <displayCondition>
          <conditionType>callFwdCancelled</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CancelFwd/>
        </Action>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Redial/>
        </Action>
        <displayCondition>
          <conditionType>hasDialedCalllog</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>weatherShow</ScreenShow>

    <ShowStatusLine>false</ShowStatusLine>



    <!-- LINE -->


    <DisplayString font="unifont">
      <DisplayStr>$L, $S, $g</DisplayStr>
      <X>2</X>
      <Y>-2</Y>
    </DisplayString>
    <DisplayString font="unifont">
      <DisplayStr>$w, $0t</DisplayStr>
      <X>2</X>
      <Y>13</Y>
    </DisplayString>

    <SoftKeys>
      <SoftKey>
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_1450/screen2.bmp</Icon>-->
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>


  <IdleScreen>

    <ShowStatusLine>false</ShowStatusLine>
    <!-- LINE -->
    <!--<DisplayString font="unifont">
            <DisplayStr>Firmware: $v</DisplayStr>
            <X>2</X>
            <Y>-2</Y>
        </DisplayString>-->
    <DisplayString>
      <DisplayStr>$I</DisplayStr>
      <X>2</X>
      <Y>13</Y>
    </DisplayString>
    <SoftKeys>
      <SoftKey>
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_1450/screen2.bmp</Icon>-->
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>

    </SoftKeys>
  </IdleScreen>
</Screen>';
    return($cfg);
}

function endpoint_gs116x($base){
    $cfg .= '<?xml version="1.0" encoding="UTF-8"?>
<Screen>

  <IdleScreen>
    <ShowStatusLine>false</ShowStatusLine>
    <DisplayElement>
      <DisplayString font="unifont" width="70" height="12">
        <DisplayStr>$f</DisplayStr>
        <X>0</X>
        <Y>0</Y>
      </DisplayString>
      <DisplayString font="unifont" halign="right" width="50" height="12">
        <DisplayStr>$T</DisplayStr>
        <X>77</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>
    <!-- LOGO -->
    <DisplayElement>
	<!-- COMPANY NAME -->
      <DisplayBitmap isfile="false">
	<Bitmap>' . $base . '</Bitmap>
 	<X>0</X>
    	<Y>12</Y>
      </DisplayBitmap>
    </DisplayElement>
    <!-- forwarded call msg -->
    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$j</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/misscall_13.bmp</Bitmap>
        <X>6</X>
        <Y>13</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- TEXT CONTENTS -->
      <DisplayString font="unifont" width="102" bgcolor="White">
        <DisplayStr>$c</DisplayStr>
        <X>25</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$+1226</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
    <!-- 5V Error -->
    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$v</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
      <!-- core dump -->
      <DisplayString font="unifont" halign="center" width="128"  bgcolor="White">
        <DisplayStr>$+1512</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayString>
      <!-- NEW IM Messsages -->
      <DisplayString font="unifont" halign="center" width="128"  bgcolor="White">
        <DisplayStr>$+1539</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>hasIM</conditionType>
        </displayCondition>
      </DisplayString>
    <!-- KeypadLock -->
    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="128" bgcolor="White">
        <DisplayStr>$k</DisplayStr>
        <X>0</X>
        <Y>12</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
    <SoftKeys>
      <SoftKey>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Headset/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <BSCallCenter/>
        </Action>
        <displayCondition>
          <conditionType>bsCallCenter</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CallCenter/>
        </Action>
        <displayCondition>
          <conditionType>publishCallCenter</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <XmlService/>
        </Action>
        <displayCondition>
          <conditionType>XmlApp</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignIn/>
        </Action>
        <displayCondition>
          <conditionType>signIn</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignOut/>
        </Action>
        <displayCondition>
          <conditionType>signOut</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <BackSpace/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CANCEL/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <MissedCalls/>
        </Action>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdedCalls/>
        </Action>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdAll/>
        </Action>
        <displayCondition>
          <conditionType>callFwdCancelled</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CancelFwd/>
        </Action>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <LDAP/>
        </Action>
        <displayCondition>
          <conditionType>LDAPConfigured</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CallParked/>
        </Action>
        <displayCondition>
          <conditionType>hasBWCallParks</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Redial/>
        </Action>
        <displayCondition>
          <conditionType>hasDialedCalllog</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>weatherShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>
    <!-- LINE -->
    <DisplayString font="unifont">
      <DisplayStr>$L, $S, $g</DisplayStr>
      <X>2</X>
      <Y>-2</Y>
    </DisplayString>
    <DisplayString font="unifont">
      <DisplayStr>$w, $0t</DisplayStr>
      <X>2</X>
      <Y>13</Y>
    </DisplayString>
    <SoftKeys>
      <SoftKey>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Headset/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ShowStatusLine>false</ShowStatusLine>
        <DisplayString>
      <DisplayStr>$I</DisplayStr>
      <X>2</X>
      <Y>13</Y>
    </DisplayString>
    <SoftKeys>
      <SoftKey>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Headset/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ShowStatusLine>false</ShowStatusLine>
    <DisplayString>
      <DisplayStr>Extension Number:</DisplayStr>
      <X>2</X>
      <Y>0</Y>
    </DisplayString>
    <DisplayString>
      <DisplayStr>$-O</DisplayStr>
      <X>2</X>
      <Y>13</Y>
    </DisplayString>
    <SoftKeys>
      <SoftKey>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Headset/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

</Screen>
';
return($cfg);
}

function endpoint_gs2110($base){
    $cfg = '<?xml version="1.0" encoding="UTF-8"?>
<Screen>
  <LeftStatusBar>
    <Layout width="57">
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/account_s_bg.bmp</Bitmap>
        <X>0</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayAccountList>
        <X>0</X>
        <Y>1</Y>
      </DisplayAccountList>
    </Layout>
    <Account height="25">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/account_line_bg.bmp</Bitmap>
          <X>6</X>
          <Y>0</Y>
        </DisplayBitmap>
        <DisplayRectangle x="1" y="0" width="6" height="23" bgcolor="Light6"></DisplayRectangle>
        <DisplayBitmap isfile="true" renew-rate="second" isrenew="true">
          <Bitmap>/app/resource/etc/account_r.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" renew-rate="second">
          <Bitmap>/app/resource/etc/account_nr.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>
      </DisplayElement>
      <!-- Account Name -->
      <DisplayElement>
        <DisplayString font="unifont" color="Black" bgcolor="Light5" height="16" width="46" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>8</X>
          <Y>3</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>
        <DisplayString font="unifont" width="46" height="16" color="Light2" bgcolor="Light5" shadow-color="White" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>8</X>
          <Y>3</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>
      </DisplayElement>
      
      <!-- Accont Icons -->
      <DisplayElement>
        <DisplayBitmap isfile="true" bgcolor="Light5" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm2.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm1.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5">
          <Bitmap>/app/resource/icon/im1.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" renew-rate="minute">
          <Bitmap>/app/resource/icon/im2.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5">
          <Bitmap>/app/resource/icon/im_vm1.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None">
          <Bitmap>/app/resource/icon/im_vm2.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
      </DisplayElement>
    </Account>
  </LeftStatusBar>
  <SoftkeyBar>
    <Layout height="22" >
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/softkey_bg.bmp</Bitmap>
        <X>0</X>
        <Y>1</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>2</X>
        <Y>4</Y>
      </DisplayList>

    </Layout>
    <ButtonShape id="0" width="79" height="17">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_b.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="White" bgcolor="Black" width="75">
          <DisplayStr>$A</DisplayStr>
          <X>0</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>
    <ButtonShape id="1" width="79" >
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_w.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="left" color="Black" bgcolor="White" width="70">
          <DisplayStr>$A</DisplayStr>
          <X>0</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>

  </SoftkeyBar>


  <IdleScreen>

    <ShowStatusLine>true</ShowStatusLine>

    <!-- frame -->
    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="183" height="1" bgcolor="Light6" ></DisplayRectangle>
      <DisplayRectangle x="0" y="2" width="183" height="32" bgcolor="White" fgcolor="Light6"></DisplayRectangle>
      <DisplayRectangle x="0" y="34" width="183" height="1" bgcolor="Light4" ></DisplayRectangle>      
    </DisplayElement>

    <DisplayElement>
      <!-- WEATHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather.bmp</Bitmap>        
        <X>151</X>
        <Y>2</Y>
      </DisplayBitmap>

      <!-- DATE -->
      <DisplayString font="unifont" fgcolor="White" bgcolor="Light6" width="148">
        <DisplayStr>$f</DisplayStr>
        <X>1</X>
        <Y>3</Y>
      </DisplayString>

      <!-- TIME -->
      <DisplayString font="unifont" halign="right" bgcolor="White" fgcolor="Light6" width="50" height="13" renew-rate="second">
        <DisplayStr>$T</DisplayStr>
        <X>98</X>
        <Y>18</Y>        
      </DisplayString>
     
    </DisplayElement>


      <!-- COMPANY LOGO -->
    <DisplayBitmap isfile="false">
      <Bitmap>' . $base . '</Bitmap>
      <X>0</X>
      <Y>40</Y>
    </DisplayBitmap>

    <!-- WRITING -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/icon_save.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>writing</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <!-- DND -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>dnd</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" isflash="true">
      <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>dnd</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <!-- NETWORK DOWN -->
    <DisplayBitmap isfile="true" >
      <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition negate="true">
        <conditionType>networkUp</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" isflash="true">
      <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition negate="true">
        <conditionType>networkUp</conditionType>
      </displayCondition>
    </DisplayBitmap>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
            <X>1</X>
            <Y>36</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/lock_g.bmp</Bitmap>
      <X>167</X>
      <Y>70</Y>
      <displayCondition>
        <conditionType>keypadLock</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- Headset -->
    <DisplayBitmap isfile="true" >
      <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
      <X>131</X>
      <Y>36</Y>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" >
      <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
      <X>131</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>headsetMode</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- MISS CALL -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/miss2.bmp</Bitmap>
      <X>167</X>
      <Y>54</Y>
      <displayCondition>
        <conditionType>missCall</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" isflash="true">
      <Bitmap>/app/resource/icon/miss.bmp</Bitmap>
      <X>167</X>
      <Y>54</Y>
      <displayCondition>
        <conditionType>missCall</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- CALL FORWARDED -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>delayedFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>busyFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>busyNoAnswerFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>callFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$j</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- MISSED CALLED -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>


      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$c</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- 5V WARNING -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$v</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>


    <!-- coredump -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>kdump</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>kdump</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>kdump</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$+1512</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="2" isfile="true">/app/resource/icon/screen1.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <XmlService/>
        </Action>
        <displayCondition>
          <conditionType>XmlApp</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignIn/>
        </Action>
        <displayCondition>
          <conditionType>signIn</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignOut/>
        </Action>
        <displayCondition>
          <conditionType>signOut</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <BackSpace/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CANCEL/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <MissedCalls/>
        </Action>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdedCalls/>
        </Action>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdAll/>
        </Action>
        <displayCondition>
          <conditionType>callFwdCancelled</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CancelFwd/>
        </Action>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Redial/>
        </Action>
        <displayCondition>
          <conditionType>hasDialedCalllog</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>weatherShow</ScreenShow>

    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="239" height="17" bgcolor="Black" fgcolor="Dark3" shadow-color="Light3"></DisplayRectangle>
      <!-- WEALTHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather.bmp</Bitmap>
        <X>4</X>
        <Y>20</Y>
      </DisplayBitmap>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark3">
        <DisplayStr>$L, $S, $g</DisplayStr>
        <X>4</X>
        <Y>1</Y>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$+1215: $w, $+1152: $x%</DisplayStr>
        <X>37</X>
        <Y>20</Y>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$0t</DisplayStr>
        <X>37</X>
        <Y>35</Y>
      </DisplayString>
    </DisplayElement>


    <DisplayElement>
      <!-- frame -->
      <DisplayRectangle x="0" y="51" width="239" height="17" bgcolor="Black" fgcolor="Dark3" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark3">
        <DisplayStr>$+1216</DisplayStr>
        <X>4</X>
        <Y>52</Y>
      </DisplayString>



      <!-- WEATHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather_0.bmp</Bitmap>
        <X>4</X>
        <Y>70</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather_1.bmp</Bitmap>
        <X>123</X>
        <Y>70</Y>
      </DisplayBitmap>

      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$+1217</DisplayStr>
        <X>40</X>
        <Y>70</Y>
      </DisplayString>
      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$0l - $0h</DisplayStr>
        <X>40</X>
        <Y>85</Y>
      </DisplayString>

      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$+1153</DisplayStr>
        <X>163</X>
        <Y>70</Y>
      </DisplayString>
      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$1l - $1h</DisplayStr>
        <X>163</X>
        <Y>85</Y>
      </DisplayString>
    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="2" isfile="true">/app/resource/icon/screen2.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>stockShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="239" height="17" bgcolor="Black" fgcolor="Dark3" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark3">
        <DisplayStr>$+1218</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/refresh_i.bmp</Bitmap>
        <X>221</X>
        <Y>2</Y>
      </DisplayBitmap>
      <DisplayString font="unifont" color="Light1" halign="right" width="50" bgcolor="Black" fgcolor="Dark5" renew-rate="minute">
        <DisplayStr>$*T</DisplayStr>
        <X>169</X>
        <Y>1</Y>
      </DisplayString>
    </DisplayElement>
    <!-- LIST BEGIN HERE -->
    <!-- pagingRecordRefreshIntervalRate: in millisecond, equal or less than 0  means no automatic refresh for additional records -->
    <DisplaySet id="stock" x="1" y="19" maxNumberOfRecord="5" pagingRecordRefreshIntervalRate="3000" dataSourceName="$Stock" displayDirection="vertical">
      <ItemTemplate height="16">

        <!-- Main frame -->
        <DisplayRectangle x="0" y="0" width="238" height="15" color="White" bgcolor="White" fgcolor="Light5" border-color="Light2">
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>
        <DisplayRectangle x="0" y="0" width="238" height="15" color="White" bgcolor="White" border-color="Light2">
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>

        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_down.bmp</Bitmap>
          <X>164</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_up.bmp</Bitmap>
          <X>164</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>


        <!-- symbol -->
        <DisplayString font = "unifont" width="94" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*c</DisplayStr>
          <X>2</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font = "unifont" width="94" height="13" bgcolor="White">
          <DisplayStr>$*c</DisplayStr>
          <X>2</X>
          <Y>1</Y>
          <displayCondition >
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <!-- last time updated stock value -->
        <DisplayString font = "unifont" halign="right" width="50" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*p</DisplayStr>
          <X>110</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font = "unifont" halign="right" width="50" height="13" bgcolor="White" >
          <DisplayStr>$*p</DisplayStr>
          <X>110</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <!--  stock changed value -->
        <DisplayString font = "unifont" halign="right" color="Black" width="45" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*C</DisplayStr>
          <X>190</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>
        <!--  stock changed value -->
        <DisplayString font = "unifont" halign="right" color="Dark3" width="45" height="13" bgcolor="White">
          <DisplayStr>$*C</DisplayStr>
          <X>190</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>



      </ItemTemplate>
    </DisplaySet>
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>115</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>115</X>
        <Y>93</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>
    <!-- $*T > stock update time -->
    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="2" isfile="true">/app/resource/icon/screen3.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshStock/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>currencyShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="239" height="17" bgcolor="Black" fgcolor="Dark3" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark3">
        <DisplayStr>$+1220</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>


    <!-- LIST BEGIN HERE -->
    <DisplaySet id="currency" x="1" y="19" maxNumberOfRecord="5" dataSourceName="$Currency" displayDirection="vertical">
      <ItemTemplate height="16">
        <DisplayRectangle x="0" y="0" width="238" height="15" bgcolor="White" border-color="Light2"></DisplayRectangle>
        <!-- symbol -->
        <DisplayString font="unifont" width="100" height="13" bgcolor="Light5">
          <DisplayStr>$*x - $*y</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>

        <!--  stock changed value -->
        <DisplayString font="unifont" width="50" height="13" halign="right">
          <DisplayStr>$*r</DisplayStr>
          <X>186</X>
          <Y>1</Y>
        </DisplayString>
      </ItemTemplate>
    </DisplaySet>
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>115</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>115</X>
        <Y>93</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>
    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="2" isfile="true">/app/resource/icon/screen4.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <ReverseCurrency/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshCurrency/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

</Screen>
';
    return($cfg);
}

function endpoint_gs2124($base){
    $cfg = '<?xml version="1.0" encoding="UTF-8"?>
<Screen>
  <LeftStatusBar>
    <Layout width="57">
	  <DisplayRectangle x="0" y="0" width="55" height="120" color="White" bgcolor="Light6"></DisplayRectangle>
	  <DisplayRectangle x="53" y="0" width="2" height="120" bgcolor="Light5"></DisplayRectangle>
	  <DisplayRectangle x="55" y="0" width="1" height="120" bgcolor="Light4"></DisplayRectangle>
      <DisplayAccountList>
        <X>0</X>
        <Y>1</Y>
      </DisplayAccountList>
    </Layout>
    <Account height="25">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/account_line_bg.bmp</Bitmap>
          <X>6</X>
          <Y>0</Y>
        </DisplayBitmap>
        <DisplayRectangle x="1" y="0" width="6" height="23" bgcolor="Light6"></DisplayRectangle>
        <DisplayBitmap isfile="true" renew-rate="second" isrenew="true">
          <Bitmap>/app/resource/etc/account_r.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>

        <DisplayBitmap isfile="true" isflash="true" renew-rate="second">
          <Bitmap>/app/resource/etc/account_nr.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>
      </DisplayElement>
      <!-- Account Name -->
      <DisplayElement>
        <DisplayString font="unifont" color="Black" bgcolor="Light5" height="16" width="46" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>8</X>
          <Y>3</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>
        <DisplayString font="unifont" width="46" height="16" color="Light2" bgcolor="Light5" shadow-color="White" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>8</X>
          <Y>3</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>
      </DisplayElement>
      
      <!-- Accont Icons -->
      <DisplayElement>
        <DisplayBitmap isfile="true" bgcolor="Light5" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm2.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm1.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5">
          <Bitmap>/app/resource/icon/im1.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" renew-rate="minute">
          <Bitmap>/app/resource/icon/im2.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5">
          <Bitmap>/app/resource/icon/im_vm1.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None">
          <Bitmap>/app/resource/icon/im_vm2.bmp</Bitmap>
          <X>38</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
      </DisplayElement>
    </Account>
  </LeftStatusBar>
  <SoftkeyBar>
    <Layout height="22" >
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/softkey_bg.bmp</Bitmap>
        <X>0</X>
        <Y>1</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>2</X>
        <Y>4</Y>
      </DisplayList>

    </Layout>
    <ButtonShape id="0" width="59" height="17">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_b.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="White" bgcolor="Black" width="54">
          <DisplayStr>$A</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>
    <ButtonShape id="1" width="59" >
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_w.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="Black" bgcolor="White" width="54">
          <DisplayStr>$A</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>

  </SoftkeyBar>



  <IdleScreen>

    <ShowStatusLine>true</ShowStatusLine>

    <!-- frame -->
    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="183" height="1" bgcolor="Light6" ></DisplayRectangle>
      <DisplayRectangle x="0" y="2" width="183" height="32" bgcolor="White" fgcolor="Light6"></DisplayRectangle>
      <DisplayRectangle x="0" y="34" width="183" height="1" bgcolor="Light4" ></DisplayRectangle>      
    </DisplayElement>

    <DisplayElement>
      <!-- WEATHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather.bmp</Bitmap>        
        <X>151</X>
        <Y>2</Y>
      </DisplayBitmap>

      <!-- DATE -->
      <DisplayString font="unifont" fgcolor="White" bgcolor="Light6" width="148">
        <DisplayStr>$f</DisplayStr>
        <X>1</X>
        <Y>3</Y>
      </DisplayString>

      <!-- TIME -->
      <DisplayString font="unifont" halign="right" bgcolor="White" fgcolor="Light6" width="50" height="13" renew-rate="second">
        <DisplayStr>$T</DisplayStr>
        <X>98</X>
        <Y>18</Y>        
      </DisplayString>
    </DisplayElement>

    <!-- COMPANY LOGO -->
    <DisplayBitmap isfile="false">
      <Bitmap>' . $base . '</Bitmap>
      <X>0</X>
      <Y>40</Y>
    </DisplayBitmap>

    <!-- WRITING -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/icon_save.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>writing</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <!-- DND -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>dnd</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" isflash="true">
      <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>dnd</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <!-- NETWORK DOWN -->
    <DisplayBitmap isfile="true" >
      <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition negate="true">
        <conditionType>networkUp</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" isflash="true">
      <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
      <X>167</X>
      <Y>36</Y>
      <displayCondition negate="true">
        <conditionType>networkUp</conditionType>
      </displayCondition>
    </DisplayBitmap>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
            <X>1</X>
            <Y>36</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/lock_g.bmp</Bitmap>
      <X>167</X>
      <Y>70</Y>
      <displayCondition>
        <conditionType>keypadLock</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- Headset -->
    <DisplayBitmap isfile="true" >
      <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
      <X>131</X>
      <Y>36</Y>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" >
      <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
      <X>131</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>headsetMode</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- MISS CALL -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/miss2.bmp</Bitmap>
      <X>167</X>
      <Y>54</Y>
      <displayCondition>
        <conditionType>missCall</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true" isflash="true">
      <Bitmap>/app/resource/icon/miss.bmp</Bitmap>
      <X>167</X>
      <Y>54</Y>
      <displayCondition>
        <conditionType>missCall</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- CALL FORWARDED -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>delayedFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>busyFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>busyNoAnswerFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
      <X>149</X>
      <Y>36</Y>
      <displayCondition>
        <conditionType>callFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$j</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- MISSED CALLED -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>


      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$c</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- 5V WARNING -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$v</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>


    <!-- coredump -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>kdump</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>kdump</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>kdump</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="165">
        <DisplayStr>$+1512</DisplayStr>
        <X>0</X>
        <Y>85</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">        
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <XmlService/>
        </Action>
        <displayCondition>
          <conditionType>XmlApp</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignIn/>
        </Action>
        <displayCondition>
          <conditionType>signIn</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignOut/>
        </Action>
        <displayCondition>
          <conditionType>signOut</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <BackSpace/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CANCEL/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <MissedCalls/>
        </Action>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdedCalls/>
        </Action>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdAll/>
        </Action>
        <displayCondition>
          <conditionType>callFwdCancelled</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CancelFwd/>
        </Action>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Redial/>
        </Action>
        <displayCondition>
          <conditionType>hasDialedCalllog</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>weatherShow</ScreenShow>

    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="239" height="17" bgcolor="Dark5" shadow-color="Light3"></DisplayRectangle>
      <!-- WEALTHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather.bmp</Bitmap>
        <X>4</X>
        <Y>20</Y>
      </DisplayBitmap>
      <DisplayString font="unifont" color="White" shadow-color="Dark3"  bgcolor="Dark5">
        <DisplayStr>$L, $S, $g</DisplayStr>
        <X>4</X>
        <Y>1</Y>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$+1215: $w, $+1152: $x%</DisplayStr>
        <X>37</X>
        <Y>20</Y>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$0t</DisplayStr>
        <X>37</X>
        <Y>35</Y>
      </DisplayString>
    </DisplayElement>


    <DisplayElement>
      <!-- frame -->
      <DisplayRectangle x="0" y="51" width="239" height="17" bgcolor="Dark5" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" shadow-color="Dark3" bgcolor="Dark5">
        <DisplayStr>$+1216</DisplayStr>
        <X>4</X>
        <Y>52</Y>
      </DisplayString>



      <!-- WEATHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather_0.bmp</Bitmap>
        <X>4</X>
        <Y>70</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather_1.bmp</Bitmap>
        <X>123</X>
        <Y>70</Y>
      </DisplayBitmap>

      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$+1217</DisplayStr>
        <X>40</X>
        <Y>70</Y>
      </DisplayString>
      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$0l - $0h</DisplayStr>
        <X>40</X>
        <Y>85</Y>
      </DisplayString>

      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$+1153</DisplayStr>
        <X>163</X>
        <Y>70</Y>
      </DisplayString>
      <DisplayString font = "unifont" color="Dark3">
        <DisplayStr>$1l - $1h</DisplayStr>
        <X>163</X>
        <Y>85</Y>
      </DisplayString>
    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">        
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>stockShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="239" height="17" bgcolor="Dark5" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" shadow-color="Dark3" bgcolor="Dark5" >
        <DisplayStr>$+1218</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/refresh_i.bmp</Bitmap>
        <X>221</X>
        <Y>2</Y>
      </DisplayBitmap>
      <DisplayString font="unifont" color="White" halign="right" width="50" bgcolor="Dark5" renew-rate="minute">
        <DisplayStr>$*T</DisplayStr>
        <X>169</X>
        <Y>1</Y>
      </DisplayString>
    </DisplayElement>
    <!-- LIST BEGIN HERE -->
    <!-- pagingRecordRefreshIntervalRate: in millisecond, equal or less than 0  means no automatic refresh for additional records -->
    <DisplaySet id="stock" x="1" y="19" maxNumberOfRecord="5" pagingRecordRefreshIntervalRate="3000" dataSourceName="$Stock" displayDirection="vertical">
      <ItemTemplate height="16">

        <!-- Main frame -->
        <DisplayRectangle x="0" y="0" width="238" height="15" color="White" bgcolor="White" fgcolor="Light5" border-color="Light2">
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>
        <DisplayRectangle x="0" y="0" width="238" height="15" color="White" bgcolor="White" border-color="Light2">
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>

        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_down.bmp</Bitmap>
          <X>164</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_up.bmp</Bitmap>
          <X>164</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>


        <!-- symbol -->
        <DisplayString font = "unifont" width="94" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*c</DisplayStr>
          <X>2</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font = "unifont" width="94" height="13" bgcolor="White">
          <DisplayStr>$*c</DisplayStr>
          <X>2</X>
          <Y>1</Y>
          <displayCondition >
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <!-- last time updated stock value -->
        <DisplayString font = "unifont" halign="right" width="50" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*p</DisplayStr>
          <X>110</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font = "unifont" halign="right" width="50" height="13" bgcolor="White" >
          <DisplayStr>$*p</DisplayStr>
          <X>110</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <!--  stock changed value -->
        <DisplayString font = "unifont" halign="right" color="Black" width="45" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*C</DisplayStr>
          <X>190</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>
        <!--  stock changed value -->
        <DisplayString font = "unifont" halign="right" color="Dark3" width="45" height="13" bgcolor="White">
          <DisplayStr>$*C</DisplayStr>
          <X>190</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>



      </ItemTemplate>
    </DisplaySet>
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>115</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>115</X>
        <Y>93</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>
    <!-- $*T > stock update time -->
    <SoftKeys>
      <SoftKey useshapeid="1">        
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshStock/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>currencyShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="239" height="17" bgcolor="Dark5" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" shadow-color="Dark3" bgcolor="Dark5">
        <DisplayStr>$+1220</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>


    <!-- LIST BEGIN HERE -->
    <DisplaySet id="currency" x="1" y="19" maxNumberOfRecord="5" dataSourceName="$Currency" displayDirection="vertical">
      <ItemTemplate height="16">
        <DisplayRectangle x="0" y="0" width="238" height="15" bgcolor="White" border-color="Light2"></DisplayRectangle>
        <!-- symbol -->
        <DisplayString font="unifont" width="100" height="13" bgcolor="Light5">
          <DisplayStr>$*x - $*y</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>

        <!--  stock changed value -->
        <DisplayString font="unifont" width="50" height="13" halign="right">
          <DisplayStr>$*r</DisplayStr>
          <X>186</X>
          <Y>1</Y>
        </DisplayString>
      </ItemTemplate>
    </DisplaySet>
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>115</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>115</X>
        <Y>93</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>
    <SoftKeys>
      <SoftKey useshapeid="1">        
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <ReverseCurrency/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshCurrency/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

</Screen>
';
    return($cfg);
}

function endpoint_gs2100($base){
    $cfg = '<?xml version="1.0" encoding="UTF-8"?>
<Screen>
  <LeftStatusBar>
    <Layout width="57">
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/account_s_bg.bmp</Bitmap>
        <X>0</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>0</X>
        <Y>0</Y>
      </DisplayList>
    </Layout>
    <Account height="19">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/account_line_bg.bmp</Bitmap>
          <X>4</X>
          <Y>0</Y>
        </DisplayBitmap>
        <DisplayRectangle x="1" y="0" width="4" height="19" bgcolor="Light6"></DisplayRectangle>
        <DisplayBitmap isfile="true" renew-rate="second" isrenew="true">
          <Bitmap>/app/resource/etc/account_r.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" renew-rate="second">
          <Bitmap>/app/resource/etc/account_nr.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>

      </DisplayElement>

      <DisplayElement>
        <DisplayString font="unifont" color="Black" bgcolor="Light5" height="16" width="48" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>6</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font="unifont" width="48" height="16" color="Light2" bgcolor="Light5" shadow-color="White" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>6</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>

      </DisplayElement>

      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/vm2.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true">
          <Bitmap>/app/resource/icon/vm1.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" >
          <Bitmap>/app/resource/icon/im1.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true">
          <Bitmap>/app/resource/icon/im2.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" >
          <Bitmap>/app/resource/icon/im_vm1.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true">
          <Bitmap>/app/resource/icon/im_vm2.bmp</Bitmap>
          <X>39</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
      </DisplayElement>
    </Account>
  </LeftStatusBar>
  <SoftkeyBar>
    <Layout height="16" >
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/softkey_bg.bmp</Bitmap>
        <X>0</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>2</X>
        <Y>2</Y>
      </DisplayList>

    </Layout>
    <ButtonShape id="0" width="59" height="14">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_b.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="White" bgcolor="Black" width="54">
          <DisplayStr>$A</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>
    <ButtonShape id="1" width="59" >
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_w.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="Black" bgcolor="White" width="54">
          <DisplayStr>$A</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>

  </SoftkeyBar>

  <IdleScreen>
    <ShowStatusLine>true</ShowStatusLine>

    <!-- frame -->
    <DisplayElement>
      <DisplayRectangle x="0" y="0" width="123" height="1" bgcolor="Light6" ></DisplayRectangle>
      <DisplayRectangle x="0" y="1" width="123" height="15" bgcolor="White" fgcolor="Light6"></DisplayRectangle>
      <DisplayRectangle x="0" y="16" width="123" height="1" bgcolor="Light4" ></DisplayRectangle>
    </DisplayElement>

    <!-- Top bar content -->
    <DisplayElement>
      <DisplayString font="unifont" width="70" bgcolor="Light6" fgcolor="White">
        <DisplayStr>$f</DisplayStr>
        <X>1</X>
        <Y>1</Y>
      </DisplayString>
      <DisplayString font="unifont" halign="right" width="50" bgcolor="White" fgcolor="Light6">
        <DisplayStr>$T</DisplayStr>
        <X>72</X>
        <Y>1</Y>
      </DisplayString>
    </DisplayElement>

    <!-- DISPLAY WHEN MISS CALL -->
    <DisplayElement>
      
	  <!-- COMPANY LOGO -->
      <DisplayBitmap isfile="false">
        <Bitmap>' . $base . '</Bitmap>
        <X>5</X>
        <Y>17</Y>
      </DisplayBitmap>

      <!-- Forward Call Log -->
      <DisplayString font="unifont" color="Dark3" width="105" halign="center" bgcolor="White">
        <DisplayStr>$j</DisplayStr>
        <X>0</X>
        <Y>60</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayString>
      <!-- Miss call -->
      <DisplayString font="unifont" color="Dark3" width="105" halign="center" bgcolor="White">
        <DisplayStr>$c</DisplayStr>
        <X>0</X>
        <Y>60</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>

      <!-- 5V Error -->
      <DisplayString font="unifont" halign="center"  color="Dark3" width="105"  bgcolor="White">
        <DisplayStr>$v</DisplayStr>
        <X>0</X>
        <Y>60</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayString>

      <!-- core dump -->
      <DisplayString font="unifont" halign="center" color="Dark3" width="105"  bgcolor="White">
        <DisplayStr>$+1512</DisplayStr>
        <X>0</X>
        <Y>60</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- ICONS -->
    <DisplayElement>
      <!-- DND -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
        <X>107</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
        <X>107</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- WRITING -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/icon_save.bmp</Bitmap>
        <X>107</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>writing</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- NETWORK DOWN -->
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
        <X>107</X>
        <Y>19</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
        <X>107</X>
        <Y>19</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
        <X>1</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>107</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>

      <!-- CALL FORWARDED -->
      <!-- Foward Calls -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
        <X>107</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>delayedFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
        <X>107</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>busyFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
        <X>107</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>busyNoAnswerFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
        <X>107</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>

      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>107</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- Headset -->
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>107</X>
        <Y>55</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
        <X>107</X>
        <Y>55</Y>
        <displayCondition>
          <conditionType>headsetMode</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- KeypadLock -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/lock_g.bmp</Bitmap>
        <X>107</X>
        <Y>55</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_2100/screen1.bmp</Icon> -->
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <XmlService/>
        </Action>
        <displayCondition>
          <conditionType>XmlApp</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignIn/>
        </Action>
        <displayCondition>
          <conditionType>signIn</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignOut/>
        </Action>
        <displayCondition>
          <conditionType>signOut</conditionType>
        </displayCondition>
      </SoftKey>

      <SoftKey>
        <Action>
          <BackSpace/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CANCEL/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <MissedCalls/>
        </Action>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdedCalls/>
        </Action>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdAll/>
        </Action>
        <displayCondition>
          <conditionType>callFwdCancelled</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CancelFwd/>
        </Action>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Redial/>
        </Action>
        <displayCondition>
          <conditionType>hasDialedCalllog</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>weatherShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <!-- frame -->
      <DisplayRectangle x="0" y="0" width="179" height="15" bgcolor="Black" fgcolor="Dark3" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark3">
        <DisplayStr>$L, $S, $g</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>


    <DisplayBitmap isfile="true" isrenew="true">
      <Bitmap>/tmp/weather.bmp</Bitmap>
      <X>2</X>
      <Y>16</Y>
    </DisplayBitmap>
    <DisplayString font="unifont" color="Dark3">
      <DisplayStr>$w, $x%</DisplayStr>
      <X>33</X>
      <Y>17</Y>
      <displayCondition>
        <conditionType>alwaysDisplay</conditionType>
      </displayCondition>
    </DisplayString>
    <DisplayString font="unifont" color="Dark3">
      <DisplayStr>$0t</DisplayStr>
      <X>33</X>
      <Y>31</Y>
      <displayCondition>
        <conditionType>alwaysDisplay</conditionType>
      </displayCondition>
    </DisplayString>
    <DisplayString font="unifont">
      <DisplayStr>$+1153 : $1h/$1l</DisplayStr>
      <X>2</X>
      <Y>46</Y>
      <displayCondition>
        <conditionType>alwaysDisplay</conditionType>
      </displayCondition>
    </DisplayString>
    <DisplayString font="unifont" color="Dark3">
      <DisplayStr>$1t</DisplayStr>
      <X>33</X>
      <Y>60</Y>
      <displayCondition>
        <conditionType>alwaysDisplay</conditionType>
      </displayCondition>
    </DisplayString>



    <SoftKeys>
      <SoftKey useshapeid="1">
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_2100/screen2.bmp</Icon>-->
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>

    </SoftKeys>
  </IdleScreen>


  <IdleScreen>
    <ScreenShow>stockShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <!-- frame -->
      <DisplayRectangle x="0" y="0" width="179" height="15" bgcolor="Black" fgcolor="Dark5" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark5">
        <DisplayStr>$+1218</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/refresh_i.bmp</Bitmap>
        <X>161</X>
        <Y>1</Y>
      </DisplayBitmap>
      <DisplayString font="unifont" color="Light1" halign="right" width="50" bgcolor="Black" fgcolor="Dark5" renew-rate="minute">
        <DisplayStr>$*T</DisplayStr>
        <X>110</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>
    <!-- LIST BEGIN HERE -->
    <!-- pagingRecordRefreshIntervalRate: in millisecond, equal or less than 0  means no automatic refresh for additional records -->
    <DisplaySet id="stock" x="1" y="19" maxNumberOfRecord="3" pagingRecordRefreshIntervalRate="3000" dataSourceName="$Stock" displayDirection="vertical">
      <ItemTemplate height="18">


        <!-- Main frame -->
        <DisplayRectangle x="0" y="0" width="177" height="15" color="White" bgcolor="White" fgcolor="Light5" border-color="Light2">
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>
        <DisplayRectangle x="0" y="0" width="177" height="15" color="White" bgcolor="White" border-color="Light2">
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>
        <DisplayRectangle x="1" y="15" width="175" height="1" color="Dark3" bgcolor="Dark1" ></DisplayRectangle>

        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_down.bmp</Bitmap>
          <X>120</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_up.bmp</Bitmap>
          <X>120</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>


        <!-- symbol -->
        <DisplayString font = "unifont" width="70" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*c</DisplayStr>
          <X>2</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font = "unifont" width="70" height="13" bgcolor="White">
          <DisplayStr>$*c</DisplayStr>
          <X>2</X>
          <Y>1</Y>
          <displayCondition >
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <!-- last time updated stock value -->
        <DisplayString font = "unifont" halign="right" width="45" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*p</DisplayStr>
          <X>74</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font = "unifont" halign="right" width="45" height="13" bgcolor="White" >
          <DisplayStr>$*p</DisplayStr>
          <X>74</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>



        <!--  stock changed value -->
        <DisplayString font = "unifont" halign="right" color="Black" width="37" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*C</DisplayStr>
          <X>138</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>
        <!--  stock changed value -->
        <DisplayString font = "unifont" halign="right" color="Dark3" width="37" height="13" bgcolor="White">
          <DisplayStr>$*C</DisplayStr>
          <X>138</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

      </ItemTemplate>
    </DisplaySet>
    <DisplayElement>
      <DisplayBitmap isfile="true" bgcolor="White">
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>85</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" bgcolor="White">
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>85</X>
        <Y>66</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>
    <SoftKeys>
      <SoftKey useshapeid="1">
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_2100/screen2.bmp</Icon>-->
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshStock/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>


  <IdleScreen>
    <ScreenShow>currencyShow</ScreenShow>
    <ShowStatusLine>false</ShowStatusLine>

    <DisplayElement>
      <!-- frame -->
      <DisplayRectangle x="0" y="0" width="179" height="15" bgcolor="Black" fgcolor="Dark5" shadow-color="Light3"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark5">
        <DisplayStr>$+1220</DisplayStr>
        <X>2</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>

    <!-- LIST BEGIN HERE -->
    <DisplaySet id="currency" x="1" y="19" maxNumberOfRecord="3" dataSourceName="$Currency" displayDirection="vertical">
      <ItemTemplate height="18">

        <DisplayRectangle x="0" y="0" width="177" height="15" bgcolor="White" border-color="Light2"></DisplayRectangle>
        <DisplayRectangle x="1" y="15" width="175" height="1" color="Dark3" bgcolor="Dark1" ></DisplayRectangle>

        <!-- symbol -->
        <DisplayString font="unifont"  width="80" height="13" bgcolor="Light5">
          <DisplayStr>$*x - $*y</DisplayStr>
          <X>2</X>
          <Y>1</Y>
        </DisplayString>

        <!--  stock changed value -->
        <DisplayString font="unifont" width="50" height="13" halign="right">
          <DisplayStr>$*r</DisplayStr>
          <X>125</X>
          <Y>1</Y>
        </DisplayString>

      </ItemTemplate>
    </DisplaySet>
    <DisplayElement>
      <DisplayBitmap isfile="true" bgcolor="White">
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>85</X>
        <Y>19</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" bgcolor="White">
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>85</X>
        <Y>66</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">
        <!--<Icon textoffset="14" x="2" y="1" isfile="true">/app/resource/working_2100/screen2.bmp</Icon>-->
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <ReverseCurrency/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshCurrency/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>



</Screen>
';
    return($cfg);    
}

function endpoint_gs2120($base){
    $cfg = '<?xml version="1.0" encoding="UTF-8"?>
<Screen>
  <LeftStatusBar>
    <Layout width="90">
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/account_s_bg.bmp</Bitmap>
        <X>0</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>0</X>
        <Y>0</Y>
      </DisplayList>
    </Layout>
    <Account height="23">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/account_line_bg.bmp</Bitmap>
          <X>6</X>
          <Y>0</Y>
        </DisplayBitmap>
        <DisplayRectangle x="1" y="0" width="6" height="23" bgcolor="Light6"></DisplayRectangle>
        <DisplayBitmap isfile="true" renew-rate="second" isrenew="true">
          <Bitmap>/app/resource/etc/account_r.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>        
        <DisplayBitmap isfile="true" isflash="true" renew-rate="second">
          <Bitmap>/app/resource/etc/account_nr.bmp</Bitmap>
          <X>1</X>
          <Y>0</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" width="78" height="16" bgcolor="Light5" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>8</X>
          <Y>3</Y>
          <displayCondition>
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>

        <DisplayString font="unifont" width="78" height="16" color="Light2" bgcolor="Light5" shadow-color="White" renew-rate="second">
          <DisplayStr>$a</DisplayStr>
          <X>8</X>
          <Y>3</Y>
          <displayCondition negate="true">
            <conditionType>accountRegistered</conditionType>
          </displayCondition>
        </DisplayString>

      </DisplayElement>

      <DisplayElement>
        <DisplayBitmap isfile="true" bgcolor="Light6" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm1.bmp</Bitmap>
          <X>71</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" renew-rate="minute">
          <Bitmap>/app/resource/icon/vm2.bmp</Bitmap>
          <X>71</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVoiceMail</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5" >
          <Bitmap>/app/resource/icon/im1.bmp</Bitmap>
          <X>71</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" >
          <Bitmap>/app/resource/icon/im2.bmp</Bitmap>
          <X>71</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasIM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" bgcolor="Light5" >
          <Bitmap>/app/resource/icon/im_vm1.bmp</Bitmap>
          <X>71</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true" isflash="true" bgcolor="None" >
          <Bitmap>/app/resource/icon/im_vm2.bmp</Bitmap>
          <X>71</X>
          <Y>4</Y>
          <displayCondition>
            <conditionType>hasVM_IM</conditionType>
          </displayCondition>
        </DisplayBitmap>

      </DisplayElement>
    </Account>
  </LeftStatusBar>
  <SoftkeyBar>
    <Layout height="22" >

      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/softkey_bg.bmp</Bitmap>
        <X>0</X>
        <Y>1</Y>
      </DisplayBitmap>
      <DisplayList>
        <X>2</X>
        <Y>4</Y>
      </DisplayList>

    </Layout>
    <ButtonShape id="0" width="79" height="17">
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_b.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="center" color="White" bgcolor="Black" width="75">
          <DisplayStr>$A</DisplayStr>
          <X>1</X>
          <Y>2</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>
    <ButtonShape id="1" width="79" >
      <DisplayElement>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/softkey_button_w.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
        </DisplayBitmap>
      </DisplayElement>
      <DisplayElement>
        <DisplayString font="unifont" halign="left" color="Black" bgcolor="White" width="70">
          <DisplayStr>$A</DisplayStr>
          <X>1</X>
          <Y>2</Y>
        </DisplayString>
      </DisplayElement>
    </ButtonShape>

  </SoftkeyBar>

  <IdleScreen>

    <ShowStatusLine>true</ShowStatusLine>

    <!-- TOP -->
    <DisplayElement>
      <!-- frame -->
      <DisplayRectangle x="1" y="0" width="230" height="1" bgcolor="Light6" ></DisplayRectangle>
      <DisplayRectangle x="1" y="2" width="230" height="33" bgcolor="White" fgcolor="Light6"></DisplayRectangle>
      <DisplayRectangle x="1" y="35" width="230" height="1" bgcolor="Light4" ></DisplayRectangle>

      <!-- WEATHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather.bmp</Bitmap>
        <!--<Bitmap>/app/resource/weather/mostly_cloudy_night.bmp</Bitmap>-->
        <X>199</X>
        <Y>2</Y>
      </DisplayBitmap>

      <!-- DATE -->
      <DisplayString font="bold" fgcolor="White" bgcolor="Light6" width="194" >
        <DisplayStr>$f</DisplayStr>
        <X>2</X>
        <Y>3</Y>
      </DisplayString>
      <!-- TIME -->
      <DisplayString font="unifont" halign="right" bgcolor="White" fgcolor="Light6" width="50" height="13" renew-rate="second">
        <DisplayStr>$T</DisplayStr>
        <X>147</X>
        <Y>20</Y>
      </DisplayString>
    </DisplayElement>

	<!--COMPANY LOGO-->
    <DisplayElement>
	<DisplayBitmap isfile="false">       				
	<Bitmap>' . $base . '</Bitmap>
        <X>5</X>
        <Y>40</Y>
      	</DisplayBitmap>
	</DisplayElement>



    <!-- ICONS -->
    <DisplayElement>
      <!-- WRITING -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/icon_save.bmp</Bitmap>
        <X>213</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>writing</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- DND -->
      <DisplayBitmap isfile="true" renew-rate="second">
        <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
        <X>213</X>
        <Y>37</Y>
        <displayCondition>
          <customCondition valueToCompare="#dnd" compareOP="eq" value="1"></customCondition>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true" renew-rate="second">
        <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
        <X>213</X>
        <Y>37</Y>
        <displayCondition>
          <customCondition valueToCompare="#dnd" compareOP="eq" value="1"></customCondition>
        </displayCondition>
      </DisplayBitmap>
      <!-- NETWORK DOWN -->
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
        <X>213</X>
        <Y>37</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
        <X>213</X>
        <Y>37</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
        <X>1</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- CALL FORWARDED -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
        <X>195</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>delayedFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
        <X>195</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>busyFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
        <X>195</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>busyNoAnswerFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
        <X>195</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- KEYPAD LOCK -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/lock_g.bmp</Bitmap>
        <X>213</X>
        <Y>70</Y>
        <displayCondition>
          <conditionType>keypadLock</conditionType>
        </displayCondition>
      </DisplayBitmap>

      <!-- Headset -->
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>177</X>
        <Y>37</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
        <X>177</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>headsetMode</conditionType>
        </displayCondition>
      </DisplayBitmap>

      <!-- MISSED CALLED -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/miss2.bmp</Bitmap>
        <X>159</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/miss.bmp</Bitmap>
        <X>159</X>
        <Y>37</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <DisplayElement>
      <DisplayString font = "unifont" halign="center" width="228">
        <DisplayStr>$j</DisplayStr>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
      <DisplayString font="unifont" halign="center" width="228">
        <DisplayStr>$c</DisplayStr>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- 5v error -->
    <DisplayElement>

      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayBitmap>

      <DisplayString font="unifont" halign="center">
        <DisplayStr>$v</DisplayStr>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>wrongPower</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <!-- 5v error -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>kdump</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="228">
        <DisplayStr>kdump</DisplayStr>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>kdump</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>
    <!-- application crashed -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/etc/whitebox_small.bmp</Bitmap>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayString font="unifont" halign="center" width="228">
        <DisplayStr>$+1512</DisplayStr>
        <X>0</X>
        <Y>119</Y>
        <displayCondition>
          <conditionType>crash</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>




    <!-- NFS OK 
		<DisplayBitmap isfile="true">
			<Bitmap>/app/resource/icon/nfs_ok.bmp</Bitmap>
			<X>23</X>
			<Y>37</Y>
            <displayCondition>
                <conditionType>nfsMountOk</conditionType>
            </displayCondition>
		</DisplayBitmap>
		<DisplayBitmap isfile="true">
			<Bitmap>/app/resource/icon/nfs_failed.bmp</Bitmap>
			<X>23</X>
			<Y>37</Y>
            <displayCondition>
                <conditionType>nfsMountFailed</conditionType>
            </displayCondition>
		</DisplayBitmap>
		-->




    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="4" isfile="true">/app/resource/icon/screen1.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>SubScreen</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <XmlService/>
        </Action>
        <displayCondition>
          <conditionType>XmlApp</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignIn/>
        </Action>
        <displayCondition>
          <conditionType>signIn</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <SignOut/>
        </Action>
        <displayCondition>
          <conditionType>signOut</conditionType>
        </displayCondition>
      </SoftKey>
      <!--<SoftKey>
        <Action>
          <NewCall/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>-->
      <SoftKey>
        <Action>
          <BackSpace/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CANCEL/>
        </Action>
        <displayCondition>
          <conditionType>backSpace</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <MissedCalls/>
        </Action>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdedCalls/>
        </Action>
        <displayCondition>
          <conditionType>hasFowardedCallLog</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <FwdAll/>
        </Action>
        <displayCondition>
          <conditionType>callFwdCancelled</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <CancelFwd/>
        </Action>
        <displayCondition>
          <conditionType>callFwded</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <Redial/>
        </Action>
        <displayCondition>
          <conditionType>hasDialedCalllog</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>weatherShow</ScreenShow>
    <ShowStatusLine>true</ShowStatusLine>



    <!-- DND -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
        <X>2</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
        <X>2</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- NETWORK DOWN -->
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
        <X>22</X>
        <Y>0</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
        <X>22</X>
        <Y>0</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- Headset -->
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>42</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
        <X>42</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>headsetMode</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- CALL FORWARDED -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>delayedFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>busyFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>busyNoAnswerFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>callFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- MISSED CALLED -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/miss2.bmp</Bitmap>
        <X>82</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/miss.bmp</Bitmap>
        <X>82</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- NUM OF MISSING CALL -->
      <DisplayString font="numberfont" color="Dark2" height="11" renew-rate="minute">
        <DisplayStr>$G</DisplayStr>
        <X>98</X>
        <Y>5</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
        <X>158</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <DisplayElement>
      <DisplayString font="unifont" halign="right" width="50">
        <DisplayStr>$T</DisplayStr>
        <X>177</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>



    <!-- NUM OF RING VOLUMN 
        <DisplayString font="numberfont">
            <DisplayStr>$r</DisplayStr>
            <X>206</X>
            <Y>8</Y>
        </DisplayString>
		-->

    <!-- frame -->


    <DisplayElement>

      <!-- WEATHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather.bmp</Bitmap>
        <!--<Bitmap>/app/resource/weather/mostly_cloudy_night.bmp</Bitmap>-->
        <X>4</X>
        <Y>38</Y>
      </DisplayBitmap>
      <DisplayRectangle x="1" y="16" width="230" height="17" bgcolor="Black" fgcolor="Dark5" shadow-color="Light1"></DisplayRectangle>
      <DisplayRectangle x="1" y="16" width="230" height="17" bgcolor="Black" fgcolor="Dark5" shadow-color="Light1"></DisplayRectangle>

      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark5">
        <DisplayStr>$L, $S, $g</DisplayStr>
        <X>3</X>
        <Y>17</Y>

      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$+1215: $w </DisplayStr>
        <X>40</X>
        <Y>38</Y>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$+1152: $x%</DisplayStr>
        <X>40</X>
        <Y>53</Y>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$0t</DisplayStr>
        <X>40</X>
        <Y>68</Y>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>





    <!-- Weather Forcast -->
    <DisplayElement>
      <DisplayRectangle x="1" y="86" width="230" height="17" bgcolor="Black" fgcolor="Dark5" shadow-color="Light1"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark5">
        <DisplayStr>$+1216</DisplayStr><!---$+1153-->
        <X>3</X>
        <Y>87</Y>>
      </DisplayString>

    </DisplayElement>

    <DisplayElement>
      <!-- WEATHER -->
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather_0.bmp</Bitmap>
        <X>4</X>
        <Y>105</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isrenew="true">
        <Bitmap>/tmp/weather_1.bmp</Bitmap>
        <X>123</X>
        <Y>105</Y>
      </DisplayBitmap>

      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$+1217</DisplayStr>
        <X>40</X>
        <Y>105</Y>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$0l - $0h</DisplayStr>
        <X>40</X>
        <Y>120</Y>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </DisplayString>

      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$+1153</DisplayStr>
        <X>163</X>
        <Y>105</Y>
      </DisplayString>
      <DisplayString font="unifont" color="Dark3">
        <DisplayStr>$1l - $1h</DisplayStr>
        <X>163</X>
        <Y>120</Y>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </DisplayString>
    </DisplayElement>

    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="4" isfile="true">/app/resource/icon/screen2.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>

    </SoftKeys>
  </IdleScreen>

  <IdleScreen>
    <ScreenShow>stockShow</ScreenShow>
    <ShowStatusLine>true</ShowStatusLine>

    <!-- 
      Process 
    -->
    <!--<DisplayConditionBlock x="0" y="0">
      <displayCondition conditionType="dnd" negate= "true">        
        <displayContent>
          
        </displayContent>
      </displayCondition>
      
    </DisplayConditionBlock>-->
    <!-- @@TOP_STATUS@@ -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
        <X>2</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
        <X>2</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>custom</conditionType>
          <customCondition valueToCompare="#dnd" compareOP="eq" value="1"></customCondition>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- NETWORK DOWN -->
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
        <X>22</X>
        <Y>0</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
        <X>22</X>
        <Y>0</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- Headset -->
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>42</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
        <X>42</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>headsetMode</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- CALL FORWARDED -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>delayedFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>busyFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>busyNoAnswerFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>callFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- MISSED CALLED -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/miss2.bmp</Bitmap>
        <X>82</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/miss.bmp</Bitmap>
        <X>82</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- NUM OF MISSING CALL -->
      <DisplayString font="numberfont" color="Dark2" height="11" renew-rate="minute">
        <DisplayStr>$G</DisplayStr>
        <X>98</X>
        <Y>5</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
        <X>158</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <DisplayElement>
      <DisplayString font="unifont" halign="right" width="50" renew-rate="second">
        <DisplayStr>$T</DisplayStr>
        <X>177</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>


    <DisplayElement>
      <DisplayRectangle x="1" y="16" width="230" height="17" bgcolor="Black" fgcolor="Dark5" shadow-color="Light1"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark5">
        <DisplayStr>$+1218</DisplayStr>
        <X>3</X>
        <Y>17</Y>
      </DisplayString>
    </DisplayElement>

    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/refresh_i.bmp</Bitmap>
        <X>213</X>
        <Y>19</Y>
      </DisplayBitmap>
      <DisplayString font="unifont" color="Light1" halign="right" width="50" bgcolor="Black" fgcolor="Dark5" renew-rate="minute">
        <DisplayStr>$*T</DisplayStr>
        <X>161</X>
        <Y>17</Y>
      </DisplayString>
    </DisplayElement>
    <!-- LIST BEGIN HERE -->
    <!-- pagingRecordRefreshIntervalRate: in millisecond, equal or less than 0  means no automatic refresh for additional records -->
    <DisplaySet id="stock" x="1" y="35" maxNumberOfRecord="6" pagingRecordRefreshIntervalRate="3000" dataSourceName="$Stock" displayDirection="vertical">
      <ItemTemplate height="17">
        <DisplayRectangle x="2" y="15" width="222" height="1" bgcolor="Gray"></DisplayRectangle>
        <DisplayRectangle x="0" y="0" width="226" height="15" color="White" bgcolor="White" border-color="Light2">
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>
        <DisplayRectangle x="0" y="0" width="226" height="15" color="White" bgcolor="White" fgcolor="Light5" border-color="Light2">
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayRectangle>



        <!--<DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/line_bg_w.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>-->
        <!--<DisplayBitmap isfile="true">
          <Bitmap>/app/resource/etc/line_bg_g.bmp</Bitmap>
          <X>0</X>
          <Y>0</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>-->

        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_up.bmp</Bitmap>
          <X>164</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>
        <DisplayBitmap isfile="true">
          <Bitmap>/app/resource/icon/stock_down.bmp</Bitmap>
          <X>164</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayBitmap>

        <!-- symbol -->
        <DisplayString font="unifont" width="94" height="13" bgcolor="White" fgcolor="Light5">
          <DisplayStr>$*c</DisplayStr>
          <!-- Change to name $*c-->
          <X>2</X>
          <Y>1</Y>
        </DisplayString>

        <!-- 
          ConditionalDisplay will override the position of the display object (when given)
          it should be able to save the 
        -->
        <!--<ConditionalDisplay x="" y="" width="" height="">
          <Condition type="stockValueIncrease" negate="true">
            
            
          </Condition>
          
        </ConditionalDisplay>-->
        <DisplayString font="unifont" halign="right" width="50" height="13">
          <DisplayStr>$*p</DisplayStr>
          <!-- last time updated stock value -->
          <X>110</X>
          <Y>1</Y>
        </DisplayString>

        <DisplayString font="unifont" halign="right" color="Dark3" width="45" height="13">
          <DisplayStr>$*C</DisplayStr>
          <!--  stock changed value -->
          <X>180</X>
          <Y>1</Y>
          <displayCondition>
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>
        <DisplayString font="unifont" halign="right" color="Black" width="45" height="13">
          <DisplayStr>$*C</DisplayStr>
          <!--  stock changed value -->
          <X>180</X>
          <Y>1</Y>
          <displayCondition negate="true">
            <conditionType>stockValueIncrease</conditionType>
          </displayCondition>
        </DisplayString>

      </ItemTemplate>
    </DisplaySet>
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>98</X>
        <Y>35</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>98</X>
        <Y>131</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- $*T > stock update time -->
    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="4" isfile="true">/app/resource/icon/screen3.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshStock/>
        </Action>
        <displayCondition>
          <conditionType>alwaysDisplay</conditionType>
        </displayCondition>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>


  <IdleScreen>
    <ScreenShow>currencyShow</ScreenShow>
    <ShowStatusLine>true</ShowStatusLine>

    <!-- @@TOP_STATUS@@ -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/dnd2.bmp</Bitmap>
        <X>2</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/dnd.bmp</Bitmap>
        <X>2</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>dnd</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- NETWORK DOWN -->
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/network_down2.bmp</Bitmap>
        <X>22</X>
        <Y>0</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/network_down.bmp</Bitmap>
        <X>22</X>
        <Y>0</Y>
        <displayCondition negate="true">
          <conditionType>networkUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- Headset -->
    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/empty.bmp</Bitmap>
        <X>42</X>
        <Y>0</Y>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/headset.bmp</Bitmap>
        <X>42</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>headsetMode</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <!-- CALL FORWARDED -->
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_noanswer.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>delayedFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>busyFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_busy_noanswer.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>busyNoAnswerFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>
    <DisplayBitmap isfile="true">
      <Bitmap>/app/resource/icon/fwd_all.bmp</Bitmap>
      <X>62</X>
      <Y>0</Y>
      <displayCondition>
        <conditionType>callFwded</conditionType>
      </displayCondition>
    </DisplayBitmap>

    <!-- MISSED CALLED -->
    <DisplayElement>
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/miss2.bmp</Bitmap>
        <X>82</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" isflash="true">
        <Bitmap>/app/resource/icon/miss.bmp</Bitmap>
        <X>82</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <!-- NUM OF MISSING CALL -->
      <DisplayString font="numberfont" color="Dark2" height="11" renew-rate="minute">
        <DisplayStr>$G</DisplayStr>
        <X>98</X>
        <Y>5</Y>
        <displayCondition>
          <conditionType>missCall</conditionType>
        </displayCondition>
      </DisplayString>
      <!-- CORE DUMP -->
      <DisplayBitmap isfile="true">
        <Bitmap>/app/resource/icon/coredump.bmp</Bitmap>
        <X>158</X>
        <Y>0</Y>
        <displayCondition>
          <conditionType>coredump</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>

    <DisplayElement>
      <DisplayString font="unifont" halign="right" width="50">
        <DisplayStr>$T</DisplayStr>
        <X>177</X>
        <Y>0</Y>
      </DisplayString>
    </DisplayElement>


    <DisplayElement>
      <DisplayRectangle x="1" y="16" width="230" height="17" bgcolor="Black" fgcolor="Dark5" shadow-color="Light1"></DisplayRectangle>
      <DisplayString font="unifont" color="White" bgcolor="Black" fgcolor="Dark5">
        <DisplayStr>$+1220</DisplayStr>
        <X>3</X>
        <Y>17</Y>
      </DisplayString>
    </DisplayElement>

    <!-- LIST BEGIN HERE -->
    <DisplaySet id="currency" x="1" y="35" maxNumberOfRecord="6" dataSourceName="$Currency" displayDirection="vertical">
      <ItemTemplate height="17">
        <DisplayRectangle x="2" y="15" width="222" height="1" bgcolor="Gray"></DisplayRectangle>
        <DisplayRectangle x="0" y="0" width="226" height="15" bgcolor="White" border-color="Light2"></DisplayRectangle>



        <!-- symbol -->
        <DisplayString font="unifont" width="100" height="13" bgcolor="Light5">
          <DisplayStr> $*x - $*y</DisplayStr>
          <X>1</X>
          <Y>1</Y>
        </DisplayString>

        <DisplayString font="unifont" width="50" height="13" halign="right" >
          <DisplayStr>$*r</DisplayStr>
          <X>175</X>
          <Y>1</Y>
        </DisplayString>


      </ItemTemplate>
    </DisplaySet>

    <DisplayElement>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_up.bmp</Bitmap>
        <X>98</X>
        <Y>35</Y>
        <displayCondition>
          <conditionType>scrollUp</conditionType>
        </displayCondition>
      </DisplayBitmap>
      <DisplayBitmap isfile="true" >
        <Bitmap>/app/resource/icon/arrow_down.bmp</Bitmap>
        <X>98</X>
        <Y>131</Y>
        <displayCondition>
          <conditionType>scrollDown</conditionType>
        </displayCondition>
      </DisplayBitmap>
    </DisplayElement>
    <!-- $*T > stock update time -->
    <SoftKeys>
      <SoftKey useshapeid="1">
        <Icon textoffset="18" x="3" y="4" isfile="true">/app/resource/icon/screen4.bmp</Icon>
        <Action>
          <SwitchSCR/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <ReverseCurrency/>
        </Action>
      </SoftKey>
      <SoftKey>
        <Action>
          <RefreshCurrency/>
        </Action>
      </SoftKey>
    </SoftKeys>
  </IdleScreen>
</Screen>
';
    return($cfg);
}

function endpoint_gs2000($base){
    $cfg = '<?xml version="1.0"?>
<Screen>
<IdleScreen>
<ShowStatusLine>true</ShowStatusLine>
<DisplayBitmap>
<Bitmap>' . $base . '</Bitmap>
<X>0</X>
<Y>0</Y>
</DisplayBitmap>
<DisplayString font="f8">
<DisplayStr>$W, $M $d</DisplayStr>
<X>0</X>
<Y>0</Y>
</DisplayString>
<DisplayString halign="Center" valign="Bottom">
<DisplayStr>Extension:$X</DisplayStr>
<X>65</X>
<Y>48</Y>
</DisplayString>
</IdleScreen>
</Screen>
';
    return($cfg);
}
?>