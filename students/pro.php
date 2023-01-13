<?php

    if($fetch->status == "" && $fetch->assign_num == "" && $fetch->picture == "" && $fetch->phone == ""  ){ 

        echo "<span style='color:red;'>0%</span>"; 

    }elseif($fetch->status == !"" && $fetch->assign_num == "" && $fetch->picture == "" && $fetch->phone == "" || 
    $fetch->status == "" && $fetch->assign_num == !"" && $fetch->picture == "" && $fetch->phone == "" || 
    $fetch->status == "" && $fetch->assign_num == "" && $fetch->picture == !"" && $fetch->phone == "" || 
    $fetch->status == "" && $fetch->assign_num == "" && $fetch->picture == "" && $fetch->phone == !"" ){ 

        echo "<span style='color:red;'>25%</span>"; 

    }elseif($fetch->status == !"" && $fetch->assign_num == !"" && $fetch->picture == "" && $fetch->phone == "" || 
    $fetch->status == "" && $fetch->assign_num == !"" && $fetch->picture == !"" && $fetch->phone == "" || 
    $fetch->status == "" && $fetch->assign_num == "" && $fetch->picture == !"" && $fetch->phone == !"" ){ 

        echo "<span style='color:orange;'>50%</span>"; 

    }elseif($fetch->status == !"" && $fetch->assign_num == !"" && $fetch->picture == !"" && $fetch->phone == "" || 
    $fetch->status == "" && $fetch->assign_num == !"" && $fetch->picture == !"" && $fetch->phone == !""){ 

        echo "<span style='color:orange;'>75%</span>";    
    }
    else{

        echo "<span style='color:green;'>100%</span>"; 
    }
?>