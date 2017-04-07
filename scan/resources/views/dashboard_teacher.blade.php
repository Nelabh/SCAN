<!DOCTYPE html>
<html>

<head>
    @include('header')
</head>

<body>
    <div id="wrapper">
        @include('left_navigation_teacher')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('topnavigation')
            <div class="wrapper wrapper-content animated fadeIn">


                <div class="p-w-md m-t-sm">
                    <div class="row">


                        <div class="col-sm-4">
                        </div>

                        <div class="col-sm-4 text-center">




                            <table class="table small m-t-sm">

                            </table>



                        </div>

                    </div>



                    <div class="wrapper wrapper-content animated fadeIn">



                      <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Students list</h5>
                                </div>
                                <div class="ibox-content">
                                    <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                    placeholder="Search in table">

                                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>

                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Father's Name</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @if(count($students))
                                    <?php $i = 1;?>
                                    @foreach($students as $stu)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$stu->name}}</td>
                                        <td>{{$stu->email}}</td>
                                        <td>{{$stu->contact}}</td>
                                        <td>{{$stu->father}}</td>
                                        <td>{{$stu->address}}</td>
                                        </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                    @else
                                    <tr class="gradeX">
                                        <td colspan="6"><center>NO STUDENTS ADDED</center></td>
                                    </tr>
                                    @endif

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <ul class="pagination pull-right"></ul>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

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

    var sparklineCharts = function(){
        $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1ab394',
            fillColor: "transparent"
        });

        $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1ab394',
            fillColor: "transparent"
        });

        $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1C84C6',
            fillColor: "transparent"
        });
    };

    var sparkResize;

    $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineCharts, 500);
    });

    sparklineCharts();




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
