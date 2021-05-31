<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon" style="padding:10px;">
          <img src="<?php echo base_url().'uploads/logo.png'; ?>" style="height: 60px;max-width:100%;max-width:100%;">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item <?php if($page_name=='dashboard') echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Test Series Section
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if(($page_name=='new_question')||($page_name=='question_list')||($page_name=='add_question_1')) echo 'active'; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-exclamation-circle rotate-n-15"></i>
          <span>Test's Question</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Question</h6>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/new_question">Add Question</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/question_list">Questions</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Subject Section
      </div>

      <li class="nav-item <?php if(($page_name=='add_subject')||($page_name=='topics')||($page_name=='videos')||($page_name=='edit_video')) echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>admin/add_subject">
          <i class="fas fa-fw fa-atlas"></i>
          <span>Subjects</span></a>
      </li>



      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php if(($page_name=='create_test')||($page_name=='list_quiz')||($page_name=='assign_question')||($page_name=='result_preview')||($page_name=='test_result')) echo 'active'; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-pen-square rotate-n-15"></i>
          <span>Tests</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tests</h6>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/add_test">Add Test</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>admin/list_quiz">List of Test</a>
          </div>
        </div>
      </li>


  

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Course Section
      </div>
      <li class="nav-item <?php if(($page_name=='courses')) echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url().'admin/courses'; ?>">
          <i class="fas fa-fw fa-atlas"></i>
          <span>Course</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">



      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/soon'; ?>">
          <i class="fas fa-fw fa-atlas"></i>
          <span>Live Classes</span></a>
      </li>

        <hr class="sidebar-divider">
      <li class="nav-item <?php if($page_name=='banner') echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url().'admin/banner'; ?>">
          <i class="fas fa-fw fa-atlas"></i>
          <span>Banner</span></a>
      </li>


            <hr class="sidebar-divider">
          <li class="nav-item <?php if($page_name=='vacancy') echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url().'admin/vacancy'; ?>">
              <i class="fas fa-fw fa-atlas"></i>
              <span>Vacancy</span></a>
          </li>


      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/study_material'; ?>">
          <i class="fas fa-fw fa-sticky-note"></i>
          <span>Study Material</span></a>
      </li>



      <hr class="sidebar-divider">



      <li class="nav-item <?php if(($page_name=='demo_video')) echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url().'admin/demo_video'; ?>">
          <i class="fas fa-fw fa-file-video"></i>
          <span>Demo Videos</span></a>
      </li>
      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if(($page_name=='packages')||($page_name=='add_package')||($page_name=='package_test')||($page_name=='package_video')||($page_name=='package_test')) echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url().'admin/package'; ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Subscription</span></a>
      </li>
    <hr class="sidebar-divider">
      <div class="sidebar-heading">
       User Section
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if(($page_name=='teachers')||($page_name=='edit_teacher')) echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url().'admin/teachers'; ?>">
          <i class="fas fa-fw fa-chalkboard-teacher"></i>
          <span>Teacher</span></a>
      </li>

      <li class="nav-item <?php if(($page_name=='users')) echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url().'admin/users'; ?>">
          <i class="fas fa-fw fa-user-graduate"></i>
          <span>Users</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>