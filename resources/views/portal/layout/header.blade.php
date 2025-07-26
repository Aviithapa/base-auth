  <div class="page-header">
      <div class="header-wrapper grid grid-cols-12 m-0">
          <form class="form-inline search-full col-auto" action="#" method="get">
              <div class="form-group w-full">
                  <div class="Typeahead Typeahead--twitterUsers">
                      <div class="u-posRelative">
                          <input class="demo-input Typeahead-input form-control-plaintext w-full" type="text"
                              placeholder="Search Anything Here..." name="q" title="" autofocus />
                          <div class="spinner-border Typeahead-spinner" role="status">
                              <span class="sr-only">Loading...</span>
                          </div>
                          <i class="close-search" data-feather="x"></i>
                      </div>
                      <div class="Typeahead-menu"></div>
                  </div>
              </div>
          </form>
          <div class="header-logo-wrapper hidden col-auto p-0 lg:block">
              <div class="logo-wrapper">
                  <a href="index.html"><img class="max-w-full h-auto for-light" src="../assets/images/logo/logo.png"
                          alt="" /><img class="max-w-full h-auto for-dark"
                          src="../assets/images/logo/logo_dark.png" alt="" /></a>
              </div>
              <div class="toggle-sidebar">
                  <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
              </div>
          </div>
          <div class="left-header col-span-5 xxl:col-span-6 xl:col-span-5 lg:col-span-4 md:col-span-3">
              <div class="notification-slider">
                  <div class="h-full !flex items-center">
                      <img src="../assets/images/giftools.gif" alt="gif" />
                      <h6 class="mb-0 font-normal">
                          <span class="font-primary">Don't Miss Out! </span><span class="f-light">
                              Our new update has been released.</span>
                      </h6>
                      <i class="icon-arrow-top-right f-light"></i>
                  </div>
                  <div class="h-full !flex items-center">
                      <img src="../assets/images/giftools.gif" alt="gif" />
                      <h6 class="mb-0 font-normal">
                          <span class="f-light">Something you love is now on sale!</span>
                      </h6>
                      <a class="ms-1" href="https://1.envato.market/3GVzd" target="_blank">Buy now !</a>
                  </div>
              </div>
          </div>
          <div
              class="nav-right col-span-7 xxl:col-span-6 xl:col-span-7 md:col-span-11 float-right right-header p-0 ms-auto">
              <ul class="nav-menus">
                  <li class="language-nav">
                      <div class="translate_wrapper">
                          <div class="current_lang">
                              <div class="lang">
                                  <i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN</span>
                              </div>
                          </div>
                          <div class="more_lang">
                              <div class="lang selected" data-value="en">
                                  <i class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span>
                                          (US)</span></span>
                              </div>
                              <div class="lang" data-value="de">
                                  <i class="flag-icon flag-icon-de"></i><span class="lang-txt">Deutsch</span>
                              </div>
                              <div class="lang" data-value="es">
                                  <i class="flag-icon flag-icon-es"></i><span class="lang-txt">Español</span>
                              </div>
                              <div class="lang" data-value="fr">
                                  <i class="flag-icon flag-icon-fr"></i><span class="lang-txt">Français</span>
                              </div>
                              <div class="lang" data-value="pt">
                                  <i class="flag-icon flag-icon-pt"></i><span class="lang-txt">Português<span>
                                          (BR)</span></span>
                              </div>
                              <div class="lang" data-value="cn">
                                  <i class="flag-icon flag-icon-cn"></i><span class="lang-txt">简体中文</span>
                              </div>
                              <div class="lang" data-value="ae">
                                  <i class="flag-icon flag-icon-ae"></i><span class="lang-txt">لعربية <span>
                                          (ae)</span></span>
                              </div>
                          </div>
                      </div>
                  </li>
                  <li class="fullscreen-body">
                      <span><svg id="maximize-screen">
                              <use href="../assets/svg/icon-sprite.svg#full-screen"></use>
                          </svg></span>
                  </li>
                  <li>
                      <span class="header-search"><svg>
                              <use href="../assets/svg/icon-sprite.svg#search"></use>
                          </svg></span>
                  </li>
                  <li class="onhover-dropdown">
                      <svg>
                          <use href="../assets/svg/icon-sprite.svg#star"></use>
                      </svg>
                      <div class="onhover-show-div bookmark-flip">
                          <div class="flip-card">
                              <div class="flip-card-inner">
                                  <div class="front">
                                      <h6 class="mb-0 dropdown-title f-[18px]">Bookmark</h6>
                                      <ul class="bookmark-dropdown">
                                          <li>
                                              <div class="grid grid-cols-12 gap-x-3.5">
                                                  <div class="col-span-4 text-center">
                                                      <div class="bookmark-content">
                                                          <div class="bookmark-icon">
                                                              <i data-feather="file-text"></i>
                                                          </div>
                                                          <span>Forms </span>
                                                      </div>
                                                  </div>
                                                  <div class="col-span-4 text-center">
                                                      <div class="bookmark-content">
                                                          <div class="bookmark-icon">
                                                              <i data-feather="user"></i>
                                                          </div>
                                                          <span>Profile</span>
                                                      </div>
                                                  </div>
                                                  <div class="col-span-4 text-center">
                                                      <div class="bookmark-content">
                                                          <div class="bookmark-icon">
                                                              <i data-feather="server"></i>
                                                          </div>
                                                          <span>Tables</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </li>
                                          <li class="text-center">
                                              <a class="flip-btn btn btn-primary w-full block rounded-full text-white font-bold hover:text-white"
                                                  id="flip-btn" href="#!">Add Bookmark
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="back">
                                      <ul>
                                          <li>
                                              <div class="bookmark-dropdown flip-back-content">
                                                  <input type="text" placeholder="Search..." />
                                              </div>
                                          </li>
                                          <li>
                                              <a class="flip-back btn btn-primary w-full block rounded-full text-white font-bold hover:text-white"
                                                  id="flip-back" href="#!">Back
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </li>
                  <li>
                      <div class="mode">
                          <svg>
                              <use href="../assets/svg/icon-sprite.svg#moon"></use>
                          </svg>
                      </div>
                  </li>
                  <li class="cart-nav onhover-dropdown">
                      <div class="cart-box">
                          <svg>
                              <use href="../assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                          </svg><span class="badge rounded-full badge-danger text-white">2
                          </span>
                      </div>
                      <div class="cart-dropdown onhover-show-div">
                          <h6 class="mb-0 dropdown-title f-[18px]">Cart</h6>
                          <ul>
                              <li>
                                  <div class="flex relative">
                                      <img class="max-w-full h-auto me-3 w-14 rounded-[5px]"
                                          src="../assets/images/other-images/cart-img.jpg" alt="" />
                                      <div class="grow">
                                          <span>Furniture Chair for Home</span>
                                          <div class="qty-box">
                                              <div class="input-group flex">
                                                  <span class="input-group-prepend"><button
                                                          class="btn quantity-left-minus" type="button"
                                                          data-type="minus" data-field="">
                                                          -
                                                      </button></span><input class="form-control input-number"
                                                      type="text" name="quantity" value="1" /><span
                                                      class="input-group-prepend"><button
                                                          class="btn quantity-right-plus" type="button"
                                                          data-type="plus" data-field="">
                                                          +
                                                      </button></span>
                                              </div>
                                          </div>
                                          <h6 class="font-primary">$12.45</h6>
                                      </div>
                                      <div class="close-circle">
                                          <a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="flex relative">
                                      <img class="max-w-full h-auto me-3 w-14 rounded-[5px]"
                                          src="../assets/images/other-images/cart-img1.jpg" alt="" />
                                      <div class="grow">
                                          <span>Rest Well Chair</span>
                                          <div class="qty-box">
                                              <div class="input-group flex">
                                                  <span class="input-group-prepend"><button
                                                          class="btn quantity-left-minus" type="button"
                                                          data-type="minus" data-field="">
                                                          -
                                                      </button></span><input class="form-control input-number"
                                                      type="text" name="quantity" value="1" /><span
                                                      class="input-group-prepend"><button
                                                          class="btn quantity-right-plus" type="button"
                                                          data-type="plus" data-field="">
                                                          +
                                                      </button></span>
                                              </div>
                                          </div>
                                          <h6 class="font-primary">$49.00</h6>
                                      </div>
                                      <div class="close-circle">
                                          <a class="bg-danger" href="#">
                                              <i data-feather="x"></i></a>
                                      </div>
                                  </div>
                              </li>
                              <li class="total">
                                  <h6 class="mb-0">
                                      Order Total : <span class="f-right">$1000.00</span>
                                  </h6>
                              </li>
                              <li class="text-center">
                                  <a class="block view-cart font-bold btn btn-primary text-white w-full rounded-full hover:text-white"
                                      href="cart.html">View Cart</a><a
                                      class="view-checkout btn btn-primary text-white w-full font-bold rounded-full hover:text-white"
                                      href="checkout.html">
                                      Checkout</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="onhover-dropdown">
                      <div class="notification-box">
                          <svg>
                              <use href="../assets/svg/icon-sprite.svg#notification"></use>
                          </svg><span class="badge rounded-full badge-success text-white">4
                          </span>
                      </div>
                      <div class="onhover-show-div notification-dropdown">
                          <h6 class="mb-0 dropdown-title f-[18px]">Notifications</h6>
                          <ul>
                              <li class="border-primary toast default-show-toast items-center text-light fade show !border-l-4 !border-y-0 !border-r-0"
                                  aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                  <div class="flex justify-between">
                                      <div class="toast-body p-3">
                                          <p>Delivery processing</p>
                                      </div>
                                      <button class="btn-close ml-auto me-2" type="button" data-bs-dismiss="toast"
                                          aria-label="Close"></button>
                                  </div>
                              </li>
                              <li class="border-success toast default-show-toast items-center text-light fade show !border-l-4 !border-y-0 !border-r-0"
                                  aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                  <div class="flex justify-between">
                                      <div class="toast-body p-3">
                                          <p>Order Complete</p>
                                      </div>
                                      <button class="btn-close ml-auto me-2" type="button" data-bs-dismiss="toast"
                                          aria-label="Close"></button>
                                  </div>
                              </li>
                              <li class="border-secondary toast default-show-toast items-center text-light fade show !border-l-4 !border-y-0 !border-r-0"
                                  aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                  <div class="flex justify-between">
                                      <div class="toast-body p-3">
                                          <p>Tickets Generated</p>
                                      </div>
                                      <button class="btn-close ml-auto me-2" type="button" data-bs-dismiss="toast"
                                          aria-label="Close"></button>
                                  </div>
                              </li>
                              <li class="border-warning toast default-show-toast items-center text-light fade show !border-l-4 !border-y-0 !border-r-0"
                                  aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                  <div class="flex justify-between">
                                      <div class="toast-body p-3">
                                          <p>Delivery Complete</p>
                                      </div>
                                      <button class="btn-close ml-auto me-2" type="button" data-bs-dismiss="toast"
                                          aria-label="Close"></button>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li class="profile-nav onhover-dropdown pe-0 py-0">
                      <div class="flex profile-media items-center">
                          <img class="-[10px]" src="../assets/images/dashboard/profile.png" alt="" />
                          <div class="grow w-[calc(100%_-_250px)]">
                              <span>Emay Walter</span>
                              <p class="mb-0">
                                  Admin <i class="align-middle fa-solid fa-angle-down"></i>
                              </p>
                          </div>
                      </div>
                      <ul class="profile-dropdown onhover-show-div">
                          <li>
                              <a class="flex items-center" href="sign-up.html"><i
                                      data-feather="user"></i><span>Account </span></a>
                          </li>
                          <li>
                              <a class="flex items-center" href="mail-box.html"><i
                                      data-feather="mail"></i><span>Inbox</span></a>
                          </li>
                          <li>
                              <a class="flex items-center" href="task.html"><i
                                      data-feather="file-text"></i><span>Taskboard</span></a>
                          </li>
                          <li>
                              <a class="flex items-center" href="add-user.html"><i
                                      data-feather="settings"></i><span>Settings</span></a>
                          </li>
                          <li>
                              <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                  class="hidden">
                                  @csrf
                              </form>

                              <a class="flex items-center cursor-pointer" href="#"
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  <i data-feather="log-in"></i>
                                  <span>Log out</span>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
              <div class="ProfileCard-avatar"><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-airplay m-0"
                ><path
                    d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"
                  ></path><polygon
                    points="12 15 17 21 7 21 12 15"
                  ></polygon></svg></div>
              <div class="ProfileCard-details">
                <div class="ProfileCard-realName">Abhishek Thapa</div>
              </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">Your search turned up 0 results. This most
              likely means the backend is down, yikes!</div>
          </script>
      </div>
  </div>
