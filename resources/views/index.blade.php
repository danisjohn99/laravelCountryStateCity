<!DOCTYPE html>
<html>
<head>
    <title>Larave Locations</title>
    <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css">    
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Country State City</div>

      <form action=" {!! url('/form-save') !!}" method="POST">
        @csrf

      <div class="panel-body">
            
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" name="name" class="form-control" style="width:350px"  required>
            </div>

            <div class="form-group">
                <label for="title">Email:</label>
                <input type="email" name="email" class="form-control" style="width:350px"  required>
            </div>

            <div class="form-group">
                <label for="title">Select Country:</label>
                {!! Form::select('country',$countries,null,['class'=>'form-control','id'=>'country','placeholder' => 'Select Country...','style'=>'width:350px;','required']);!!}
            </div>
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" id="state" class="form-control" style="width:350px" required>
                </select>
            </div>
         
            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" id="city" class="form-control" style="width:350px" required>
                </select>
            </div>

             <div class="form-group">
                <label for="title">Password:</label>
                <input type="password" name="password" class="form-control" style="width:350px"  required>
            </div>

            <div class="box-footer">
             <button type="submit" value="Submit">Submit</button>
            </div>
      </div>

    </form>

    </div>
</div>
<script type="text/javascript">

  //For country

    $('#country').change(function(){
    var countryID = $(this).val();  

      if(countryID){
          $.ajax({
             type:"GET",
             url:"{{url('api/get-state-list')}}?country_id="+countryID,
             
             success:function(res){               
                if(res){
                    $("#state").empty();
                    $("#state").append('<option>Select</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#state").empty();
                }
              }
          });
      }else{
          $("#state").empty();
          $("#city").empty();
      }      
     });

// For state field

      $('#state').on('change',function(){
      var stateID = $(this).val(); 
       
      if(stateID){
          $.ajax({
             type:"GET",
             url:"{{url('api/get-city-list')}}?state_id="+stateID,
             success:function(res){               
              if(res){
                  $("#city").empty();
                  $.each(res,function(key,value){
                      $("#city").append('<option value="'+key+'">'+value+'</option>');
                  });
             
              }else{
                 $("#city").empty();
              }
             }
          });
      }else{
          $("#city").empty();
      }
          
     });


</script>
</body>
</html>
