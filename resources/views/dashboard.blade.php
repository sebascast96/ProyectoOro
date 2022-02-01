@extends('layouts.app')

@section('content')

<body class="">
    <div class="wrapper ">
      <div class="main-panel" id="main-panel">
        <div class="panel-header panel-header-lg">
          <canvas id="bigDashboardChart"></canvas>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-lg-4">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Inventario</h5>
                  <h4 class="card-title">Productos Entrantes</h4>
                  <div class="dropdown">
                    <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                      <i class="now-ui-icons loader_gear"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Acción</a>
                      <a class="dropdown-item" href="#">Otra acción</a>
                      <a class="dropdown-item" href="#">Otra acción</a>
                      <a class="dropdown-item text-danger" href="#">Remover Info</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="lineChartExample"></canvas>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="now-ui-icons arrows-1_refresh-69"></i> Actualizada
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Ventas Anuales</h5>
                  <h4 class="card-title">Todos Los Productos</h4>
                  <div class="dropdown">
                    <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                      <i class="now-ui-icons loader_gear"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Acción</a>
                        <a class="dropdown-item" href="#">Otra acción</a>
                        <a class="dropdown-item" href="#">Otra acción</a>
                        <a class="dropdown-item text-danger" href="#">Remover Info</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="now-ui-icons arrows-1_refresh-69"></i> Actualizada
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Eficiencia</h5>
                  <h4 class="card-title">Medida cada 24h</h4>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="barChartSimpleGradientsNumbers"></canvas>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="now-ui-icons ui-2_time-alarm"></i> Ultimos 7 días
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card  card-tasks">
                <div class="card-header ">
                  <h5 class="card-category">Ventas Recientes</h5>
                  <h4 class="card-title">Completadas</h4>
                </div>
                <div class="card-body ">
                  <div class="table-full-width table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" checked>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                              <i class="now-ui-icons ui-2_settings-90"></i>
                            </button>
                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                              <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                              <i class="now-ui-icons ui-2_settings-90"></i>
                            </button>
                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                              <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" checked>
                                <span class="form-check-sign"></span>
                              </label>
                            </div>
                          </td>
                          <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                          </td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                              <i class="now-ui-icons ui-2_settings-90"></i>
                            </button>
                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                              <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="now-ui-icons loader_refresh spin"></i> Actualizado hace 3 min
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-category">Lista de Personal</h5>
                  <h4 class="card-title"> Estado de Empleados</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nombre
                        </th>
                        <th>
                          RFC
                        </th>
                        <th>
                          CURP
                        </th>
                        <th class="text-right">
                          Cumpleaños
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            Dakota Rice
                          </td>
                          <td>
                            123
                          </td>
                          <td>
                            123456
                          </td>
                          <td class="text-right">
                            12-12-12
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Minerva Hooper
                          </td>
                          <td>
                            123
                        </td>
                        <td>
                          123456
                        </td>
                        <td class="text-right">
                          12-12-12
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Sage Rodriguez
                          </td>
                          <td>
                            123
                          </td>
                          <td>
                          123456
                          </td>
                          <td class="text-right">
                          12-12-12
                          </td>
                          </tr>
                          <tr>
                          <td>
                            Doris Greene
                          </td>
                          <td>
                            123
                          </td>
                          <td>
                          123456
                          </td>
                          <td class="text-right">
                          12-12-12
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Mason Porter
                          </td>
                          <td>
                            123
                          </td>
                          <td>
                            123456
                          </td>
                          <td class="text-right">
                            12-12-12
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class=" container-fluid ">
            <nav>
              <ul>
                <li>
                  <a href="https://www.creative-tim.com">
                    Monologic Solutions
                  </a>
                </li>
                <li>
                  <a href="http://presentation.creative-tim.com">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com">
                    Blog
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright" id="copyright">
              &copy; <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
              </script>, Designed and coded by <a href="https://www.creative-tim.com" target="_blank">Monologic Solutions</a>.
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
  
      });
    </script>
  </body>


    <script>
        $(document).ready(function() {
            var myHeaders = new Headers();
            myHeaders.append("x-access-token", "goldapi-4j1j3sksgsa5j8-io");
            myHeaders.append("Content-Type", "application/json");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };
            var rate;
            fetch(`http://www.floatrates.com/daily/usd.json`)
                .then(response => response.json())
                .then(data => {
                    rate = "" + data.mxn.rate;
                }).catch(err => {
                    if (err) {
                        swal("Oh noes!", err, "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                })
                .then(fetch(`https://www.goldapi.io/api/XAU/USD`, requestOptions)
                    .then(response => response.json())
                    .then(data => {
                        const rateo = "" + data.price;
                        swal({
                            title: "Precios",
                            text: "El oro esta a " + rateo + " y el dolar a " + rate,
                            icon: "{{ url('../favicon.svg') }}",
                        });
                    })).catch(err => {
                    if (err) {
                        swal("Oh noes!", err, "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });





        });
    </script>
    <script>
        (function() {
  isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;

  if (isWindows) {
    // if we are on windows OS we activate the perfectScrollbar function
    var ps = new PerfectScrollbar('.sidebar-wrapper');
    var ps2 = new PerfectScrollbar('.main-panel');

    $('html').addClass('perfect-scrollbar-on');
  } else {
    $('html').addClass('perfect-scrollbar-off');
  }
})();

transparent = true;
transparentDemo = true;
fixedTop = false;

navbar_initialized = false;
backgroundOrange = false;
sidebar_mini_active = false;
toggle_initialized = false;

var is_iPad = navigator.userAgent.match(/iPad/i) != null;
var scrollElement = navigator.platform.indexOf('Win') > -1 ? $(".main-panel") : $(window);

seq = 0, delays = 80, durations = 500;
seq2 = 0, delays2 = 80, durations2 = 500;

$(document).ready(function() {

  if ($('.full-screen-map').length == 0 && $('.bd-docs').length == 0) {
    // On click navbar-collapse the menu will be white not transparent
    $('.collapse').on('show.bs.collapse', function() {
      $(this).closest('.navbar').removeClass('navbar-transparent').addClass('bg-white');
    }).on('hide.bs.collapse', function() {
      $(this).closest('.navbar').addClass('navbar-transparent').removeClass('bg-white');
    });
  }

  $navbar = $('.navbar[color-on-scroll]');
  scroll_distance = $navbar.attr('color-on-scroll') || 500;

  // Check if we have the class "navbar-color-on-scroll" then add the function to remove the class "navbar-transparent" so it will transform to a plain color.
  if ($('.navbar[color-on-scroll]').length != 0) {
    nowuiDashboard.checkScrollForTransparentNavbar();
    $(window).on('scroll', nowuiDashboard.checkScrollForTransparentNavbar)
  }

  $('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
  }).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
  });

  // Activate bootstrapSwitch
  $('.bootstrap-switch').each(function() {
    $this = $(this);
    data_on_label = $this.data('on-label') || '';
    data_off_label = $this.data('off-label') || '';

    $this.bootstrapSwitch({
      onText: data_on_label,
      offText: data_off_label
    });
  });
});

$(document).on('click', '.navbar-toggle', function() {
  $toggle = $(this);

  if (nowuiDashboard.misc.navbar_menu_visible == 1) {
    $('html').removeClass('nav-open');
    nowuiDashboard.misc.navbar_menu_visible = 0;
    setTimeout(function() {
      $toggle.removeClass('toggled');
      $('#bodyClick').remove();
    }, 550);

  } else {
    setTimeout(function() {
      $toggle.addClass('toggled');
    }, 580);

    div = '<div id="bodyClick"></div>';
    $(div).appendTo('body').click(function() {
      $('html').removeClass('nav-open');
      nowuiDashboard.misc.navbar_menu_visible = 0;
      setTimeout(function() {
        $toggle.removeClass('toggled');
        $('#bodyClick').remove();
      }, 550);
    });

    $('html').addClass('nav-open');
    nowuiDashboard.misc.navbar_menu_visible = 1;
  }
});

$(window).resize(function() {
  // reset the seq for charts drawing animations
  seq = seq2 = 0;

  if ($('.full-screen-map').length == 0 && $('.bd-docs').length == 0) {

    $navbar = $('.navbar');
    isExpanded = $('.navbar').find('[data-toggle="collapse"]').attr("aria-expanded");
    if ($navbar.hasClass('bg-white') && $(window).width() > 991) {
      if (scrollElement.scrollTop() == 0) {
        $navbar.removeClass('bg-white').addClass('navbar-transparent');
      }
    } else if ($navbar.hasClass('navbar-transparent') && $(window).width() < 991 && isExpanded != "false") {
      $navbar.addClass('bg-white').removeClass('navbar-transparent');
    }
  }
  if (is_iPad) {
    $('body').removeClass('sidebar-mini');
  }
});

nowuiDashboard = {
  misc: {
    navbar_menu_visible: 0
  },

  showNotification: function(from, align) {
    color = 'primary';

    $.notify({
      icon: "now-ui-icons ui-1_bell-53",
      message: "Welcome to <b>Now Ui Dashboard</b> - a beautiful freebie for every web developer."

    }, {
      type: color,
      timer: 8000,
      placement: {
        from: from,
        align: align
      }
    });
  }


};

function hexToRGB(hex, alpha) {
  var r = parseInt(hex.slice(1, 3), 16),
    g = parseInt(hex.slice(3, 5), 16),
    b = parseInt(hex.slice(5, 7), 16);

  if (alpha) {
    return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
  } else {
    return "rgb(" + r + ", " + g + ", " + b + ")";
  }
}
    </script>
@endsection
