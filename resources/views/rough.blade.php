
<!DOCTYPE html>
<html lang="en">
  @include('header')

            

            <!-- sidebar menu -->
           @include('sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              {{-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a> --}}
              <a onclick="closeFullscreen();" title="Close FullScreen" data-toggle="tooltip" data-placement="top"><span aria-hidden="true"><b>X</b></span></a>
              <a onclick="openFullscreen();" data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('navbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>Echarts <small>Report Analytics</small></h3>
                </div>
  
                <div class="title_right">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="clearfix"></div>
  
              <div class="row">
                <div class="col-md-12 col-sm-8 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <div class="btn btn-info">City With Crime Analytics</div>
                      &nbsp;<a href="{{ route('usergraph.page') }}" class="btn btn-success">City with Age Analytics</a>
                      &nbsp;<a href="{{ route('addressgraph.page') }}" class="btn btn-success">Crime Analytics</a>
                      &nbsp;<a href="{{ route('incident.page') }}" class="btn btn-success">Incident type Analytics</a>
                      
                          
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    {{-- <div id="mainb" style="height:350px;"></div> --}}
                    <!-- Show Graph Data -->
<script src="https://cdnjs.com/libraries/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

 
<div class="col-md-12 bg-info">
  <section class="content" style="margin-left:0px;margin-right:20px;margin-top:0px;">
    <label for="cars">Select City</label>
     <select name="#" onchange="#" class="form-control" id="#" style="width:120px;">
        <option selected="selected">--Select--</option>
        @if($locations)
        @foreach($locations as $item)
        <option value="#"><a href="#">{{ $item->city }}</a></option>
        @endforeach
        @endif
    </select>
    <div class="product-index" align="right" style="margin-top:1px;">
      <div id="#" style="height:0px; width:0%"></div>
      
      </div>
      
    </section>
   
    <section class="content" style="margin-left:150px;margin-right:2px;margin-top:-60px;">
      <label for="cars">Crime Type</label>
      <select name="#" onchange="myFunction()" class="form-control" id="#" style="width:120px;">
        <option selected="selected">--Select--</option>
        @if($locations)
        @foreach($locations as $item)
        <option value="#">{{ $item->incident_type }}</option>
        @endforeach
        @endif
     
      </select>
      <div class="product-index" align="right" style="margin-top:1px;">
        <div id="#" style="height:0px; width:0%"></div>
        
        </div>
        
      </section>
      <section class="content" style="margin-left:300px;margin-right:2px;margin-top:-35px;">
         <a href="{{ route('citycrime.page') }}" class="btn btn-info">Submit</a>                          
        <div class="product-index" align="right" style="margin-top:1px;">
          <div id="#" style="height:0px; width:0%"></div>
          
          </div>
          
        </section>
  <script>
    jQuery(document).ready(function(){
      jQuery('#district').change(function(){
let did=jQuery(this).val();
jQuery('#zip').html('<option value="">Select Zip</option>')
// alert(did)
jQuery.ajax({
  url:'/getCity',
  type:'post',
  data:'did='+did+'&_token={{ csrf_token() }}',
  success:function(result){
    jQuery('#city').html(result)
  }
});
      });


      jQuery('#city').change(function(){
let cid=jQuery(this).val();
// alert(did)
jQuery.ajax({
  url:'/getZip',
  type:'post',
  data:'cid='+cid+'&_token={{ csrf_token() }}',
  success:function(result){
    jQuery('#zip').html(result)
  }
});
      });
    });
  </script>
  <script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      title:{
        text: "Cities And No. Of Crime"
      },
      axisY: {
        title: "Number of crime with Incident type--->"
      },
      data: [{        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: "Cities --->",
        dataPoints: <?php echo json_encode($locations,JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();
    
    }
    </script>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
                    </div>
                  </div>
                </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('footer')
        <!--footer content-->
      </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
       
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>

    <!-- Custom Theme Scripts -->
     <script src="../build/js/custom.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0NuQOXznmNbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  </body>
</html>
