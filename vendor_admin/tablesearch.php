<?php
    require 'init.php';
    if(isset($_POST['searchcri'])){
         require 'session.php';

        $sqlcomman = "SELECT * FROM vendor WHERE vendor_email='{$_SESSION['login_user']}'";
        $rescomman = mysqli_query($con,$sqlcomman);
        $rowcomman = mysqli_fetch_assoc($rescomman);

        $sitem=preg_replace("#[^0-9a-z]#i","",$_POST['searchcri']);
        $sqltablesey = "SELECT * FROM quotation WHERE item_type LIKE '%{$sitem}%' AND view='yes' AND vendor = '{$rowcomman['vendor_username']}'";
        $restablesey = mysqli_query($con,$sqltablesey);
        $county = mysqli_num_rows($restablesey);
        $searchresy = null;
        while($rowtablesey= mysqli_fetch_array($restablesey)){
            $searchresy[] = $rowtablesey;
        }
        $sqltablesen = "SELECT * FROM quotation WHERE item_type  LIKE '%{$sitem}%' AND view='no' AND vendor = '{$rowcomman['vendor_username']}'";
        $restablesen = mysqli_query($con,$sqltablesen);
        $countn = mysqli_num_rows($restablesen);
        $searchresn = null;
        while($rowtablesen= mysqli_fetch_array($restablesen)){
            $searchresn[] = $rowtablesen;
        }
        if($county>0){
            foreach($searchresy as $searchitemsy){
                $taby = '<table class="table ">
                            <tr id="'.$searchitemsy['id'].'" style="background-color:#b4b3b3;">
                                <th class="tableheader" data-field="state" data-checkbox="true" data-formatter="starsFormatter" style="width:200px;">
                                    <input class="chk2" type="checkbox" onclick="check();" name="item2" value="'.$searchitemsy["id"].'"/>
                                </th>
                                <td class="tableheader" style="width:400px;">Qutaion for :'.$searchitemsy['full_name'].'</td>
                                <td style="width:40px;"><button class="btn btn-primary" value="'.$searchitemsy['id'].'" onclick="viewquota('.$searchitemsy['id'].'); readmodal('.$searchitemsy['id'].');"  data-toggle="modal" data-target="#read">View  </button></td>
                                <td style="width:40px;"><button class="btn btn-primary" data-toggle="modal" data-target="#additionaldetails" onclick="accept( '.$searchitemsy['id'].');">Accept</button></td>
                                <td style="width:40px;"><button class="btn btn-primary"onclick="reject('.$searchitemsy['id'].');">Reject</button></td>
                            </tr>
                        </table>';
            $tabley = "{$taby}";
            echo $tabley;
            } 
        }
        if($countn>0){
            foreach($searchresn as $searchitemsn){
                $tabn = '<table class="table ">
                            <tr id="'.$searchitemsn['id'].'" >
                                <th class="tableheader" data-field="state" data-checkbox="true" data-formatter="starsFormatter" style="width:200px;">
                                    <input class="chk2" type="checkbox" onclick="check();" name="item2" value="'.$searchitemsn["id"].'"/>
                                </th>
                                <td class="tableheader" style="width:400px;">Qutaion for :'.$searchitemsn['full_name'].'</td>
                                <td style="width:40px;"><button class="btn btn-primary" value="'.$searchitemsn['id'].'" onclick="viewquota('.$searchitemsn['id'].'); readmodal('.$searchitemsn['id'].');"  data-toggle="modal" data-target="#read">View  </button></td>
                                <td style="width:40px;"><button class="btn btn-primary" data-toggle="modal" data-target="#additionaldetails" onclick="accept( '.$searchitemsn['id'].');">Accept</button></td>
                                <td style="width:40px;"><button class="btn btn-primary" onclick="reject('.$searchitemsn['id'].');">Reject</button></td>
                            </tr>
                        </table>';
            $tablen = "{$tabn}";
            echo $tablen;
            } 
        }
        
    }
?>