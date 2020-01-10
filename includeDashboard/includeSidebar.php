

<div class="sidebar">
    <div class="sidebar__scroll">
        <div >
            
  
  
            <div class="sidebar__user">
                <div class="sidebar__user-avatar">
                  <!--<img src="img/avatars/placeholder.png" alt="" width="68" height="68" class="rounded-circle">-->
                   <!--<span class="sidebar__user-avatar-placeholder">-->
                        <!--<span class="iconfont iconfont-avatar-placeholder"></span>-->
                        <!--<img src="" alt="" width="68" height="68" >-->
                        <span class="sidebar__user-avatar-placeholder">
                        <span class="iconfont iconfont-avatar-placeholder"></span>
                    </span>
                    </span>
                    
                    
                </div>
                <div class="dropdown sidebar__user-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user_name'] . " " . $_SESSION['user_type_id'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        
                        <a class="dropdown-item" href="/AdminPage/Logout.php">Sign Out</a>
                    </div>
                </div>
            </div>
            <ul class="sidebar-nav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <li class="sidebar-nav__item">
                    <a class="sidebar-nav__link" href="#">
                        <span class="sidebar-nav__item_icon iconfont iconfont-layout"></span>
                        <span class="sidebar-nav__item-text" >Category</span>
                    </a>
                    <ul class="sidebar-subnav">
                       
                       
                           <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="cm1.php">Add Category</a></li>
                      
                        
                         
                       <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="categorylist.php">Update/Delete Category</a></li>
                         
                      
                                </ul>
                </li>
                <li class="sidebar-nav__item">
                    <a class="sidebar-nav__link" href="#">
                        <span class="sidebar-nav__item_icon iconfont iconfont-ui"></span>
                        <span class="sidebar-nav__item-text">SubCategory</span>
                    </a>
                    <ul class="sidebar-subnav">
                        <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="subcategory.php"> Add Subcategory</a></li>
                        <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="subcategorylist.php">Update/Delete Subcategory</a></li>
                    </ul>
                </li>
                <li class="sidebar-nav__item">
                    <a class="sidebar-nav__link" href="#">
                        <span class="sidebar-nav__item_icon iconfont iconfont-input"></span>
                        <span class="sidebar-nav__item-text">Food Item</span>
                    </a>
                    <ul class="sidebar-subnav">
                        <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="FoodItemMenu.php">Add Food Items</a></li>
                        <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="itemlist.php">Update/Delete Food Items</a></li>
                    </ul>
                </li>
                <li class="sidebar-nav__item">
                    <a class="sidebar-nav__link" href="#">
                        <span class="sidebar-nav__item_icon iconfont iconfont-component"></span>
                        <span class="sidebar-nav__item-text">Tables</span>
                    </a>
                    <ul class="sidebar-subnav">
                        <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="table.php">Add Tables</a></li>
                        <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="tablelist.php">Update/Delete Tables</a></li>
                    </ul>
                </li>
                <li class="sidebar-nav__item">
                    <a class="sidebar-nav__link" href="#">
                        <span class="sidebar-nav__item_icon iconfont iconfont-ui"></span>
                        <span class="sidebar-nav__item-text">Reports</span>
                    </a>
                    <ul class="sidebar-subnav">
                        
                         <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="Reports.php">Order Report</a></li>
                         <li class="sidebar-subnav__item"><a class="sidebar-subnav__link" href="TableReport.php">Generate Invoice Report</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="sidebar-nav__footer">
            <div class="sidebar__collapse">
                <span class="icon iconfont iconfont-collapse-left-arrows"></span>
            </div>
        </div>
    </div>
</div>
