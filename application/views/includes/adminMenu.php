<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?php echo base_url();?>index.php/login/" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Product</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/addproduct/">Add Product</a></li>
                <li><a class="nav-link" href="widget-data.html">Add/Delete</a></li>
              </ul>
            </li>
            
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user-check"></i><span>Customer</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url();?>index.php/customer/customer_list/1">Active List</a></li>
                <li><a href="<?php echo base_url();?>index.php/customer/customer_list/2">Inactive List</a></li>
                <li><a href="<?php echo base_url();?>index.php/customer/customer_list/3">Paid Inactive</a></li>
                <li><a href="<?php echo base_url();?>index.php/customer">Customer Report</a></li>
                
              </ul>
            </li>
            
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Wallet Balance</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/pin/new_req_pin">New Request</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/pin/mpin_detail">MPIN Details</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="copy"></i><span>Accounting</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/daybook/1">Outer Daybook</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/daybook/2">Inner Daybook</a></li>
                <li><a class="nav-link" href="email-compose.html">Cash Transaction</a></li>
              </ul>
            </li>
          
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="mail"></i><span>Mobile SMS</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/sms_setting">Sms Setting</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/sms/1">Single Customer</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/sms/2">All Customer</a></li>
				 <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/sms/3">Upgrading Wise SMS</a></li>
                <li><a class="nav-link" href="buttons.html">Product Promotion</a></li>
                <li><a class="nav-link" href="collapse.html">Group Rank</a></li>
               
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Website</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="avatar.html">Contact Us</a></li>
                <li><a class="nav-link" href="card.html">Marquee Content</a></li>
              </ul>
            </li>
            
           
          </ul>