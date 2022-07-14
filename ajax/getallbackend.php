<?php
    include('../connection.php');
    if(password_verify("backend", $_POST['token']))
    {
        $check=$db->prepare('select distinct backend from ( select backend from errors504 union all select backend from errors500 ) a ORDER BY a.backend');
            $data=array();
            $check->execute($data);
            $count=0;
            if($check->rowcount()>0)
            {
                ?>
                <select id='backend' name="backend" class="form-control">
                	<option value="0">Select Backend</option>
                <?php
                while($datarow=$check->fetch())
                {
                    
                    ?>
                    <option value="<?php echo $datarow['backend'];?>"><?php echo $datarow['backend'];?></option>
                        <?php
                   
                     
            }
        ?></select><?php
    }
}
?>