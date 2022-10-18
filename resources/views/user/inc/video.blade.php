<h5>{{__('Introduction Video')}}</h5>
<div class="row">
    <div class="col-md-6">
        <form class="form" id="add_edit_video" method="POST" action="{{ route('update.front.profile.video', [$user->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-body">

                <div class="formrow" id="div_is_default">
                    <label for="is_default" class="bold">{{__('Please Upload or Add Link?')}}</label>
                    <div class="radio-list">
                      

                        <label class="radio-inline">
                            <input id="default" name="is_default" type="radio" value="1"> {{__('Add Link')}} </label>
                        <label class="radio-inline"><input id="not_default" name="is_default" type="radio" value="0"> {{__('Upload Video')}} </label>
                    </div>
                    <span class="help-block is_default-error"></span>
                </div>

                <div id="success_msg1"></div>


                <div id="attachment1" class="desc formrow">
                    <input type="text" name="video_link" class="form-control" id="video_link" placeholder="{{__('Youtube link')}}">
                    <span class="help-block summary-error"></span> 
                </div>

                <div id="attachment0" class="desc formrow ">
                    <input type="file" name="video_attachment" class="form-control" id="video_attachment" placeholder="{{__('Youtube link')}}">
                    <span class="help-block summary-error"></span> 
                </div>


                <button type="submit" class="btn btn-large btn-primary" >{{__('Update')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
       
        <div class="embed-responsive embed-responsive-16by9">
         @if($user->video_link)
          <iframe src="{{$user->video_link}}" frameborder="0" allowfullscreen></iframe>
         @endif()
         @if($user->video_attachment)
         <video width="320" height="240" controls>
          <source src="{{ asset('/') }}user_video/{{ $user->video_attachment }}" type="video/mp4">
          <source src="movie.ogg" type="video/ogg">
        Your browser does not support the video tag.
        </video>
        @endif
        </div>

    </div>
</div>
@push('scripts') 
<script type="text/javascript">
$(document).ready(function() {
    // getUserDataVideo();
    $("div.desc").hide();
    $("input[name$='is_default']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#attachment" + test).show();
    });
});

    function getUserDataVideo()
    {
        $.ajax({
            url: '{{ route('update.front.profile.get.video', [$user->id]) }}',
            type: 'POST',
            dataType: 'json',
            success: function (json) {
                alert(json.data)
            },
            error: function (json) {
                if (json.status === 422) {
                    var resJSON = json.responseJSON;
                    $('.help-block').html('');
                    $.each(resJSON.errors, function (key, value) {
                        $('.' + key + '-error').html('<strong>' + value + '</strong>');
                        $('#div_' + key).addClass('has-error');
                    });
                } else {
                    // Error
                    // Incorrect credentials
                    // alert('Incorrect credentials. Please try again.')
                }
            }
        });
    }
    // function submitProfileVideoForm() {
    //     var form = $('#add_edit_video');
    //     alert(form.serialize())
    //     $.ajax({
    //         url: form.attr('action'),
    //         type: form.attr('method'),
    //         data : form.serialize(),
    //         dataType: 'json',
    //         success: function (json) {
    //             $("#success_msg1").html("<span class='text text-success'>{{__('Video updated successfully')}}</span>");
    //         },
    //         error: function (json) {
    //             if (json.status === 422) {
    //                 var resJSON = json.responseJSON;
    //                 $('.help-block').html('');
    //                 $.each(resJSON.errors, function (key, value) {
    //                     $('.' + key + '-error').html('<strong>' + value + '</strong>');
    //                     $('#div_' + key).addClass('has-error');
    //                 });
    //             } else {
    //                 // Error
    //                 // Incorrect credentials
    //                 // alert('Incorrect credentials. Please try again.')
    //             }
    //         }
    //     });
    // }
</script> 
@endpush            