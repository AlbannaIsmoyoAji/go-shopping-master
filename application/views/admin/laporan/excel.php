<a href="<?php echo base_url('phpexcel/export'); ?>">EXPORT</a>

<br>
<?php 

foreach($data as $row)
{
    echo $row['username'] . "<br>";
}

?>