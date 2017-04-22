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

              <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Questions list</h5>
                            <div class="ibox-tools">
                                <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal5">Add new Question</a>


                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                            placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Question</th>
                                        <th>Option A</th>
                                        <th>Option B</th>
                                        <th>Option C</th>
                                        <th>Option D</th>
                                        <th>Option Correct</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @if(count($questions))
                                    <?php $i = 1;?>
                                    @foreach($questions as $que)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$que->question}}</td>
                                        <td>{{$que->a}}</td>
                                        <td>{{$que->b}}</td>
                                        <td>{{$que->c}}</td>
                                        <td>{{$que->d}}</td>
                                        <td>{{$que->correct}}</td>
                                        <td><a href = "{{URL::route('delete_questions',$que->id)}}"class="btn btn-outline btn-danger" type="button">
                                            <i class="fa fa-trash-o"></i> <span class="bold">Delete</span>
                                        </a>
                                    </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                    @else
                                    <tr class="gradeX">
                                        <td colspan="8"><center>NO QUESTIONS ADDED</center></td>
                                    </tr>
                                    @endif
                                   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
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
    <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add New Question</h4>
                </div>
                <form method="post" action = "{{URL::route('questions.store')}}" class="form-horizontal">
                    {{csrf_field()}}

                    <div class="modal-body">
                        
                    <div id = "amt" class="form-group"><label class="col-sm-2 control-label">Question</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><input type="text" name = "question"  placeholder = "" required  class="form-control"></div>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Option A</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><input type="text" class="form-control" name = "a"  placeholder = "Option A" required></div>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Option B</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><input type="text" class="form-control" name = "b"  placeholder = "Option B" required></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Option C</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><input type="text" class="form-control" name = "c"  placeholder = "Option C" required></div>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Option D</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><input type="text" class="form-control" name = "d"  placeholder = "Option D" required></div>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Correct</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><select class="form-control m-b" name="correct">
                                        <option value = "A">A</option>
                                        <option value = "B">B</option>
                                        <option value = "C">C</option>
                                        <option value = "D">D</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                     <div class="form-group"><label class="col-sm-2 control-label">Domain</label>

                        <div class="col-sm-10">
                            <div class="input-group m-b"><select class="form-control m-b" name="domain_id">
                                @foreach($domain as $dom)
                                        <option value = "{{$dom->id}}">{{$dom->slug}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary">Add</button>
                </div>
            </form>
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
<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>
<script>
$(document).ready(function() {

    $('.footable').footable();
    $('.footable2').footable();


});

function handler() {
    var str = document.getElementById("refill").value; 
    if(!str.localeCompare("ft")){
        document.getElementById("amount").value = "0";
        $('#amt').hide();
     }else{
        document.getElementById("amount").value = "";
        $('#amt').show();
        
    }
    
}

</script>


<script>
document.getElementById('quantity').addEventListener('keydown', function(e)
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

</body>
</html>
