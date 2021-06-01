<!-- Add your site or application content here -->
<header class="c-navbar u-mb-medium justify-content-between">
    <a class="c-navbar__brand" href="#!">
        <!-- <img src="<?php echo URLROOT ?>/public/img/logo.png" alt="Dress UI"> -->
        <h4>Dress</h4>
    </a>

    <!-- Navigation items that will be collapes and toggle in small viewports -->
    <!-- <nav class="c-nav collapse" id="main-nav">
                <ul class="c-nav__list">
                    <li class="c-nav__item">
                        <a class="c-nav__link" href="#!">Events</a>
                    </li>
                    <li class="c-nav__item">
                        <a class="c-nav__link" href="#!">Browse</a>
                    </li>
                    <li class="c-nav__item">
                        <a class="c-nav__link" href="#!">Your Ticket</a>
                    </li>
                    <li class="c-nav__item">
                        <div class="c-field c-field--inline has-icon-right u-hidden-up@tablet">
                            <span class="c-field__icon">
                                <i class="fa fa-search"></i> 
                            </span>
                            
                            <label class="u-hidden-visually" for="navbar-search-small">Seach</label>
                            <input class="c-input" id="navbar-search-small" type="text" placeholder="Search">
                        </div>
                    </li>
                </ul>
            </nav> -->
    <!-- // Navigation items  -->


    <div class="c-dropdown dropdown">
        <a class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- <img class="c-avatar__img" src="img/avatar-72.jpg" alt="User's Profile Picture"> -->
            <?= $_SESSION['isAdmin'] ? 'ADMIN' : $_SESSION['phoneNumber'] ?>
        </a>

        <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
            <a class="c-dropdown__item dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </div>
    </div>

    <button class="c-nav-toggle" type="button" data-toggle="collapse" data-target="#main-nav">
        <span class="c-nav-toggle__bar"></span>
        <span class="c-nav-toggle__bar"></span>
        <span class="c-nav-toggle__bar"></span>
    </button><!-- // .c-nav-toggle -->
</header>
<div class="container-fluid">