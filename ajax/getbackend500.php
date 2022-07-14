<?php
    include('../connection.php');
    if(password_verify("backend", $_POST['token']))
    {
        $check=$db->prepare('SELECT DISTINCT backend FROM errors500');
            $data=array();
            $check->execute($data);
            $count=0;
            if($check->rowcount()>0)
            {
                ?>
                <select id='backend' name="backend" class="form-control">
                	<option value="all">All Backends</option>
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