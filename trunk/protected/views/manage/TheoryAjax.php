 <?php foreach($data['posts'] as $row):?>
      <ul class="searchData_ul">
        <li><?php echo $row['title'];?></li>
        <li><?php echo $row['MemName'];?></li>
        <li><?php echo $row['updtime'];?></li>
        <li><?php echo $row['CompanyName'];?></li>
      </ul>
      <?php endforeach; ?>
     <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$data['pages']));
	 ?>
    