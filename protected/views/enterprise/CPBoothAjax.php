
    <?php foreach($posts as $row):?>
      <ul class="searchData_ul">
        <li><?php echo $row['name'];?></li>
        <li>
        <ul class="droplist">
         <?php 
		 if(isset($row['data'][16])):
		 foreach($row['data'][16] as $cont16):?>
          <li><?php echo $cont16['title'];?></li>
          
          <?php
		   endforeach; 
		   endif;
		   ?>
        </ul>
        </li>
        <li><ul class="droplist">
          <?php 
		 if(isset($row['data'][15])):
		 foreach($row['data'][15] as $cont15):?>
          <li><?php echo $cont15['title'];?></li>
          <?php
		   endforeach; 
		   endif;
		   ?>
         
        </ul></li>
        <li><ul class="droplist">
        <?php 
		 if(isset($row['data'][15])):
		 foreach($row['data'][15] as $cont15):?>
          <li><?php echo $cont15['title'];?></li>
          <?php
		   endforeach; 
		   endif;
		   ?>
        </ul></li>
        <li><ul class="droplist">
          <li>工荒倒逼中国制造升级</li>
          <li>2.逃避高成本工厂面临搬离的困惑</li>
          <li>3.双向调整解决用工荒问题</li>
          <li>4.用工荒背后的八大罪状</li>
          <li>5.用工压力难消化  </li>  
         
        </ul></li>
      </ul>
	  <?php endforeach; ?>
       
    </div>
   <?php 
	 //分页widget代码: 
	 $this->widget('NewPager',array('pages'=>$pages));
	 ?>
