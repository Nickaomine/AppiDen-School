<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin AppiDen School</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/logo.jpg')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/daterange/daterange.css')}}" />
</head>

<body>
    <div id="loading-wrapper">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="page-wrapper">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="{{asset('assets/img/logo.jpg')}}" class="logo">
                    <img src="{{asset('assets/img/logo2.jpg')}}" alt="Logistiques AppS" style="border-radius: 6px;margin-left:-10px;width:80px" />
                    <p class="log"> AppiDen School</p>
                </a>
            </div>
            <div class="sidebar-menu">
						<ul>
							<li class="header-menu">TABLEAU DE BORD</li>
							<li class="sidebar-dropdown ">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">Classes</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{url('petitesection')}}" class="current-page">Petite Section</a>
										</li>
										<li>
											<a href="{{url('grandesection')}}">Grande Section</a>
										</li>
										<li>
											<a href="{{url('sil')}}">Sil</a>
										</li>
										</li>
										<li>
											<a href="{{url('cp')}}">CP</a>
										</li>
										</li>
										<li>
											<a href="{{url('ce1')}}">CE1</a>
										</li>
										</li>
										<li>
											<a href="{{url('ce2')}}">CE2</a>
										</li>
										</li>
										<li>
											<a href="{{url('cm1')}}">CM1</a>
										</li>
										</li>
										<li>
											<a href="{{url('cm2')}}">CM2</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="{{url('departement')}}">
									<i class="icon-archive1"></i>
									<span class="menu-text">Departements</span>
								</a>
							</li>
							<li>
								<a href="documents.html">
									<i class="icon-documents"></i>
									<span class="menu-text">Documents</span>
								</a>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-layout"></i>
									<span class="menu-text">Layouts</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="default-layout.html">Default Layout</a>
										</li>
										<li>
											<a href="slim-sidebar.html">Slim Layout</a>
										</li>
										<li>
											<a href="card-options.html">Card Options</a>
										</li>
										<li>
											<a href="drag-drop-cards.html">Drag and Drop Cards</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-book-open"></i>
									<span class="menu-text">Pages</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="account-settings.html">Account Settings</a>
										</li>
										<li>
											<a href="blog.html">Blog</a>
										</li>
										<li>
											<a href="cards.html">Cards</a>
										</li>
										<li>
											<a href="datepickers.html">Datepickers</a>
										</li>
										<li>
											<a href="faq.html">Faq</a>
										</li>
										<li>
											<a href="invoice.html">Invoice</a>
										</li>
										<li>
											<a href="search-results.html">Search Results</a>
										</li>
										<li>
											<a href="timeline.html">Timeline</a>
										</li>
										<li>
											<a href="comments.html">Comments</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="pricing.html">
									<i class="icon-dollar-sign"></i>
									<span class="menu-text">Pricing Plans</span>
								</a>
							</li>
							<li>
								<a href="user-profile.html">
									<i class="icon-user1"></i>
									<span class="menu-text">User Profile</span>
								</a>
							</li>
							<li>
								<a href="tasks.html">
									<i class="icon-check-circle"></i>
									<span class="menu-text">Tasks</span>
								</a>
							</li>
							<li class="header-menu">Forms</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-edit1"></i>
									<span class="menu-text">Inputs</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="form-inputs.html">Form Inputs</a>
										</li>
										<li>
											<a href="input-groups.html">Input Groups</a>
										</li>
										<li>
											<a href="check-radio.html">Check Boxes</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-file-text"></i>
									<span class="menu-text">Contact Forms</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="contact.html">Contact Form</a>
										</li>
										<li>
											<a href="contact2.html">Contact Form #2</a>
										</li>
										<li>
											<a href="contact3.html">Contact Form #3</a>
										</li>
										<li>
											<a href="contact4.html">Contact Form #4</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="bs-select.html">
									<i class="icon-pocket"></i>
									<span class="menu-text">BS Select</span>
								</a>
							</li>
							<li>
								<a href="editor.html">
									<i class="icon-edit-3"></i>
									<span class="menu-text">Editor</span>
								</a>
							</li>
							<li>
								<a href="input-masks.html">
									<i class="icon-eye-off"></i>
									<span class="menu-text">Input Masks</span>
								</a>
							</li>
							<li>
								<a href="input-tags.html">
									<i class="icon-terminal"></i>
									<span class="menu-text">Input Tags</span>
								</a>
							</li>
							<li>
								<a href="range-sliders.html">
									<i class="icon-toggle-right"></i>
									<span class="menu-text">Range Sliders</span>
								</a>
							</li>
							<li>
								<a href="wizard.html">
									<i class="icon-triangle"></i>
									<span class="menu-text">Wizards</span>
								</a>
							</li>
							<li class="header-menu">UI Elements</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-list2"></i>
									<span class="menu-text">Accordions</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="accordion.html">Accordion</a>
										</li>
										<li>
											<a href="accordion-icons.html">Accordion Icons</a>
										</li>
										<li>
											<a href="accordion-arrows.html">Accordion Arrows</a>
										</li>
										<li>
											<a href="accordion-lg.html">Accordion Large</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-disc"></i>
									<span class="menu-text">Buttons</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="buttons.html">Buttons</a>
										</li>
										<li>
											<a href="button-groups.html">Button Groups</a>
										</li>
										<li>
											<a href="dropdowns.html">Dropdowns</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="carousel.html">
									<i class="icon-toll"></i>
									<span class="menu-text">Carousels</span>
								</a>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-star2"></i>
									<span class="menu-text">Components</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="jumbotron.html">Jumbotron</a>
										</li>
										<li>
											<a href="labels-badges.html">Labels &amp; Badges</a>
										</li>
										<li>
											<a href="list-items.html">List Items</a>
										</li>
										<li>
											<a href="pagination.html">Paginations</a>
										</li>
										<li>
											<a href="progress.html">Progress Bars</a>
										</li>
										<li>
											<a href="pills.html">Pills</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="gallery.html">
									<i class="icon-image"></i>
									<span class="menu-text">Gallery</span>
								</a>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-box"></i>
									<span class="menu-text">Grid</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="grid.html">Grid</a>
										</li>
										<li>
											<a href="grid-doc.html">Grid Doc</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="icons.html">
									<i class="icon-timer"></i>
									<span class="menu-text">Icons</span>
								</a>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-image"></i>
									<span class="menu-text">Images</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="avatars.html">Avatars</a>
										</li>
										<li>
											<a href="media-objects.html">Media Objects</a>
										</li>
										<li>
											<a href="images.html">Thumbnails</a>
										</li>
										<li>
											<a href="text-avatars.html">Text Avatars</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="modals.html">
									<i class="icon-credit-card"></i>
									<span class="menu-text">Modals</span>
								</a>
							</li>
							<li>
								<a href="alerts.html">
									<i class="icon-bell"></i>
									<span class="menu-text">Notifications</span>
								</a>
							</li>
							<li>
								<a href="spinners.html">
									<i class="icon-circular-graph"></i>
									<span class="menu-text">Spinners</span>
								</a>
							</li>
							<li>
								<a href="tooltips.html">
									<i class="icon-change_history"></i>
									<span class="menu-text">Tooltips</span>
								</a>
							</li>
							<li>
								<a href="typography.html">
									<i class="icon-sort_by_alpha"></i>
									<span class="menu-text">Typography</span>
								</a>
							</li>
							<li class="header-menu">Tables</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-border_all"></i>
									<span class="menu-text">Tables</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="custom-tables.html">Custom Tables</a>
										</li>
										<li>
											<a href="default-table.html">Default Table</a>
										</li>
										<li>
											<a href="table-bordered.html">Table Bordered</a>
										</li>
										<li>
											<a href="table-hover.html">Table Hover</a>
										</li>
										<li>
											<a href="table-striped.html">Table Striped</a>
										</li>
										<li>
											<a href="table-small.html">Table Small</a>
										</li>
										<li>
											<a href="table-colors.html">Table Colors</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="data-tables.html">
									<i class="icon-border_all"></i>
									<span class="menu-text">Data Tables</span>
								</a>
							</li>
							<li class="header-menu">Graphs &amp; Maps</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-line-graph"></i>
									<span class="menu-text">Apex Graphs</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="area-graphs.html">Area Charts</a>
										</li>
										<li>
											<a href="bubble.html">Bubble Graphs</a>
										</li>
										<li>
											<a href="bar-graphs.html">Bar Charts</a>
										</li>
										<li>
											<a href="candlestick.html">Candlestick</a>
										</li>
										<li>
											<a href="column-graphs.html">Column Charts</a>
										</li>
										<li>
											<a href="donut-graphs.html">Donut Charts</a>
										</li>
										<li>
											<a href="line-graphs.html">Line Charts</a>
										</li>
										<li>
											<a href="mixed-graphs.html">Mixed Charts</a>
										</li>
										<li>
											<a href="pie-graphs.html">Pie Charts</a>
										</li>
										<li>
											<a href="radial-chart.html">Radial Graph</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="morris-graphs.html">
									<i class="icon-tonality"></i>
									<span class="menu-text">Morris Graphs</span>
								</a>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-map2"></i>
									<span class="menu-text">Maps</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="vector-maps.html">Vector Maps</a>
										</li>
										<li>
											<a href="google-maps.html">Google Maps</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="header-menu">Extra</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-airplay"></i>
									<span class="menu-text">Login</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="login.html">Login</a>
										</li>
										<li>
											<a href="signup.html">Signup</a>
										</li>
										<li>
											<a href="forgot-pwd.html">Forgot Password</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-alert-triangle"></i>
									<span class="menu-text">Error Pages</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="error.html">404</a>
										</li>
										<li>
											<a href="error2.html">505</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="coming-soon.html">
									<i class="icon-schedule"></i>
									<span class="menu-text">Coming Soon</span>
								</a>
							</li>
						</ul>
					</div>
        </nav>
        <div class="page-content">
            <header class="header">
                <div class="toggle-btns">
                    <a id="toggle-sidebar" href="#">
                        <i class="icon-list" title="menu deroulant"></i>
                    </a>
                    <a id="pin-sidebar" href="#">
                        <i class="icon-list" title="menu deroulant"></i>
                    </a>
                </div>
                <div class="header-items">
                    <ul class="header-actions">
                        <li class="dropdown">
                            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <span class="avatar">
                                    <img src="{{asset('assets/img/user.jpg')}}" alt="avatar">
                                    <span class="status busy"></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                                <div class="header-profile-actions">
                                    <div class="header-user-profile">
                                        <div class="header-user">
                                            <img src="{{asset('assets/img/logo.jpg')}}" alt="Admin Template">
                                        </div>
                                        <h5>{{ Auth::user()->email }}</h5>
                                        <p>Admin</p>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            <i class="icon-log-out1" title="deconnexion"></i> {{ __('Deconnexion') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            @yield('content')
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/daterange/daterange.js')}}"></script>
    <script src="{{asset('assets/vendor/daterange/custom-daterange.js')}}"></script>
    <script src="{{asset('assets/vendor/polyfill/polyfill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/apex/admin/visitors.js')}}"></script>
    <script src="{{asset('assets/vendor/apex/admin/deals.js')}}"></script>
    <script src="{{asset('assets/vendor/apex/admin/income.js')}}"></script>
    <script src="{{asset('assets/vendor/apex/admin/customers.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>