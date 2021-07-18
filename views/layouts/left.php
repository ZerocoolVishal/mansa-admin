<?php

use app\components\UserIdentity;
use yii\helpers\Html;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;

?>
<!-- Sidebar -->
<ul class="navbar-nav sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center mb-3" href="#">
        <?= Html::img('@web/images/logo_2.png', ['width' => '170px', 'class' => 'd-none d-md-block']) ?>
    </a>

    <?php if(UserIdentity::isAvailable('admin')): ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Administration
    </div>

    <li class="nav-item <?= ($controller == 'admin')? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fa fa-user"></i>
            <span>Admin</span>
        </a>
        <div id="admin" class="collapse <?= ($controller == 'admin')? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('View Admins', ['admin/index'], ['class' => 'collapse-item' . (($action == 'admin/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('contact-us') || UserIdentity::isAvailable('appointments')): ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Bookings & Messages
    </div>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('appointments') || UserIdentity::isAvailable('doctor-timing') ): ?>
    <li class="nav-item <?= (in_array($controller, ['appointments', 'doctor-timing']))? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appointments" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span>Appointments</span>
        </a>
        <div id="appointments" class="collapse <?= (in_array($controller, ['appointments', 'doctor-timing']))? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('View Appointments', ['appointments/index'], ['class' => 'collapse-item' . (($action == 'appointments/index')? ' active' : '')]) ?>
                <?= Html::a('Doctor Timing', ['doctor-timing/index'], ['class' => 'collapse-item' . (($action == 'doctor-timing/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('contact-us')): ?>
    <li class="nav-item <?= ($controller == 'contact-us')? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contact-us" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-comment"></i>
            <span>Messages</span>
        </a>
        <div id="contact-us" class="collapse <?= ($controller == 'contact-us')? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('All Messages', ['contact-us/index'], ['class' => 'collapse-item' . (($action == 'contact-us/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <?php if(UserIdentity::isAvailable('blogs')): ?>
    <li class="nav-item <?= (in_array($controller, ['blogs', 'blog-categories']))? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseTwo" class="collapse <?= (in_array($controller, ['blogs', 'blog-categories', 'blog-authors']))? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('Create Post', ['blogs/create'], ['class' => 'collapse-item' . (($action == 'blogs/create')? ' active' : '')]) ?>
                <?= Html::a('All Posts', ['blogs/index'], ['class' => 'collapse-item' . (($action == 'blogs/index')? ' active' : '')]) ?>
                <?= Html::a('Authors', ['blog-authors/index'], ['class' => 'collapse-item' . (($action == 'blog-authors/index')? ' active' : '')]) ?>
                <?= Html::a('Categories', ['blog-categories/index'], ['class' => 'collapse-item' . (($action == 'blog-categories/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('doctors')): ?>
    <li class="nav-item <?= (in_array($controller, ['doctors']))? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctors" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Doctors</span>
        </a>
        <div id="doctors" class="collapse <?= (in_array($controller, ['doctors']))? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('Create Doctor', ['doctors/create'], ['class' => 'collapse-item' . (($action == 'doctors/create')? ' active' : '')]) ?>
                <?= Html::a('All Doctor', ['doctors/index'], ['class' => 'collapse-item' . (($action == 'doctors/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('features')): ?>
    <li class="nav-item <?= ($controller == 'features')? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#features" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Features</span>
        </a>
        <div id="features" class="collapse <?= ($controller == 'features')? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('Create Feature', ['features/create'], ['class' => 'collapse-item' . (($action == 'features/create')? ' active' : '')]) ?>
                <?= Html::a('All Features', ['features/index'],['class' => 'collapse-item' . (($action == 'features/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('testimonies')): ?>
    <li class="nav-item <?= ($controller == 'testimonies')? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#testimonies" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-bars"></i>
            <span>Testimonies</span>
        </a>
        <div id="testimonies" class="collapse <?= ($controller == 'testimonies')? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('Create Testimony', ['testimonies/create'], ['class' => 'collapse-item' . (($action == 'testimonies/create')? ' active' : '')]) ?>
                <?= Html::a('All Testimonies', ['testimonies/index'], ['class' => 'collapse-item' . (($action == 'testimonies/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('faq')): ?>
    <li class="nav-item <?= ($controller == 'faq')? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#faq" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-question"></i>
            <span>FAQs</span>
        </a>
        <div id="faq" class="collapse <?= ($controller == 'faq')? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('Create FAQ', ['faq/create'], ['class' => 'collapse-item' . (($action == 'faq/create')? ' active' : '')]) ?>
                <?= Html::a('All FAQs', ['faq/index'], ['class' => 'collapse-item' . (($action == 'faq/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('pages')): ?>
    <li class="nav-item <?= ($controller == 'pages')? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pages" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>Pages</span>
        </a>
        <div id="pages" class="collapse <?= ($controller == 'pages')? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('Create Pages', ['pages/create'], ['class' => 'collapse-item' . (($action == 'pages/create')? ' active' : '')]) ?>
                <?= Html::a('All Pages', ['pages/index'], ['class' => 'collapse-item' . (($action == 'pages/index')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(UserIdentity::isAvailable('settings')): ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Configurations
    </div>

    <li class="nav-item <?= ($controller == 'settings')? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Settings</span>
        </a>
        <div id="settings" class="collapse <?= ($controller == 'settings')? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?= Html::a('SMS Module', ['settings/sms'], ['class' => 'collapse-item' . (($action == 'settings/sms')? ' active' : '')]) ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
