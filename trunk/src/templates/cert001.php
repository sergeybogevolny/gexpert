<STYLE type="text/css">
    <!--
    p {margin: 0; padding: 0;}	.ft00{font-size:52px;font-family:Times;color:#221f1f;}
    .ft01{font-size:58px;font-family:Times;color:#743921;}
    .ft02{font-size:16px;font-family:Times;color:#969ca2;}
    .ft03{text-align: left;font-size:73px;font-family:Times;color:#601619;}
    .ft04{font-size:37px;font-family:Times;color:#000000;}
    .ft05{font-size:31px;font-family:Times;color:#000000;}
    .ft06{font-size:27px;font-family:Times;color:#000000;}
    .ft07{font-size:28px;font-family:Times;color:#000000;}
    -->
</STYLE>

<DIV id="page1-div" style="position:relative;width:1188px;height:918px;">
    <IMG width="1188" height="918" src="<?php echo AppImgURL; ?>cert001.png" alt="background image"/>
    <P style="position:absolute;top:176px;left:200px;white-space:nowrap" class="ft00">&#160;</P>
    <P style="position:absolute;top:386px;left:473px;white-space:nowrap" class="ft01">Presented to</P>
    <P style="position:absolute;top:850px;left:131px;white-space:nowrap" class="ft02"></P>
    <P style="position:absolute;top:210px;left:403px;white-space:nowrap" class="ft03">Certificate</P>
    <P style="position:absolute;top:458px;left:459px;white-space:nowrap" class="ft04">
        <?php echo $certdetails[0]['username']; ?>
        Attended <?php echo $certdetails[0]['test_name']; ?> Test
    </P>
    <P style="position:absolute;top:607px;left:240px;white-space:nowrap" class="ft05">On <?php echo $certdetails[0]['add_date']; ?></P>
    <P style="position:absolute;top:644px;left:608px;white-space:nowrap" class="ft06">And Scored <?php echo ($certdetails[0]['correct_answers'] / $certdetails[0]['total_questions']) * 100; ?> % </P>
    <P style="position:absolute;top:686px;left:608px;white-space:nowrap" class="ft07">Signature</P>
</DIV>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
