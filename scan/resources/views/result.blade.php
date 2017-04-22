<!DOCTYPE html>
<html>

<head>
  @include('header')


</head>

<body>
  <div id="wrapper">
    @include('left_navigation_student')
    <div id="page-wrapper" class="gray-bg dashbard-1">
      @include('topnavigation')

      <div class="row">
        <div class="col-lg-12">
         <div class="ibox-content m-b-sm border-bottom">
          <div class="wrapper wrapper-content animated fadeInRight">

            <div class="p-xs">
              <div class="pull-left m-r-md">
                <i class="fa fa-check-circle text-navy mid-icon"></i>
              </div>
              <h2>Successfully Mastered All Stages.</h2>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-6">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Topics Mastered</h5>

            </div>
            <div class="ibox-content">

              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Topics</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Addition</td>
                    
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Subtraction</td>

                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Multiplication</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Division</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Modulus</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Topics To Be Mastered</h5>

            </div>
            <div class="ibox-content">

              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Topics</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Final State Reached</td>
                   
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content">
        <div class="row">

        </div>
      </div>
      @include('footer')
    </div>
  </div>

</div>
</div>

@include('js')
@if(Session::has('check'))
@if(Session::get('check'))
<script type="text/javascript">
$(window).load(function(){
  $('#check').modal('show');
});
</script>
@endif
@endif
<script type="text/javascript">

document.getElementById('diesel').addEventListener('keydown', function(e)
{
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
             (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
             (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
               return;
             }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });

document.getElementById('speed').addEventListener('keydown', function(e)
{
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
             (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
             (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
               return;
             }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });


document.getElementById('petrol').addEventListener('keydown', function(e)
{
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
             (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
             (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
               return;
             }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });

</script>

@if(Session::has('success'))
<script>
$(document).ready(function() {
  setTimeout(function() {
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 4000
    };
    toastr.success("{{Session::get('success')}}");

  }, 1300);

});
</script>
@endif

@if(Session::has('failure'))
<script>
$(document).ready(function() {
  setTimeout(function() {
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 4000
    };
    toastr.error("{{Session::get('failure')}}");

  }, 1300);

});
</script>
@endif

<script>
$(document).ready(function() {


  var data1 = [ 
  @for($i = 30 ; $i >= 0 ; $i-- )
  @if(empty($petrol_graph))
  @if($i == 0)
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0]
  @else
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0],   
  @endif

  @else
  @foreach($petrol_graph as $pg)
  @if($i == 0)
  @if($pg->date == date('Y-m-d',strtotime("-".$i." days")))
  [{{explode('-',$pg->date)[2]}},{{$pg->volume}}]
  @else
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0]
  @endif   

  @else
  @if($pg->date == date('Y-m-d',strtotime("-".$i." days")))
  [{{explode('-',$pg->date)[2]}},{{$pg->volume}}],
  @else
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0],
  @endif   
  @endif
  @endforeach
  @endif
  @endfor
  ];
  var data2 = [

  @for($i = 30 ; $i >= 0 ; $i-- )
  @if(empty($diesel_graph))
  @if($i == 0)
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0]
  @else
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0],   
  @endif

  @else
  @foreach($diesel_graph as $pg)
  @if($i == 0)
  @if($pg->date == date('Y-m-d',strtotime("-".$i." days")))
  [{{explode('-',$pg->date)[2]}},{{$pg->volume}}]
  @else
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0]
  @endif   

  @else
  @if($pg->date == date('Y-m-d',strtotime("-".$i." days")))
  [{{explode('-',$pg->date)[2]}},{{$pg->volume}}],
  @else
  [{{explode('-',date('Y-m-d',strtotime("-".$i." days")))[2]}},0],
  @endif   
  @endif
  @endforeach
  @endif
  @endfor
  
  ];
  $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
    data1,  data2
    ],
    {
      series: {
        lines: {
          show: false,
          fill: true
        },
        splines: {
          show: true,
          tension: 0.4,
          lineWidth: 1,
          fill: 0.4
        },
        points: {
          radius: 0,
          show: true
        },
        shadowSize: 2
      },
      grid: {
        hoverable: true,
        clickable: true,

        borderWidth: 2,
        color: 'transparent'
      },
      colors: ["#1ab394", "#1C84C6"],
      xaxis:{
      },
      yaxis: {
      },
      tooltip: false
    }
    );

});
</script>
<script src="js/plugins/footable/footable.all.min.js"></script>
<script>
$(document).ready(function() {

  $('.footable').footable();
  $('.footable2').footable();

});

</script>

</body>
</html>